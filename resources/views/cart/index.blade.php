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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Cart</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row d-flex flex-column" id="table_data">
                @if (count(Auth::user()->carts()->get()))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product name</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Auth::user()->carts()->get() as $cart)
                            <tr>
                                <form action="{{ route('updateCart') }}" id="commentForm" method="post">
                                    @csrf
                                    <input type="text" value="{{$cart->id}}" name="id" hidden>
                                    <td>{{$cart->products()->first()->product_name}}</td>
                                    <td><input type="number" min="0" step="0.1" value="{{$cart->quantily}}" name="quantily"></td>
                                    <td>{{ $cart->products()->first()->product_price * $cart->quantily }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-success">Cập nhật số lượng</button>
                                        <a class="btn btn-sm btn-danger" href="{{route('deleteCart', ['id' => $cart->id])}}">Xoá</a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Have no product in cart</h3>
                @endif
            </div>

        </div>
    </div>

@endsection
