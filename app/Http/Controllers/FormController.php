<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Facades\Mail;
use Stripe\{Charge, Customer};


class FormController extends Controller
{
    public function index()
    {
        return view('forms.register');
    }

    public function purchase(Request $request)
    {
        $this->validator($request->all())->validate(); // validate requested inputs

        $form = new Form([
            'name' => request('name'),
            'first_time' => request('first_time'),
            'email' => request('email'),
            'gender' => request('gender'),
            'mobile' => request('mobile'),
            'address' => request('address'),
        ]); // create an entry

        try { // process payment
            $customer = Customer::create([
                'email' =>request('email'),
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create([
                'amount' => 10000,
                'customer' => $customer->id,
                'currency' => 'AUD'
            ]);
        }
        catch (\Exception $e) { // if failed to charge
            return response()->json(['message' => 'failed to charge the card', 'reason' => $e->getMessage()]);
        }

        $form->confirmPayment($charge->id); // mark as paid
        $form->save(); // save into database

        try{
            Mail::to($form)->queue(new PurchaseConfirmation($form)); // send confirmation email
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to send email', 'reason' => $e->getMessage(), 'ref' => $charge->id, 'customer' => $customer, 'charge' => $charge]);
        }


        return response()->json(['message' => 'paid success', 'ref' => $charge->id, 'customer' => $customer, 'charge' => $charge]);

    }

    private function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:forms',
            'stripeToken' => 'required',
            'address' => 'required|string|max:255',
            'mobile' => 'required|min:8',
            'gender' => 'required|in:male,female',
            'first_time' => 'required|in:yes,no'
        ]);

    }

    public function show()
    {

        $data = Form::all();

        $response = [];

        foreach ($data as $form){

            array_push($response, [
                $name = $form->name,
                $gender = $form->gender,
                $mobile = $form->mobile,
                $email = $form->email,
                $address = $form->address,
                $is_paid = $form->is_paid,
                $ref = $form->payment_ref,
                $time = date('Y/m/d h:i:s',strtotime($form->updated_at)),
                $firstTime = $form->first_time,
            ]);
        }

        return array_reverse($response);
    }

    public function validateEmail()
    {
        $response = Form::where('email',request('email'))->first() ? true : false;
        return response()->json(['status' => $response]);
    }

    public function termsAndConditions(){
        return view('forms.terms');
    }

}
