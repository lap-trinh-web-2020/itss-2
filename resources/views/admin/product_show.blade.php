<!-- DataTables Example -->
<div class="card mb-3 edus-content-item-5">
    
    <div class="card-header">
        <i class="fas fa-table"></i>
        すべての材料
        <div class="float-right"><a href="{{ URL::to('admin/create_product') }}"><button class="btn btn-outline-secondary btn-sm">新しい材料を追加する</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>材料名</th>
                        <th>価格</th>
                        <th>写真</th>
                        <th>時間</th>
                        <th>削除</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>材料名</th>
                        <th>価格</th>
                        <th>写真</th>
                        <th>時間</th>
                        <th>削除</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)

                    <td><a href="{{ URL::to('#')}}">{{ $product->product_name }}</a></td>
                    <td>
                        <a href={{ URL::to('#') }}>{{$product->product_price ? $product->product_price : 'まだ売らない'}}</a>
                        
                    </td>
                    <td>
                        @if($product->url_img != null)
                            <img class="img-fluid" src="{{$product->url_img}}" alt="" style="width: 200px; height: 200px; ">
                        @endif 
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td><a class="btn btn-primary btn-sm" href={{ URL::to('admin/product/edit/' . $product->product_id)}}>編集</a></td>
                    <td><a class="btn btn-danger btn-sm" href={{ URL::to('admin/product/delete/'. $product->product_id) }} onclick="return alert_delete('削除してもよろしいですか？')">削除</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>