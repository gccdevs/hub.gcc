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
        return view('register');
    }

    public function purchase(Request $request)
    {
        $this->validator($request->all())->validate(); // validate requested inputs

        try { // process payment
            $customer = Customer::create([
                'email' =>request('email'),
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create([
                'amount' => 5000,
                'customer' => $customer->id,
                'currency' => 'AUD'
            ]);
        }
        catch (\Exception $e) { // if failed to charge
            return response()->json(['message' => 'failed to charge the card', 'reason' => $e->getMessage()]);
        }

        return response()->json(['message' => 'paid success', 'customer' => $customer, 'charge' => $charge]);

    }


    public function purchase1(Request $request)
    {
        $this->validator($request->all())->validate(); // validate requested inputs

        $form = new Form([
            'email' => request('email'),
            'gender' => request('gender'),
            'mobile' => request('mobile'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'address' => request('address'),
        ]); // create an entry

        try { // process payment
            $customer = Customer::create([
                'email' =>request('stripeEmail'),
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

        Mail::to($form)->queue(new PurchaseConfirmation($form)); // send confirmation email

        return response()->json(['message' => 'paid success', 'ref' => $charge->id, 'customer' => $customer, 'charge' => $charge]);

    }

    private function validator(array $data)
    {

        return Validator::make($data, [
            'stripeToken' => 'required',
            'email' => 'required|string|email|max:255|unique:forms'
        ]);

    }

    private function validator1(array $data)
    {

        return Validator::make($data, [
            'stripeEmail' => 'required',
            'stripeToken' => 'required',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:forms',
            'address' => 'required|string|max:255',
            'mobile' => 'required|min:10',
            'gender' => 'required|in:male,female'
        ]);

    }

    public function show()
    {

        $data = Form::all();

        $response = [];

        foreach ($data as $form){

            array_push($response, [
                $name = $form->first_name . ', ' . $form->last_name,
                $gender = $form->gender,
                $mobile = $form->mobile,
                $email = $form->email,
                $address = $form->address,
                $is_paid = $form->is_paid,
                $ref = $form->payment_ref,
                $time = date('Y/m/d h:i:s',strtotime($form->updated_at))
            ]);
        }

        return array_reverse($response);
    }

    public function validateEmail()
    {
        $response = Form::where('email',request('email'))->first() ? true : false;
        return response()->json(['status' => $response]);
    }
}
