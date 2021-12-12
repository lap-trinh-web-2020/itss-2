
@extends('layout_user')
@section('content')

<section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">タイトルで投稿を検索!!</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ URL::to('/home-page') }}">ホーム</a></li>
                                        <li class="breadcrumb-item"><a href="{{ URL::to('/posts') }}">すべての投稿</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section >
        <div>
            @if(isset($searchResults))
                @if ($searchResults-> isEmpty())
                <div class="courses-area section-padding40 fix">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8">
                                <div class="section-tittle text-center mb-55">
                                    <h2>申し訳ありませんが、その期間の結果は見つかりませんでした <b>"{{ $searchterm }}"</b>.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    {{-- <h2>Type:{{ $type }}</h2> --}}

                            <div class="courses-area section-padding40 fix">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-7 col-lg-8">
                                            <div class="section-tittle text-center mb-55">
                                                <h2>{{ $searchResults->count() }} 結果があります <b>"{{ $searchterm }}"</b></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="courses-actives">
                                        @foreach($modelSearchResults as $searchResult)
                                        <!-- Biến $url được cấu hình trong file model-->
                                        <div class="properties pb-20">
                                                    <div class="properties__card">
                                                        <div class="properties__img overlay1">
                                                            <div class="properties__img overlay1">
                                                                @if($searchResult->searchable->post_url == null)
                                                                    <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                                                                @else
                                                                    <img src="{{asset('/storage/post_url/'.$searchResult->searchable->post_url)}}" alt=""  style="height: 200px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="properties__caption">
                                                            <h3>{{$searchResult->title}}</h3>
                                                            <p>{{$searchResult->searchable->description}}</p>
                                                            <p style="font-style: italic">時間　：{{$searchResult->searchable->date_create}}、著者 ：{{$searchResult->searchable->user->user_name}}</p>
                                                            <a href="{{URL::to('/posts/'.$searchResult->searchable->post_id)}}" class="border-btn border-btn2">続きを読む</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            @endif
        </div>
    </section>
@endsection
