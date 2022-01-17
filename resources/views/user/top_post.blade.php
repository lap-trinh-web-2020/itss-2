@extends('layout_user')
@section('content')
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="text-center" style="margin-top: 200px">
                    <h1 style="color: white; font-size: 80px">投稿ランキング</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Courses area start -->
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>トップ５</h2>
                </div>
            </div>
        </div>

        <div class="row d-flex flex-column" id="table_data">
            <table class="table table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ランク</th>
                        <th>タイトル</th>
                        <th>説明</th>
                        <th>作成日</th>
                        <th>作成人</th>
                        <th>スキの数</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ランク</th>
                        <th>タイトル</th>
                        <th>説明</th>
                        <th>作成日</th>
                        <th>作成人</th>
                        <th>スキの数</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($posts as $key => $top)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="{{URL::to('/posts/'.$top[0]->post_id)}}" class="border-btn border-btn2">{{$top[0]->title}} </a></td>
                        <td>{{$top[0]->description}}</td>
                        <td>{{$top[0]->date_create}}</td>
                        <td>{{$post_user[$key]->user_name}}</td>
                        <td>{{$top[1]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- Courses area End -->

@endsection
