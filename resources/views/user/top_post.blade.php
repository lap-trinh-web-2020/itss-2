@extends('layout_user')
@section('content')
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Top posts</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{URL::to('/top-posts')}}">Top posts</a></li>
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

<!-- Courses area start -->
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Top 5 posts</h2>
                </div>
            </div>
        </div>

        <div class="row d-flex flex-column" id="table_data">
            <table class="table table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date created</th>
                        <th>Created by</th>
                        <th>Like</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Rank</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date created</th>
                        <th>Created by</th>
                        <th>Like</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($tops as $key => $top)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{URL::to('/posts/'.$top->post_id)}}" class="border-btn border-btn2">{{$top->title}} </a></td>
                            <td>{{$top->description}}</td>
                            <td>{{$top->date_create}}</td>
                            <td>{{$top->user_name}}</td>
                            <td>{{$top->top}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- Courses area End -->

@endsection