@extends('layout_user')
@section('content')

<!--? slider Area Start-->

<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="fadeInLeft" data-delay="0.2s">レシビを共有する<br> プラットフォーム</h1>
                            <p data-animation="fadeInLeft" data-delay="0.4s">家族や友達と一緒に食べると、いつも美味しくなります</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Courses area start -->
<div class="courses-area section-padding40 fix">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Newest Post</h2>
                </div>
            </div>
        </div> -->
        <div class="card-group">
            @foreach($posts as $post)
            <div class="properties properties_home pb-20">
                @if($post->user->isrestauran)
                <div class="properties__card" style="height: 500px;border-color: rgb(186 237 148);border-style: solid;background-color: #ecf5e3;">
                @else
                <div class="properties__card" style="height: 500px;">
                @endif
                        <div class="properties__img overlay1">
                            @if($post->post_url == null)
                            <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                            @else
                            <img src="{{$post->post_url}}" alt="" style="height: 200px;">
                            @endif
                        </div>
                        <div class="properties__caption" style="height: 200px;">
                            <h3>{{$post->title}}</h3>
                            <p style="white-space: nowrap;overflow: hidden;width: 20em;text-overflow: ellipsis;">{{$post->description}}</p>
                            <p style="font-style: italic"><a style="color:blue; " href="{{ URL::to('/users/' . $post->user_id) . '/posts' }}"><b>{{$post->user->user_name}}</b></a>によって{{$post->date_create}}に投稿された </p>
                        </div>
                        <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">もっと見る</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div>{!! $posts->links() !!}</div>
        </div>
    </div>
    <!-- Courses area End -->
    @endsection