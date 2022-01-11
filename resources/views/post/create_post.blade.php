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
                            <h1 data-animation="bounceIn" data-delay="0.2s">新しい投稿を作成する</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">ホーム</a></li>
                                    <li class="breadcrumb-item"><a href="{{URL::to('/posts')}}">全て投稿</a></li>
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
            <h4>登校の情報</h4>
            <form class="form-contact comment_form" action="{{URL::to('/create_post')}}" id="commentForm" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <b style="color: red">*</b>
                            <input class="form-control" name="title" id="title" type="text" placeholder="Title" required>
                            @error('title')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <br>
                            <label for="post_url" class="btn btn3 custom-file-upload">
                                画像をアップロード
                            </label>

                            <input type="file" name="post_url" class="file-upload" id="post_url" required accept="image/png, image/jpeg" onchange="readURL(this);"> <br>
                        </div>
                        <div class="vspace-12-sm"></div>
                    </div>
                    <div class="col-12">
                        <img
                        style=" max-width:400px;max-height: 400px" hidden id="blah" />
                    </div>
                    <div class="col-12">
                        <p>タグ <b style="color: red">*</b></p>
                        <div class="form-group">
                            @foreach($tags as $tag)
                            <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{$tag->tag_id}}">{{$tag->tag_title}}</label>
                            @endforeach
                            <br/>
                                @error('tags')
                                <b><span style="color: red;">{{ $message }}</span></b>
                                @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="description" id="comment" cols="30" rows="1" placeholder="説明。。。" required></textarea>
                            @error('description')
                            <b><span style="color: red;">{{ $message }}</span></b>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div id="list-product">
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-success" id="add-more-product" type="button">材料を追加</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">コンテンツを編集</a></li>
                            <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab">プレビューの変更</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab panes -->
                            {{-- <div class="tab-content"> --}}
                                <div role="tabpanel" class="tab-pane active" id="content">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="detail_content" id="post-content" cols="50" rows="30" placeholder="コンテンツ"></textarea>
                                        @error('detail_content')
                                        <b><span style="color: red;">{{ $message }}</span></b>
                                        @enderror
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">投稿</button>
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

    const listProduct = @json($listProduct);
    const renderListProduct = () => {
        let html = '';
        listProduct.forEach((item) => {
            if(item.product_name) {
                html += `<option value="${item.product_name}">${item.product_name}</option>`
            }
        })
        return html;
    }
    let numberProduct = 1;

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
                        <input class="form-control" type="number" min="0" step="0.1" placeholder="量" name="products[${numberProduct}][quantily]">
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
                $("#blah").removeAttr('hidden');
            };
            reader.readAsDataURL(input.files[0]);
            
        }
    }
</script>
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
@endsection
