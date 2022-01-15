@extends('layout_admin')
@section('content')
<div class="card">
    <div class="card-header">
        <strong style="font-size: 25px">投稿管理</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>時間</th>
                        <th class="col-1">アクション</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)

                    <td><a href="{{ URL::to('posts/' . $post->post_id) }}">{{ $post->title }}</a></td>
                    <td>
                        <a href={{ URL::to('users/' . $post->user_id) }}>{{$post->user->user_name}}</a>
                    </td>
                    <td>{{ $post->date_create }}</td>
                    <td class="col-1">
                        <a class="btn btn-primary btn-sm" href={{ URL::to('posts/' . $post->post_id) }}>見せる</a>
                        <a class="btn btn-danger btn-sm" href={{ URL::to('posts/delete/' . $post->post_id) }} onclick="return alert_delete('削除してもよろしいですか？');">削除</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
