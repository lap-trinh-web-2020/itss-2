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

        <form class="form-contact comment_form" action="new" id="commentForm" method="post">
            @csrf
            <div class="login-form">
                <div class="form-input">
                    <label for="name" class="col-form-label text-md-right">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="email" class="col-form-label text-md-right">Mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="phone" class="col-form-label text-md-right">Phone number</label>
                    <input id="phone" type="phone" name="phone"/>
                </div>

                <div class="form-input">
                    <label for="email" class="col-form-label text-md-right">Avatar</label>
                    <input type="file" name="avatar_url">
                </div>

                <div class="form-input">
                    <label for="password" class="col-form-label text-md-right">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="password-confirm" class="col-form-label text-md-right">Password confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-lg" name="submit" value="Registration">Add Restauran</button>
            </div>
        </form>
    </div>
    <div class="container">
        @include('admin.restauran_show')
    </div>
@endsection
