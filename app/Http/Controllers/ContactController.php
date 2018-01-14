<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\AdminContactEmail;
use App\Mail\ContactEmail;
use App\Mail\ContactMail;
use App\Mail\ContactMailCCAdmin;
use App\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store()
    {
        try {
            $contact = new Contact([
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'story' => request('story')
            ]);

            $contact->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'failed to save to database', 'reason' => $e->getMessage()]);

        }

        $admin = User::where('email', env('CONTACT_EMAIL'))->first();

        try {

            if (request('email')){
                Mail::to($contact)->queue(new ContactMail($contact));
            }
            Mail::to($admin)->queue(new ContactMailCCAdmin($contact, $admin)); // send to admin
        } catch(\Exception $e) {
            return response()->json(['message' => 'failed to send email', 'reason' => $e->getMessage()]);

        }


        return response()->json(['message' => 'success']);

    }
}
