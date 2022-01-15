@extends('layout_admin')
@section('content')
<div class="card">
    <div class="card-header">
        <strong style="font-size: 25px">材料管理</strong>
        <div class="float-right"><a href="{{ URL::to('admin/create_product') }}"><button class="btn btn-outline-success">新しい材料</button></a>
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
                        <th class="col-1">アクション</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                    <td><a href="{{ URL::to('#')}}">{{ $product->product_name }}</a></td>
                    <td>
                        <p>{{$product->product_price ? $product->product_price : 'まだ売らない'}}</p>
                    </td>
                    <td>
                        @if($product->url_img != null)
                            <img class="img-fluid" src="{{$product->url_img}}" alt="" style="width: 200px; height: 200px; ">
                        @endif
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td class="col-1">
                        <a class="btn btn-primary btn-sm" href={{ URL::to('admin/product/edit/' . $product->product_id)}}>編集</a>
                        <a class="btn btn-danger btn-sm" href={{ URL::to('admin/product/delete/'. $product->product_id) }} onclick="return alert_delete('削除してもよろしいですか？')">削除</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
