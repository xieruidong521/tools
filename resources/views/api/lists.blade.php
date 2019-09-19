@extends("layout.bootstrap")
@section('title','api')
@section('css')
    <style>
        .table{width: 200px;margin:auto;}
        .table th,.table td{text-align: center;}
    </style>
@endsection
@section('body')
    @if($info=session('info'))
        <div class="alert alert-danger" role="alert" style="width: 200px;margin:auto;">{{$info}}</div>
    @endif
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th>项目名</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dirs as $dir)
            <tr>
                <td>
                    <a href="{{route('api.item',[$dir])}}">{{$dir}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
