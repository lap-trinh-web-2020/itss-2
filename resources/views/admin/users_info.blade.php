@extends('layout_admin')
@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<!-- DataTables Example -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin/home-page">ダッシュボード</a>
    </li>
    <li class="breadcrumb-item active">ユーザー情報</li>
</ol>
<div class="card mb-3 edus-content-item-1" style="margin: 2%">
    <div class="card-header">
        <h5>
            Name: {{$user->last_name}} {{$user->first_name}}
            @if ($user->gender == 'male')
                <i class="fas fa-male"></i>
            @else
                <i class="fas fa-female"></i>   
            @endif
        </h5>
        
        <h5>Username: {{$user->user_name}}</h5>
        <h5>Email: {{$user->email}}</h5>
    </div>
    <div class="card-header">
        <h5> <i class="fas fa-clipboard"></i> 投稿の一覧</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>いいねの数</th>
                        <th>作成日</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>いいねの数</th>
                        <th>作成日</th>
                        <th></th>
                         
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($post as $key => $post)
                        
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$post->title}}</td>
                            @if(empty($like))
                            <td>0</td>
                            @else
                            <td>1</td>
                            @endif
                            <td>{{$post->date_create}}</td>
                            <td ><a href="{{ URL::to('posts/' . $post->post_id) }}"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('/js/tran.js')}}"></script>
@endsection