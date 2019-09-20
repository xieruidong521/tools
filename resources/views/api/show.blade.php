@extends("layout.bootstrap")
@section('title','api-'.$dir)
@section('css')
    <script src="{{url('static/md/zepto.min.js')}}"></script>
    <link href="{{url('static/md/css/editormd.preview.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/github-markdown.css')}}">
    <script src="{{url('static/md/editormd.min.js')}}"></script>
    <script src="{{url('static/md/lib/marked.min.js')}}"></script>
    <script src="{{url('static/md/lib/prettify.min.js')}}"></script>
    <style>
        .md-content{width: 50%;min-width: 500px;margin: auto;}
    </style>
@endsection
@section('body')
    <div id="markdown-view" class="md-content"></div>
@endsection

@section('js')
    <script>
        let view=editormd.markdownToHTML('markdown-view',{
            markdown:'{!! $md_content !!}',
            htmlDecode:true,
        })
    </script>
@endsection
