<strong style="font-size: 40px; margin-left: 1%">材料リスト</strong>
<div class="row mt-5">
    @foreach($listProduct as $product)
    <div class="properties properties_home pb-20">
        @if($product->product_price != NULL)
        <div class="properties__card " style="width: 350px; justify-content: center">
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
            <a style="cursor: pointer"
                onclick="addCart('{{$product->product_name}}', {{$product->product_price}}, {{$product->product_id}});"
                class="border-btn border-btn2">カートに追加
            </a>
        </div>
        @endif

    </div>
    @endforeach
</div>

<script>
    var total = 0;
    function totalP(quantity,price) {
        total = quantity*price
        document.getElementById("total").innerHTML = total.toFixed(2)
    }
    function addCart(name, price, id) {
        // document.getElementsByClassName("swal2-popup").style.fontSize = "large"
        Swal.fire({
            title: name + 'の追加',
            html: '<table class="table" style="text-align: center" >' +
                '<thead>' +
                '<tr>'+
                '<th scope="col">材料名</th>'+
                '<th scope="col">量</th>' +
                '<th scope="col">単価</th> ' +
                '</tr>' +
                '</thead>'+
                '<tr>'+
                '<td>'+name+'</td>'+
                '<td><input onchange="totalP(this.value,'+price+');" type="number" id="quantily" min="0" step="0.1" placeholder="量"></td>'+
                '<td>'+price+'￥／キロ</td>'+
                '</tr>'+
                '</table>'+
                '<p style="font-size: 2rem">合計:<span id="total">0</span>￥</p>',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'はい',
            cancelButtonText: '取消',
        }).then((result) => {
            if (result.isConfirmed) {
                $(document).ready(() => {
                    $.ajax({
                        url: "{{ route('addCart') }}",
                        method: "get",
                        data: {
                            id: id,
                            name: name,
                            quantily: document.getElementById('quantily').value,
                        },
                        success: (response) => {
                            Swal.fire(
                                '追加完了',
                                '',
                                'success'
                            )
                            document.getElementById("cartnum").innerHTML = 'カート(' + response.data +')'
                        },
                        error: (response) => {
                            Swal.fire(
                                'エラー',
                                '',
                                'error'
                            )
                        }
                    });
                });
            }
        })
    }
</script>

<style>
    .swal2-popup{
        font-size: 2rem !important;
    }
</style>
