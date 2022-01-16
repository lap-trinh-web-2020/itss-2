@extends('layout_user')
@section('content')
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="text-center" style="margin-top: 200px">
                        <h1 style="color: white; font-size: 80px">全ての材料</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row d-flex flex-column" id="table_data">
                @include('product.product_data')
            </div>

        </div>
    </div>
    <!-- Courses area End -->

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"?page="+page,
                    success:function(data)
                    {
                        console.log("data is "+data)
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>
@endsection
