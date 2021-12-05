@extends('layout_admin')
@section('content')
    <!--? slider Area Start-->
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{ URL::to('/admin/home-page') }}" class="nav-link active">Admin
                    Page</a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('/home-page') }}" class="nav-link active">Home Page</a>
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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Create new restauran</h1>
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

    <form action="{{ route('restauran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_name">User Name:</label>
            <input type="text" class="form-control" id="user_name" name="user_name">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="des">Description:</label>
            <input style="height:100px; width: 100%" type="text" class="form-control" id="des" name="des">
        </div>


        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Add Restauran</button>
        </div>
    </form>
    </div>
@endsection
