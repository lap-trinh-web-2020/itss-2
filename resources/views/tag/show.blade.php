@extends('layout_admin')
@section('content')
    <!--? slider Area Start-->
    <div class="container">
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/home-page') }}" class="nav-link active">管理者ページ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/home-page') }}" class="nav-link active">ホームページ</a>
                </li>
        </ul>
    </div>
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">タグ <i>{{ $tag->tag_title }}</i></h1>
                                <!-- breadcrumb Start-->
                                <!-- breadcrumb End -->
                                <h4 data-animation="bounceIn" data-delay="0.2s">タグのすべての投稿</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    @if (!isset($posts))
        <h3>投稿はありません</h3>
    @else
    <div class="container">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table">すべての投稿</i> 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                 {{-<th>タグ（タグページにリダイレクト）</th>-}}
                                 <th>作成者</th>
                                 <th>作成者</th>
                                 <th colspan = "2">アクション</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>タイトル</th>
                                 {{-<th>タグ（タグページにリダイレクト）</th>-}}
                                 <th>作成者</th>
                                 <th>作成者</th>
                                 <th colspan = "2">アクション</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)

                                    <td><a href="{{ URL::to('posts/' . $post->post_id) }}">{{ $post->title }}</a></td>
                                    {{-- <td>投稿のタグ</td> --}}
                                <td><a href={{ URL::to('users/' . $post->user_id) }}>{{$post->user->user_name}}</a>
                                    </td>
                                    <td>{{ $post->date_create }}</td>
                                    <td><a href={{ URL::to('posts/' . $post->post_id) }}>見せる<a></td>
                                    <td><a href={{ URL::to('posts/delete/' . $post->post_id) }}>破壊<a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
