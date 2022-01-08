@extends('layout_admin')
@section('content')
<!--? slider Area Start-->
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="{{ URL::to('/admin/home-page') }}" class="nav-link active">管理ページ</a>
        </li>
        <li class="nav-item">
            <a href="{{ URL::to('/home-page') }}" class="nav-link active">ホームページ</a>
        </li>
    </ul>
</div>
<div class="container">

    <form action="{{URL::to('admin/product/edit/' . $product->product_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        @endif
        <div class="form-group">
            <label for="product_name">材料名：</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required="required" value={{ $product->product_name }}>
        </div>
        <div class="form-group">
            <label for="price">お金 (１キロガム)</label>
            <input type="number" min="0" step="0.1" id="product_price" name="product_price" value={{ $product->product_price }}>
        </div>
        @if($product->url_img != NULL)
        <img src="{{ $product->url_img }}">
        @endif
        <div class="form-group">
            <label for="price">写真をアプロード</label>
            <input type="file" name="url_img" accept="image/png, image/jpeg">
        </div>
        <div class="form-group" >
            <button style="cursor:pointer" type="submit" class="btn btn-primary">材料を追加</button>
        </div>
    </form>
</div>
@endsection