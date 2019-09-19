@extends("layout.bootstrap")
@section('title','api-'.$dir)
@section('css')
    <script src="https://cdn.bootcss.com/markdown-it/10.0.0/markdown-it.min.js"></script>
    <link href="https://cdn.bootcss.com/skeleton/2.0.4/skeleton.min.css" rel="stylesheet">
    <style>
        .md-content{width: 60%;min-width: 500px;margin: auto;}
    </style>
@endsection
@section('body')
    <div class="md-content">{!! $md_html !!}</div>
@endsection

@section('js')
@endsection
