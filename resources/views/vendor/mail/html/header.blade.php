<tr>
    <td class="header">
        {{--<a href="{{ env('APP_URL') . '/summit-2018' }}"><img src="{{ asset('/images/large-logo.png') }}"style="margin-left: 20px;float:left;height: 5%; width:5%;"></a>--}}
        <a href="{{ $url }}">
            {{ $slot }}
        </a>
    </td>
</tr>
