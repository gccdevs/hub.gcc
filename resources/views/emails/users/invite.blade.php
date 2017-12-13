@component('mail::message')
## Hello, {{ $user->name }},

You are receiving this email, because you are invited by your friend <b>{{ $inviterName }}</b>

You are warmly welcomed to join the new GCC Hub system. Please click the link below to activate your account at GCC Hub:

@component('mail::button', ['url' => $activateLink])
Activate Account
@endcomponent

Below is your login details. After activating your account, you can use them to login and then change your password.


@component('mail::panel', ['url' => $activateLink])
@component('mail::table')

<p style="text-align: center;">Please activate account first</p>


| Login Email | Login Password |
| ------------- |:--------------------------------------------------:|
| <a href="mailto: {{$user->email }}">{{ $user->email }}</a>   | **{{ $tempPassword }}**   |

@endcomponent
@endcomponent


@component('mail::subcopy')
    If you’re having trouble clicking the button above,
    copy and paste the URL below into your web browser: {{ $activateLink }}
@endcomponent

If this is not on your behalf, please ignore this email.<br>

Thanks and we see your there! <br><br>
{{ config('app.name') }}

@endcomponent
