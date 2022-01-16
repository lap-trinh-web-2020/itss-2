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
        @include('user.listItems.list_items', ['posts' => $posts])
    </div>
</div>

<script type="text/javascript">
    
</script>
@endsection
