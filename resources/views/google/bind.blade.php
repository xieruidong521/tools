<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>绑定谷歌验证器</title>
    <style>
        table{width:300px;margin:20px auto;}
        table tr{vertical-align: middle;text-align: center;}
        .error{color: deepskyblue;}
    </style>
</head>
<body>
<form action="" autocomplete="off" method="post">
    {{csrf_field()}}
    <table>
        <tbody>
        @if($errors->first()||session('error'))
            <tr>
                <td class="error" colspan="2">{{$errors->first()}}{{session('error')}}</td>
            </tr>
        @endif
        <tr>
            <td>
                密钥：
            </td>
            <td>
                {{$secret}}
                <input type="hidden" name="source_code" value="{{$secret}}">
            </td>
        </tr>
        <tr>
            <td>
                请扫描二维码：
            </td>
            <td>
                {!! QrCode::size(150)->generate($codeurl) !!}
            </td>
        </tr>
        <tr>
            <td>
                请输入验证码：
            </td>
            <td>
                <input name="user_code"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button>绑定</button>
            </td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>