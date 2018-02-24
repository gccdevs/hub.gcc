<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\PurchaseConfirmation;
use App\Mail\InviterPurchaseConfirmation;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Stripe\{Charge, Customer};


class FormController extends Controller
{
    public function index()
    {
        return view('forms.register');
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateCoupon()
    {
        $coupon = request('coupon');

        if ($coupon == env('STRIPE_CODE')) {
            return response()->json([
                'message' => true,
                'type' => 'early-bird',
                'price' => env('SUMMIT_DISCOUNT_PRICE')
            ]);
        } else if ($coupon == env('ASONE_CODE')) {
            return response()->json([
                'message' => true,
                'type' => 'outside-church',
                'price' => env('ASONE_PRICE')

            ]);
        } else if ($coupon == env('DOUBLE_PORTION')) {
            // email existed in db
            try {
                Form::where('email', request('email'))->firstOrFail();
                return response()->json([
                    'message' => true,
                    'type' => 'giving-bless',
                    'price' => env('BLESSING_PRICE')
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => false,
                    'type' => null,
                    'price' => env('SUMMIT_FULL_PRICE')
                ]);
            }
        } else {
            return response()->json([
                'message' => false,
                'type' => null,
                'price' => env('SUMMIT_FULL_PRICE')
            ]);
        }
    }
    
    
    public function purchase(Request $request)
    {
        $this->validator($request->all())->validate(); // validate requested inputs

        $coupon = request('coupon');

        try { // process payment

            $customer = Customer::create([
                'email' =>request('email'),
                'source' => request('stripeToken'),
            ]);

            if ($coupon == env('STRIPE_CODE')) {
                $price = 6900;
            } else if ($coupon == env('ASONE_CODE')) {
                $price = 3500;
            } else if ($coupon == env('DOUBLE_PORTION')) {
                $price = 3500;
            } else {
                $price = 9900;
            }

            if ($coupon == env('STRIPE_CODE')) {
                $description = 'SUMMIT2018_EARLYBIRD';
            } else if ($coupon == env('ASONE_CODE')) {
                $description = 'SUMMIT2018_AS_ONE';
            } else if ($coupon == env('DOUBLE_PORTION')) {
                $description = 'SUMMIT2018_DOUBLE_PORTION';
            } else {
                $description = 'SUMMIT2018';
            }
            $charge = Charge::create([
                'description' => $description,
                'amount' => $price,
                'customer' => $customer->id,
                'currency' => 'AUD'
            ]);

        }
        catch (\Exception $e) { // if failed to charge
            return response()->json(['message' => 'failed to charge the card', 'reason' => $e->getMessage()]);
        }

        try{
            $form = new Form([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'first_time' => request('first_time'),
                'email' => request('email'),
                'gender' => request('gender'),
                'mobile' => request('mobile'),
                'path' => request('path'),
            ]); // create an entry

            $form->is_agreed = true;

            $form->saveAmount($price, $coupon);

            if ($coupon == env('DOUBLE_PORTION')) {
                $form->inviter_email = request('inviterEmail');
            }

            $form->confirmPayment($charge->id);

            $form->save();
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to create Entity', 'reason' => $e->getMessage()]);
        }

        try{
            if($coupon == env('DOUBLE_PORTION')) {
                Mail::to($form)
                    ->queue(new PurchaseConfirmation($form, request('price'), request('inviterEmail'), $coupon));
            }else {
                Mail::to($form)->
                queue(new PurchaseConfirmation($form, request('price')));
            }
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to send email', 'reason' => $e->getMessage(), 'ref' => $charge->id, 'customer' => $customer, 'charge' => $charge]);
        }


        return response()->json([
            'message' => 'paid success',
            'ref' => $charge->id,
            'customer' => $customer,
            'charge' => $charge,
            'amount' => $price
        ]);
    }

    private function validator(array $data)
    {

        return Validator::make($data, [
            'isAgreed' => 'required|boolean:true',
            'first_name' => 'required|string|max:20|min:1',
            'last_name' => 'required|string|max:20|min:1',
            'email' => 'required|string|email|max:50',
            'stripeToken' => 'required',
            'mobile' => 'required|min:8',
            'gender' => 'required|in:male,female',
            'inviterEmail' => 'nullable|email',
            'first_time' => 'required|in:yes,no',
            'path' => 'required|in:friend,classmate,colleague,web,social,family,other'
        ]);

    }

    public function show()
    {

        $data = Form::all();

        $response = [];

        foreach ($data as $form){

            $object = (object) [];
            $object->first_name = $form->first_name;
            $object->last_name = $form->last_name;
            $object->gender = $form->gender;
            $object->mobile = $form->mobile;
            $object->email = $form->email;
            $object->invitedEmail = $form->inviter_email;
            $object->ref = $form->payment_ref;
            $object->coupon = $form->coupon;
            $object->time = date('Y/m/d h:i:s',strtotime($form->updated_at));
            $object->firstTime = $form->first_time;
            $object->path = $form->path;

            array_push($response, $object);
        }

        return array_reverse($response);
    }

    public function termsAndConditions(){
        return view('forms.terms');
    }

    public function download()
    {

        $data = Form::all();

        $cellData = [];

        array_push($cellData, ['First name','Last name', 'gender', 'mobile','email', 'invitedEmail', 'payment_ref','time', 'coupon', 'first_time','where to know']);

        foreach ($data as $form){

            array_push($cellData, [
                $first_name = $form->first_name,
                $last_name = $form->last_name,
                $gender = $form->gender,
                $mobile = $form->mobile,
                $email = $form->email,
                $invitedEmail = $form->inviter_email,
                $ref = $form->payment_ref,
                $time = date('Y/m/d h:i:s',strtotime($form->updated_at)),
                $coupon = $form->coupon,
                $firstTime = $form->first_time,
                $path = $form->path
            ]);
        }

        array_reverse($cellData);

        Excel::create('Registered-users', function ($excel) use ($cellData) {
            $excel->sheet('sheet1', function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
}
