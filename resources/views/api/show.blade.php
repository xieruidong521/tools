@extends("layout.bootstrap")
@section('title','api-'.$dir)
@section('css')
    <script src="{{url('static/md/zepto.min.js')}}"></script>
    <link href="{{url('static/md/css/editormd.preview.min.css')}}" rel="stylesheet">
    <script src="{{url('static/md/editormd.min.js')}}"></script>
    <script src="{{url('static/md/lib/marked.min.js')}}"></script>
    <script src="{{url('static/md/lib/prettify.min.js')}}"></script>
    <style>
        .md-content{width: 100%;margin: auto;}
    </style>
@endsection
@section('body')
    <div id="markdown-view" class="md-content"></div>
@endsection

@section('js')
    <script id="script">
        let view=editormd.markdownToHTML('markdown-view',{
            markdown:'{!! $md_content !!}',
            htmlDecode:true,
        })
        document.getElementById('script').innerHTML=''
        var os = function() {
            var ua = navigator.userAgent,
                isWindowsPhone = /(?:Windows Phone)/.test(ua),
                isSymbian = /(?:SymbianOS)/.test(ua) || isWindowsPhone,
                isAndroid = /(?:Android)/.test(ua),
                isFireFox = /(?:Firefox)/.test(ua),
                isChrome = /(?:Chrome|CriOS)/.test(ua),
                isTablet = /(?:iPad|PlayBook)/.test(ua) || (isAndroid && !/(?:Mobile)/.test(ua)) || (isFireFox && /(?:Tablet)/.test(ua)),
                isPhone = /(?:iPhone)/.test(ua) && !isTablet,
                isPc = !isPhone && !isAndroid && !isSymbian;
            return {
                isTablet: isTablet,
                isPhone: isPhone,
                isAndroid : isAndroid,
                isPc : isPc
            };
        }();
        if(os.isPc){
           document.getElementsByClassName('md-content')[0].style.width='800px';
        }
    </script>
@endsection
