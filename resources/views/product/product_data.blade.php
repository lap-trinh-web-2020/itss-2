<div class="row justify-content-center">
    @foreach($listProduct as $product)
    <div class="properties properties_home pb-20">
        @if($product->product_price != NULL)
        <div class="properties__card " style="width: 350px ">
            <div class="properties__img overlay1">
                @if($product->url_img == null)
                <img src="{{asset('/user/img/cover.jpeg')}}" alt="" style="height: 200px;">
                @else
                <img src="{{$product->url_img}}" alt="" style="height: 200px;">
                @endif
            </div>
            <div class="properties__caption" style="height: 100px;">
                <h3 style="text-align: center">{{$product->product_name}}</h3>
                <p style="white-space: nowrap;overflow: hidden;width: 20em;text-overflow: ellipsis; text-align: center">
                    {{$product->product_price}} ￥/ 1キロ</p>
            </div>
            <a href="{{route('addToCart', ['id' => $product->product_id])}}" class="border-btn border-btn2">カートに追加</a>
        </div>
        @endif

    </div>
    @endforeach
</div>
