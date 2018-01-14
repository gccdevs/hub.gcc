@component('mail::message')

<a href="{{env('APP_URL') }}" rel="text">![]({{asset('/images/gcclogoH1140.png')}})
    <br><br>
# Hi {{ $admin->name }},

We've just received a new contact through GCC Hub Central.

### Below is the detail information:

@component('mail::panel', ['url' => ''])

**Name: ** {{ $contact->name ?: 'Not provide' }}

**Mobile: ** {{ $contact->phone ?: 'Not provide' }}

**Email: ** {{ $contact->email ?:  'Not provide' }}

**Story: **

>  {{ $contact->story ?: '' }}

@endcomponent

##### Please reply to this enquiry promptly or redirect to who may need know.

@component('mail::button', ['url' => env('APP_URL') . '/login'])
Reply
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the button above,
copy and paste the URL below into your web browser: {{ env('APP_URL')}}
@endcomponent

If this is not on your behalf, please ignore this email.<br>

Thanks and we see your there! <br><br>
{{ config('app.name') }}
@endcomponent
