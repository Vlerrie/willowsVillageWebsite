<head>
    <style>

    </style>
</head>
<body>
<table
    style="width:100%; max-width: 800px; margin: auto; border-collapse: collapse; color: black; background-color: #F8F9FA; border-radius: 15px">
    {{--    Header--}}
    <tr>
        <td style="padding:30px 20% 20px 20%">
            <img src="{{ $message->embed(public_path('/img/logos/wsv_trans_lean.webp')) }}" width="100%">
        </td>
    </tr>
    {{--    Content--}}
    <tr>
        <td style="padding: 20px">
            @yield('content')
        </td>
    </tr>
    <tr>
        <td style="background-color: #bbbbbb; padding: 50px; text-align: center;">
            @if(isset($unsubscribe))
                Don't want these kinds of emails? <a href="{{$unsubscribe}}">unsubscribe here</a>
            @endif
        </td>
    </tr>
</table>
</body>
