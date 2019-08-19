<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recaptcha</title>
</head>
<body>
    <form action="" method="post">
        {{csrf_field()}}
        用户名：<input type="text" name="username"><br>
        密　码：<input type="text" name="password"><br>
        验证码：<div class="g-recaptcha" data-sitekey="{{config('google.recaptcha_public_key')}}"></div>

        <button type="submit">提交</button>
    </form>
    <script src='https://www.recaptcha.net/recaptcha/api.js'></script>
</body>
</html>