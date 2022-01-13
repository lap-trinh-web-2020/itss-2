@extends('layout_user')
@section('content')
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2" style="height: 0%">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">{{$post->title}}</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">ホーム</a></li>
                                    <li class="breadcrumb-item"><a href="{{URL::to('/posts')}}">全ブログ</a></li>
                                </ol>
                            </nav>
                            <!-- breadcrumb End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="comment-form">
            <h4>投稿の編集</h4>
            <form class="form-contact comment_form" action="{{URL::to('/edit/'.$post->post_id)}}" id="commentForm" method="post" enctype="multipart/form-data" onsubmit="return validateData()">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">                           
                            <input class="form-control" name="title" id="title" type="text" placeholder="題名" value="{{$post->title}}" >
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <label for="post_url" class="btn btn3 custom-file-upload">
                                画像をアップロード
                            </label>

                            <input type="file" name="post_url" class="file-upload" id="post_url" onchange="readURL(this);">
                            {{-- <input type="file" name="post_url" id="post_url"> --}}
                        </div>
                        <div class="vspace-12-sm"></div>
                    </div>
                    <div class="col-12">
                        <img src="{{$post->post_url}}" style=" max-width:400px;max-height: 400px" id="blah" />
                    </div>
                    <div class="col-12">
                        <p>タグ</p>
                        <div class="form-group">
                            @foreach($tags as $tag)
                            <label class="checkbox-inline" >
                                @if(in_array($tag->tag_id, $selected_tags_array))
                                    <input type="checkbox" name="tags[]" value="{{$tag->tag_id}}" checked><b>{{$tag->tag_title}}</b>
                                @else
                                    <input type="checkbox" name="tags[]" value="{{$tag->tag_id}}">{{$tag->tag_title}}
                                @endif
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="description" id="comment" cols="30" rows="1" placeholder="説明">{{$post->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div id="list-product" style="margin-top: 20px">
                            @foreach ($product_of_posts as $key => $prod)
                                <div class="row mb-2" id="div-delete-product-{{$key+1}}">
                                    <div class="col-md-6">                                
                                        {{-- @dd($prod->product_name)        --}}
                                        <select class="form-control select-2" name="products[{{$key+1}}][name]" theme="classic" >                                                                                          
                                            @foreach ($listProduct as $item)
                                                @if($item->product_name == $prod->product_name)
                                                <option value="{{$item->product_name}}" selected>{{$item->product_name}}</option>
                                                @else
                                                <option value="{{$item->product_name}}">{{$item->product_name}}</option>
                                                @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col">
                                            <div class="col-md-6">
                                            <input class="form-control" type="number" min="0" placeholder="量" name="products[{{$key+1}}][quantily]" value="{{$prod->quantily}}" required>
                                            </div>
                                            <div class="col-md-6" style="align-content: center;">
                                                <p>キロ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger btn-delete-product" id="delete-product-{{$key+1}}" type="button">削除</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-success" id="add-more-product" type="button" style="margin-top: 20px">材料を追加</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">コンテンツを編集する</a></li>
                            <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab">プレビューの変更</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab panes -->
                            {{-- <div class="tab-content"> --}}
                                <div role="tabpanel" class="tab-pane active" id="content">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="detail_content" id="post-content" cols="50" rows="30" placeholder="コンテンツ">{{$post->content}}</textarea>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="preview" style="padding: 40px  70px 40px 70px">
                                    <script src="https://cdn.jsdelivr.net/npm/markdown-element/dist/markdown-element.min.js"></script>
                                    <mark-down >
                                        {{$post->content}}
                                    </mark-down>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div class="form-group" style="margin: 6% auto">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">アップデート</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#post-content").change(function(){
            $("mark-down").html($(this).val())
        });
    });
    function validateData(){
        var tags = document.getElementsByName('tags[]');
        for(let i = 0; i < tags.length; i++){
            if(tags[i].checked)
                return true;
        }
        alert("Please choose tag");
        return false;
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            
        }
    }

    const listProduct = @json($listProduct);
    const productPost = @json($product_of_posts);
    const renderListProduct = () => {
        let html = '';
        listProduct.forEach((item) => {
            if(item.product_name) {
                html += `<option value="${item.product_name}">${item.product_name}</option>`
            }
        })
        return html;
    }
    let numberProduct = productPost.length+1;

    $('#add-more-product').on('click', function () {
        $('#list-product').append(`
            <div class="row mb-2" id="div-delete-product-${numberProduct}">
                <div class="col-md-6">
                    <select class="form-control select-2" name="products[${numberProduct}][name]">
                        <option value=""></option>
                        ${renderListProduct()}
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="col">
                        <div class="col-md-6">
                        <input class="form-control" type="number" min="0" step="0.1" placeholder="量" name="products[${numberProduct}][quantily]" required>
                        </div>
                        <div class="col-md-6" style="align-content: center;">
                            <p>キロ</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-danger btn-delete-product" id="delete-product-${numberProduct}" type="button">削除</button>
                </div>
            </div>
        `)

        numberProduct++;

        $(".select-2").select2({
            tags: true,
            theme: "classic",
            placeholder: '材料',
        });
        $('.btn-delete-product').click(function(event){
            $(`#div-${event.target.id}`).remove()
        });
    })
    $('.btn-delete-product').click(function(event){
            $(`#div-${event.target.id}`).remove()
        });

</script>
@endsection
<style>
    .select2-selection__rendered {
        line-height: 48px !important;
    }
    .select2-container .select2-selection--single {
        height: 48px !important;
    }
    .select2-selection__arrow {
        height: 46px !important;
    }
</style>
