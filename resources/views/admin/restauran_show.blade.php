<!-- DataTables Example -->
<div class="card mb-3 edus-content-item-4">
    <div class="card-header">
        <i class="fas fa-table"></i>
        すべてのレストラン
        <div class="float-right"><a href="{{ URL::to('admin/create_restauran') }}"><button class="btn btn-outline-secondary btn-sm">新しいレストランを追加する</button></a>
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
                         <th>詳細</th>
                         <th>アクション</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>レストラン名</th>
                         <th>メール</th>
                         <th>投稿</th>
                         <th>詳細</th>
                         <th>アクション</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->isRestauran == 1)
                            <tr>
                                <td><a href="{{ URL::to('users/' . $user->user_id) . '/posts' }}">{{ $user->user_name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->posts->count() }}</td>
                                <td><a class="btn btn-primary btn-sm" href={{ URL::to('users/' . $user->user_id) }}>見せる</a></td>
                                <td><a class="btn btn-danger btn-sm" href={{ URL::to('users/' . $user->user_id . '/delete') }} onclick="return alert_delete('削除してもよろしいですか？');">消去</a></td>
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


