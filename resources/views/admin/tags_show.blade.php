@extends('layout_admin')
@section('content')
<div class="card">
    <div class="card-header">
        <strong style="font-size: 25px">タグ管理</strong>
        <div class="float-right"><a href="{{ URL::to('tags/new') }}"><button class="btn btn-outline-success">新しいタグ</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>タグ名</th>
                         <th>投稿</th>
                         <th class = "col-2">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td><a href="{{ URL::to('tags/' . $tag->tag_id) }}">{{ $tag->tag_title }}</a></td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td class="col-2">
                                <a class="btn btn-primary btn-sm" href={{ URL::to('tags/' . $tag->tag_id) }}>すべての投稿</a>
                                <a class="btn btn-warning btn-sm" href={{ URL::to('tags/' . $tag->tag_id) . '/edit' }}>編集</a>
                                <a class="btn btn-danger btn-sm" href={{ URL::to('tags/delete/' . $tag->tag_id) }}  onclick="return alert_delete('削除してもよろしいですか？');">削除</a>
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
        if(!confirm($message))
        event.preventDefault();
    }
</script>
@endsection
