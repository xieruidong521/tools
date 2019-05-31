<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
</head>
<body>
<form action="{{route('admin.system.setting')}}">
    <input type="hidden" name="changemaintenancemode" value="">
    <textarea name="message" placeholder="请输入说明" rows="5"></textarea>
    <button type="submit">{{$maintenanceMode?'立即关闭':'立即开启'}}</button>
</form>
</body>
</html>