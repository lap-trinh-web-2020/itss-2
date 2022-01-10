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
                                <h1 data-animation="bounceIn" data-delay="0.2s">カード</h1>
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
                @if($success)
                    <h3>ご注文承りました.。</h3>
                @else
                    @if (count(Auth::user()->carts()->get()))
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">材料名</th>
                                <th scope="col">量</th>
                                <th scope="col">お金</th>
                                <th scope="col">お金に</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach(Auth::user()->carts()->get() as $key => $cart)
                                @php
                                    $total = $total + ($cart->products()->first()->product_price * $cart->quantily);
                                @endphp
                                <tr>
                                    <form action="{{ route('updateCart') }}" id="commentForm" method="post">
                                        @csrf
                                        <input type="text" value="{{$cart->id}}" name="id" hidden>
                                        <td>{{$cart->products()->first()->product_name}}</td>
                                        <td><input type="number" min="0" step="0.1" value="{{$cart->quantily}}" name="quantily" data-key="{{$key}}" data-productPrice="{{$cart->products()->first()->product_price}}" class="quantily"></td>
                                        <td>{{ $cart->products()->first()->product_price}} ＄/キロガム</td>
                                        <td><span id="price_{{$key}}" class="price">{{ $cart->products()->first()->product_price * $cart->quantily }}</span> ＄</td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success">材料を編集</button>
                                            <a class="btn btn-sm btn-danger" href="{{route('deleteCart', ['id' => $cart->id])}}">削除</a>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <p>Tổng tiền: <span id="total">{{Auth::user()->isrestauran ? $total*95/100 : $total}}</span> $</p>
                        <div class="row d-flex flex-column">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email">
                                </div>
                                <a href="{{route('submitCart')}}" class="btn btn-success">Submit</a>
                            </div>
                        </div>
                    @else
                        <h3>材料がありません。</h3>
                    @endif
                @endif
            </div>

        </div>
    </div>
    <script>
        const isrestauran = {{Auth::user()->isrestauran}};
        $('.quantily').on('input', function () {
            const key = $(this).data('key');
            const quantily = $(this).val();
            const productprice = $(this).data('productprice');
            $(`#price_${key}`).text(Math.round(quantily*productprice*10)/10)

            let total = 0;
            $(".price").each(function (index) {
                total += parseFloat($(`#price_${index}`).text());
            })
            $("#total").text(isrestauran ? total*95/100 : total);
        })
    </script>
@endsection
