@extends("layout.bootstrap")

@section('title','用户列表')

@section('css')
<style>
    .table{width: 100%;margin: 100px auto;}
    .table th,.table td{text-align: center;}
</style>
@endsection

@section('body')
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>appid</th>
                <th>用户编号</th>
                <th>头像</th>
                <th>注册时间</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->appid}}</td>
                    <td>{{$user->username}}</td>
                    <td>
                        <img src="{{$user->logo}}" alt="logo" onerror="this.style.display='none'" style="max-width:100px;max-height: 100px;">
                    </td>
                    <td>{{date('Y-m-d H:i',$user->userInfo->w_time)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">{{$users->links()}}</td>
            </tr>
        </tbody>
    </table>
@endsection