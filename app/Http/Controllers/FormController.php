<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Stripe\{Charge, Customer};


class FormController extends Controller
{
    public function index()
    {
        return view('forms.register');
    }


    public function validateCoupon()
    {
        return response()->json(['message' => request('coupon')  == env('STRIPE_CODE') ? true : false ]);
    }
    
    
    public function purchase(Request $request)
    {
        $this->validator($request->all())->validate(); // validate requested inputs

        $price = request('coupon') == env('STRIPE_CODE') ? env('SUMMIT_DISCOUNT_PRICE') : env('SUMMIT_FULL_PRICE');

        try { // process payment

            $customer = Customer::create([
                'email' =>request('email'),
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create([
                'description' =>  request('coupon') == env('STRIPE_CODE') ? 'SUMMIT2018_EARLYBIRD' : 'SUMMIT2018',
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

            $form->saveAmount($price, request('coupon'));

            $form->confirmPayment($charge->id);

            $form->save();
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to create Entity', 'reason' => $e->getMessage()]);
        }

        try{
            Mail::to($form)->queue(new PurchaseConfirmation($form)); // send confirmation email
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to send email', 'reason' => $e->getMessage(), 'ref' => $charge->id, 'customer' => $customer, 'charge' => $charge]);
        }


        return response()->json([
            'message' => 'paid success',
            'ref' => $charge->id,
            'customer' => $customer,
            'charge' => $charge,
            'amount' => request('coupon') == env('STRIPE_CODE') ? env('SUMMIT_DISCOUNT_PRICE') : env('SUMMIT_FULL_PRICE')
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
            $object->ref = $form->payment_ref;
            $object->coupon = $form->coupon == env('STRIPE_CODE') ? true : false;
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

        array_push($cellData, ['First name','Last name', 'gender', 'mobile','email','payment_ref','time', 'coupon', 'first_time','where to know']);

        foreach ($data as $form){

            array_push($cellData, [
                $first_name = $form->first_name,
                $last_name = $form->last_name,
                $gender = $form->gender,
                $mobile = $form->mobile,
                $email = $form->email,
                $ref = $form->payment_ref,
                $time = date('Y/m/d h:i:s',strtotime($form->updated_at)),
                $coupon = $form->coupon == env('STRIPE_CODE') ? true : false,
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
