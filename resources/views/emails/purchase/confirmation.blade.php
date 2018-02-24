@component('mail::message')

{{--<a href="{{ env('APP_URL') . '/summit-2018' }}"><img style="width: 100%;height: 100%;" src="./../../../../public/images/large-logo.png" alt=""></a>--}}
<a href="{{env('APP_URL') . '/summit-2018'}}" rel="text">![]({{asset('/images/large-logo.png')}})
<br><br>

# Hi {{ $form->first_name }},

## Congratulations! You have just purchased a Summit 2018 ticket!

<hr>

我們渴望2018年榮耀城領袖高峰會能夠成為更多人生命突破的種子，渴望看到生命被更新，主辦單位開放【 $35 獨家特價優惠 】給 **>> 已註冊報名的你 <<** 去邀請朋友和你一起來領受著祝福！！

想要享有此優惠價的必須在報名表格首頁填寫您個人註冊使用的郵箱地址，然後在折扣券項目當中填寫：

**DOUBLEPORTION**

你就可以用 $35 的價錢為你的朋友購買到高峰會門票！捉住這次機會！

===============

Here’s a gift for you!

We are keen to see breakthrough in more people’s life!

By using your registered email address with us and apply the code:

**DOUBLEPORTION**

when registering with GCC Leadership Summit 2018, you are able to receive a great deal to pay only A$35.00 for friends that you care!

Please share this great news with more friends and let's meet there and receive God's words together.

===============

報名鏈接：https://centralhub.glorycitychurch.com/summit-2018

活動地點：Ground Floor | 150 Collins Street 3000 Melbourne CBD, Victoria

活動日期：08 - 10 March 2018

<hr>

# Your purchase Detail:

@component('mail::panel', ['url' => ''])

@component('mail::table')
|  | |
| ------------- |:--------------------------------------------------:|
|  Paid Amount | **A${{ $price }}** |
| Receipt   | **{{ $form->payment_ref }}**   |
| Recipient  |**{{ $form->first_name }} {{ $form->last_name }}** |
| Gender|  **{{ $form->gender }}**   |
| First Time |  **{{ $form->first_time }}**   |
| Mobile|  **{{ $form->mobile }}**   |
| Email |   **{{ $form->email }}**   |
| Where heard about us |   **{{ $form->path }}**   |

@endcomponent

@endcomponent

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
