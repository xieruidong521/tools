<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>^_^</title>
    <script src="{{asset('static/plyr/plyr.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/plyr/plyr.css')}}">
    <style>
        body{
            position: relative;
        }
        #player{
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }
        #video{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="player">
        <video id="video" controls crossorigin autoplay>
            <source src="{{asset('static/video/'.$filename)}}" type='video/mp4'/>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
        </video>
    </div>
<script></script>
</body>
</html>