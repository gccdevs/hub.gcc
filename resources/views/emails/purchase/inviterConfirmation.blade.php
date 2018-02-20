@component('mail::message')

{{--<a href="{{ env('APP_URL') . '/summit-2018' }}"><img style="width: 100%;height: 100%;" src="./../../../../public/images/large-logo.png" alt=""></a>--}}
<a href="{{env('APP_URL') . '/summit-2018'}}" rel="text">![]({{asset('/images/large-logo.png')}})
<br><br>
# Congratulations!

Hi,
your friend {{ $form->last_name }} just purchased a Summit 2018 ticket for your under ** {{ $email }} **

## Your purchase Detail:

@component('mail::panel', ['url' => ''])

Using `ASONE` for coupon code when registering for GCC Summit 2018 can receive a greate discount which only requires A$35.00 now!

Please share this great news with more friends and let's meet there to share God's words in your workplace.

@endcomponent

For more information about GCC 2018 Summit, please click the button below:

@component('mail::button', ['url' => env('APP_URL') . '/summit-2018'])
Learn more
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the button above,
copy and paste the URL below into your web browser: {{ env('APP_URL') . '/summit-2018' }}
@endcomponent

Thanks and we see your there! <br><br>

{{ config('app.name') }}

@endcomponent
