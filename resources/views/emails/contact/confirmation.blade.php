@component('mail::message')

<a href="{{env('APP_URL') }}" rel="text">![]({{asset('/images/gcclogoH1140.png')}})

# Hi {{ $contact->name ?: 'John Doe' }},

You've just written your story to GCC. We have received your story and shortly will have someone to contact you.

### Below is the information you've just sent to us.

@component('mail::panel', ['url' => ''])

**Mobile: ** {{ $contact->phone ?: 'Not provide' }}

**Email: ** {{ $contact->email }}

**Your Story: **

>  {{ $contact->story ?: '' }}

@endcomponent

##### We will not share your information to others.

For more information about GCC please click the button below:

@component('mail::button', ['url' => env('APP_URL')])
    Learn more
@endcomponent

@component('mail::subcopy')
    If you’re having trouble clicking the button above,
    copy and paste the URL below into your web browser: {{ env('APP_URL')}}
@endcomponent

If this is not on your behalf, please ignore this email.<br>

Thanks and we see your there! <br><br>
{{ config('app.name') }}
@endcomponent
