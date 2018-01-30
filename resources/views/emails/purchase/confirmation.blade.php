@component('mail::message')

{{--<a href="{{ env('APP_URL') . '/summit-2018' }}"><img style="width: 100%;height: 100%;" src="./../../../../public/images/large-logo.png" alt=""></a>--}}
<a href="{{env('APP_URL') . '/summit-2018'}}" rel="text">![]({{asset('/images/large-logo.png')}})
<br><br>
# Congratulations!

You have successfully purchased the 2018 Glory City Church Summit ticket!

## Your purchase Detail:

@component('mail::panel', ['url' => ''])

@component('mail::table')
|  | |
| ------------- |:--------------------------------------------------:|
|  Paid Amount | **{{ $form->coupon == env('STRIPE_CODE') ? 'A$ 69.00' : 'A$ 99.00'}}** |
| Receipt   | **{{ $form->payment_ref }}**   |
| Name  |**{{ $form->first_name }} {{ $form->last_name }}** |
| Gender|  **{{ $form->gender }}**   |
| First Time |  **{{ $form->first_time }}**   |
| Mobile|  **{{ $form->mobile }}**   |
| Email |   **{{ $form->email }}**   |
| Where heard about us |   **{{ $form->path }}**   |

@endcomponent

@endcomponent

{{--## Or save the QR Code to your portable devices:--}}
{{--@component('mail::panel')--}}
{{--<div class="visible-print text-center">--}}
{{--{!! QrCode::size(300)->generate($form); !!}--}}
{{--</div>--}}
{{--@endcomponent--}}

For more information about GCC 2018 Summit, please click the button below:

@component('mail::button', ['url' => env('APP_URL') . '/summit-2018'])
Learn more
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the button above,
copy and paste the URL below into your web browser: {{ env('APP_URL') . '/summit-2018' }}
@endcomponent

If this is not on your behalf, please ignore this email.<br>

Thanks and we see your there! <br><br>
{{ config('app.name') }}
@endcomponent
