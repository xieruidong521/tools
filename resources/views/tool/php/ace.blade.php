@extends("layout.bootstrap")

@section('title','php代码在线运行')

@section('css')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .container{box-sizing: border-box;padding: 0;margin-top: 20px;}
        .left,.right{display: inline-block;width: 50%;float: left;position: relative;}
        .result{background: #eaeaea;height: 600px;padding: 10px;overflow: scroll;}
        .run-btn{position: absolute;top: 0;right: 10px;}
        label{line-height: 30px;}
        @media (max-width: 640px){.left,.right{width: 100%!important;}}
        #editor{height: 600px;}
    </style>
@endsection

@section('body')
    <div class="container">
        <div class="left">
            <label for="text">php代码：</label>
            <button class="btn btn-primary run-btn" data-init="运行代码" data-running="正在执行..." onclick="run(this)">运行代码</button>
            <pre id="editor"><textarea id="text" class="form-control">{{$initCode}}</textarea></pre>
        </div>
        <div class="right">
            <label for="run-resule" id="result-label">执行结果：</label>
            <div class="result" id="result-field"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.bootcss.com/ace/1.4.4/ace.js"></script>
    <script src="https://cdn.bootcss.com/ace/1.4.4/ext-language_tools.js"></script>
    <script src="{{url('static/ace/fromcdn.js')}}"></script>
    <script>
        $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')}})
    </script>
@endsection