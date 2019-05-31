<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>验证码验证</title>
    <style>
        .success{color: deepskyblue;}
        .error{color: red;}
    </style>
</head>
<body>
<form action="" method="post" autocomplete="off">
    @if(session('success')||session('error'))
        <div class="{{session('success')?'success':'error'}}">{{session('success')?:session('error')}}</div>
    @endif
    <input placeholder="请输入验证码" name="code" autofocus>
        {{csrf_field()}}
    <button>验证</button>
</form>
</body>
</html>