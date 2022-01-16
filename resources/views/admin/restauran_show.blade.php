@extends('layout_admin')
@section('content')
<div class="card mb-3 edus-content-item-4">
    <div class="card-header">
        <strong style="font-size: 25px">レストラン管理</strong>
        <div class="float-right"><a href="{{ URL::to('admin/create_restauran') }}"><button class="btn btn-outline-success">新しいレストラン</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>レストラン名</th>
                        <th>メール</th>
                        <th>投稿</th>
                        <th style="width: 30%;">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $user)
                    <tr>
                        <td><a href="{{ URL::to('admin/users/' . $user->user_id)}}">{{ $user->user_name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->posts->count() }}</td>
                        <td class="col-1">
                            <a class="btn btn-primary btn-sm" href={{ URL::to('users/' . $user->user_id) }}>見せる</a>
                            <a class="btn btn-danger btn-sm" href={{ URL::to('users/' . $user->user_id . '/delete') }} onclick="return alert_delete('削除してもよろしいですか？');">消去</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function alert_delete($message) {
        if (!confirm($message))
            event.preventDefault();
    }
</script>
@endsection