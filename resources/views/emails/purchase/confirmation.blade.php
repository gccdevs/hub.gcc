@component('mail::message')
    # Purchase Confirmation

    Congratulations!

    You have successfully purchased the 2018 Glory City Church Summit ticket!

    ## Your purchase Detail:

    @component('mail::panel', ['url' => ''])

        @component('mail::table')
            |   ||
            | ------------- |:--------------------------------------------------:|
            | Receipt   | **{{ $form->payment_ref }}**   |
            | Name  |**{{ $form->last_name }}, {{ $form->first_name }}** |
            | Gender|  **{{ $form->gender }}**   |
            | Mobile|  **{{ $form->mobile }}**   |
            | Email |   **{{ $form->email }}**   |
            | Address   |   **{{ $form->address }}** |
        @endcomponent

    @endcomponent

    {{--## Or save the QR Code to your portable devices:--}}
    {{--@component('mail::panel')--}}
    {{--<div class="visible-print text-center">--}}
    {{--{!! QrCode::size(300)->generate($form); !!}--}}
    {{--</div>--}}
    {{--@endcomponent--}}

    For more information about GCC 2018 Summit, please click the button below:

    @component('mail::button', ['url' => env('APP_URL')])
        Learn more
    @endcomponent

    @component('mail::subcopy')
        If you’re having trouble clicking the button above,
        copy and paste the URL below into your web browser: {{ env('APP_URL') }}
    @endcomponent

    If this is not on your behalf, please ignore this email.<br>

    Thanks and we see your there! <br><br>
    {{ config('app.name') }}
@endcomponent
