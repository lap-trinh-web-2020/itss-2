<!-- DataTables Example -->
<div class="card mb-3 edus-content-item-4">
    <div class="card-header">
        <i class="fas fa-table"></i>
        All Restauran
        <div class="float-right"><a href="{{ URL::to('tags/new') }}"><button class="btn btn-outline-secondary btn-sm">Add new restauran</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Restaurant Name</th>
                        <th>Email</th>
                        <th>Posts</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Restaurant Name</th>
                        <th>Email</th>
                        <th>Posts</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->isRestauran == 1)
                            <tr>
                                <td><a href="{{ URL::to('users/' . $user->user_id) . '/posts' }}">{{ $user->user_name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->posts->count() }}</td>
                                <td><a class="btn btn-primary btn-sm" href={{ URL::to('users/' . $user->user_id) }}>Show</a></td>
                                <td><a class="btn btn-danger btn-sm" href={{ URL::to('users/' . $user->user_id . '/delete') }} onclick="return alert_delete('Are you sure to delete?');">Delete</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    --}}
</div>
<script>
    function alert_delete($message) {
        if(!confirm($message))
        event.preventDefault();
    }
</script>


