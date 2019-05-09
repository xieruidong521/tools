@extends("layout.bootstrap")

@section('title','php代码在线运行')

@section('css')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .container{box-sizing: border-box;padding: 0;margin-top: 20px;}
        .left,.right{display: inline-block;width: 50%;float: left;position: relative;}
        .right{overflow: scroll;}
        .result{background: #eaeaea;height: 600px;padding: 10px;}
        .run-btn{position: absolute;top: 0;right: 10px;}
        label{line-height: 30px;}
        @media (max-width: 640px){.left,.right{width: 100%!important;}}
    </style>
    <link rel="stylesheet" href="{{url('static/cm/doc/docs.css')}}">
    <link rel="stylesheet" href="{{url('static/cm/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{url('static/cm/theme/darcula.css')}}">
    <link rel="stylesheet" href="{{url('static/cm/addon/hint/show-hint.css')}}">
@endsection

@section('body')
    <div class="container">
        <div class="left">
            <label for="text">php代码：</label>
            <button class="btn btn-primary run-btn" data-init="运行代码" data-running="正在执行..." onclick="run(this)">运行代码</button>
            <textarea id="text" rows="10" class="form-control">{{$initCode}}</textarea>
        </div>
        <div class="right">
            <label for="run-resule" id="result-label">执行结果：</label>
            <div class="result" id="result-field"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('static/cm/lib/codemirror.js')}}"></script>
    <script src="{{url('static/cm/addon/edit/matchbrackets.js')}}"></script>
    <script src="{{url('static/cm/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script src="{{url('static/cm/mode/xml/xml.js')}}"></script>
    <script src="{{url('static/cm/mode/clike/clike.js')}}"></script>
    <script src="{{url('static/cm/mode/php/php.js')}}"></script>
    <script src="{{url('static/cm/addon/hint/show-hint.js')}}"></script>
    <script src="{{url('static/cm/addon/hint/anyword-hint.js')}}"></script>
    <script>
        var editor=CodeMirror.fromTextArea(document.getElementById('text'),{
            mode:'application/x-httpd-php',
            indentUnit:4,
            indentWithTabs:true,
            lineNumbers:true,
            matchBrackets:true,
            theme:'darcula',
            smartIndent:true,
        }),
            result=document.getElementById('result-field')
        editor.setSize('100%','600px')
        editor.on("change", function(editor, change) {//任意键触发autocomplete
            if (change.origin == "+input"){
                var text = change.text;
                if(need(text))
                    setTimeout(function() { editor.execCommand("autocomplete"); }, 20);
            }
        });
        function run(_this) {
            $.ajax('{{route('tool.run.php')}}',{
                type:'post',
                data:{run:editor.getValue()},
                beforeSend:function () {
                    _this.innerHTML=_this.dataset.running
                    _this.setAttribute('disabled','disabled')
                },
                complete:function () {
                    _this.innerHTML=_this.dataset.init
                    _this.removeAttribute('disabled')
                },
                success:function (res, status) {
                    result.innerHTML=res.data
                },
                error:function (err) {
                    result.innerHTML='服务器出错，'+err.status+' '+err.statusText
                }
            })
        }
        function need(text){
            return /[a-zA-z]/.test(text[0])
        }
        $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')}})
    </script>
@endsection