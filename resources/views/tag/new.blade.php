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
                                <h1 data-animation="bounceIn" data-delay="0.2s">新しいタグを作成する</h1>
                                <!-- breadcrumb Start-->

                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

        <form class="form-contact comment_form" action="new" id="commentForm" method="post">
            @csrf
            <div class="form-group">
                <label>タイトル:</label>
                <input class="form-control" name="title" id="title" type="text" placeholder="タイトル"></br>
                <small>
                    <span>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </small>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-lg" name="Add Tag">タグ付けする</button>
            </div>
        </form>
    </div>
    {{-- <div class="container">
        @include('admin.tags_show')
    </div> --}}
@endsection
