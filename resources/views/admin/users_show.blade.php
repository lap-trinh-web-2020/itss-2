@extends('layout_admin')
@section('content')
<div class="card">
    <div class="card-header">
        <strong style="font-size: 25px">ユーザー管理</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ユーザー名</th>
                        <th>メール</th>
                        <th>投稿</th>
                        <th>管理者</th>
                        <th>アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if($user->isrestauran == 0 )
                        <tr>
                            <td><a href="{{ URL::to('admin/users/' . $user->user_id)}}">{{ $user->user_name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{$user->admin == 1 ? 1:0 }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href={{ URL::to('users/' . $user->user_id) }}>見せる</a>
                                <a class="btn btn-danger btn-sm" href={{ URL::to('users/' . $user->user_id . '/delete') }} onclick="return alert_delete('削除してもよろしいですか？');">削除</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function alert_delete($message) {
        if(!confirm($message))
        event.preventDefault();
    }
</script>
@endsection
