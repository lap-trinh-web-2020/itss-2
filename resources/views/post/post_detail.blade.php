@extends('layout_user')
@section('content')

<style>
    .modal-open .modal {
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 10000;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: -3px;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }
</style>
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">{{$post->title}}</h1>

                            @foreach($post_tags as $tag)
                            <button type="button" class="btn-warning btn" style="padding: 15px 10px !important;"><a href="{{ URL::to('/posts/tag/'.$tag->tag_id) }}">{{$tag->tag_title}}</a></button>
                            @endforeach
                            <br /><br />
                            @if(($current_user->user_id == $post->user->user_id) or ($current_user->admin))
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @if($current_user->user_id == $post->user->user_id)
                                    <li class="breadcrumb-item"><a href="{{URL::to('/edit/'.$post->post_id)}}">編集</a>
                                    </li>
                                    @endif
                                    <li class="breadcrumb-item"><a href="{{URL::to('/posts/delete/'.$post->post_id)}}">削除</a></li>
                                </ol>
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--? Blog Area Start -->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 posts-list">
                <div class="single-post">


                    <div class="feature-img">
                        @if($post->post_url == null)
                        <img class="img-fluid" src="{{asset('/user/img/pj3.1.png')}}" alt="">
                        @else
                        <img class="img-fluid" src="{{$post->post_url}}" alt="">
                        @endif
                    </div>
                    <div class="blog_details">
                        <h2 style="color: #2d2d2d;">
                            {{$post->title}}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a style="color:blue; " href="{{ URL::to('users/' . $post->user->user_id) }}"><i class="fa fa-user"></i> <b>{{$post->user->user_name}}</b></a></li>
                            <li><a href="#comments-area"><i class="fa fa-comments"></i> {{$comment_count}} コメント</a></li>
                            <li><a href="#"><i class="far fa-calendar"></i> {{$post->date_create}} </a></li>
                            <li class="like-info">
                                <span class="align-middle"><i class="fa fa-heart"></i></span>
                                <span class="count-like"> {{$count_like}} 好きな人の数</span>
                            </li>
                            <div id="react-btn">
                                @if($search_user_post->like_state == 0)
                                <a href="{{URL::to('/posts/'.$post->post_id.'/react/')}}"><span class='fa-thumb-styling fa fa-thumbs-up react-ajax ' post-id="{{ $post->post_id}}"></span></a>
                                @else
                                <a href="{{URL::to('/posts/'.$post->post_id.'/react/')}}"><span class='fa-thumb-styling fa fa-thumbs-up react-ajax reacted' post-id="{{ $post->post_id}}"></span></a>
                                @endif
                                {{-- <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a> --}}
                            </div>
                        </ul>
                        <script>
                            $(document).ready(function() {
                                $(document).on('click', '.react-ajax', function(event) {
                                    event.preventDefault();
                                    var post_id = $(this).attr('post-id');
                                    console.log("post id is " + post_id);
                                    fetch_data(post_id);
                                });

                                function fetch_data(post_id) {
                                    $(".react-ajax").toggleClass("reacted");
                                    $.ajax({
                                        url: post_id + "/react",
                                        success: function(data) {
                                            console.log(data);
                                            $('.count-like').html(data + " people like this");
                                        }
                                    });
                                }
                            });
                        </script>
                        <div class="quote-wrapper">
                            <div class="quotes">
                                <script src="https://cdn.jsdelivr.net/npm/markdown-element/dist/markdown-element.min.js">
                                </script>
                                <div>
                                    <h2>材料</h2>
                                    <table class="table">
                                        @foreach($product_of_posts as $product_of_post)
                                        <tr>
                                            <td class="{{$product_of_post->product_price ? 'product-green' : 'product-red'}}">{{$product_of_post->product_name}}</td>
                                            <td>{{$product_of_post->quantily}} キロ</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <button type="button" class="btn btn-success mb-5" data-toggle="modal" data-target="#previeCart">カートに追加</button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-preview-cart" id="previeCart" tabindex="-1" role="dialog" aria-labelledby="previeCart" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body pt-3" style="margin-top: 12%">
                                                    <h1 class="modal-title p-3 text-center">材料リスト</h1>

                                                    <table class="table" style="text-align: center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">材料名</th>
                                                                <th scope="col">量</th>
                                                                <th scope="col">単価</th>
                                                            </tr>
                                                        </thead>
                                                        @php
                                                        $total = 0;
                                                        $listProductId = [];
                                                        $listQuantily = [];
                                                        @endphp
                                                        @foreach($product_of_posts as $product_of_post)
                                                        @if($product_of_post->product_price)
                                                        @php
                                                        $total = $total + ($product_of_post->product_price ? ($product_of_post->product_price * $product_of_post->quantily) : 0);
                                                        $listProductId[] = $product_of_post->product_id;
                                                        $listQuantily[] = $product_of_post->quantily;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$product_of_post->product_name}}</td>
                                                            <td>{{$product_of_post->quantily . "キロ"}} </td>
                                                            <td>{{$product_of_post->product_price ? $product_of_post->product_price . "￥／キロ" : "売らない"}} </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </table>
                                                    <p>合計: {{$total}} ￥</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                    <a class="btn btn-primary" href="{{route('addToCart', ['id' => $product_of_posts->pluck("product_id")->toArray(), 'quantily' => $product_of_posts->pluck("quantily")->toArray(), 'price' => $product_of_posts->pluck("product_price")->toArray()])}}">カートに追加</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2>内容</h2>
                                <mark-down pedantic>
                                    {{$post->content}}
                                </mark-down>
                            </div>
                        </div>

                    </div>
                    <div class="comments-area" id="comments-area">
                        <h4>{{$comment_count}} コメント</h4>
                        @foreach($comments as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        @if($comment->avatar_url == null)
                                        <div class="cmt-ava">
                                            <img src="{{asset('/user/img/default_avt.jpg')}}">
                                        </div>
                                        @else
                                        <div class="cmt-ava">
                                            <img src="{{$comment->avatar_url}}" alt="author avatar">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="desc">

                                        <p><a style="color:blue; " href="{{ URL::to('users/' . $post->user->user_id) }}">{{$comment->user_name}}</a>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    @if ($comment->url_img != NULL)
                                                    <img class="img-fluid" src="{{$comment->url_img}}" alt="" style="height: 200px; width: 200px">
                                                    @endif
                                                    <p class="comment">
                                                        {{$comment->content}}
                                                    </p>

                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <p>{{$comments->links()}}</p>
                    </div>
                </div>

                <div class="comment-form">
                    <h4>あなたのコメント</h4>
                    <div class="col-12">
                        <img style=" max-width:200px;max-height: 200px; margin: -3% 0 20px 0" hidden id="blah" />
                    </div>
                    <form method="post" class="form-contact comment_form" action="{{URL::to('/posts/{$post->post_id}/comment')}}" id="commentForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value='{{$post->post_id}}'>
                        <input type="hidden" name="user_id" value="{{$current_user->user_id}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-xs-12 col-sm-8">
                                <label for="url_img" class="btn btn3 custom-file-upload">
                                    <i class="fas fa-image"></i>
                                </label>
                                <input type="file" name="url_img" class="file-upload" id="url_img" accept="image/png, image/jpeg" onchange="readURL(this);">
                            </div>
                            <div class="vspace-12-sm"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">コメントを残す</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title" style="color: #2d2d2d;">最近の投稿</h3>
                        @foreach($recent_posts as $post)
                        <div class="media post_item">
                            <div class="media-body">
                                <a href="{{URL::to('/posts/'.$post->post_id)}}">
                                    <h3 style="color: #2d2d2d;">{{$post->title}}</h3>
                                </a>
                                <p>{{$post->date_create}}</p>
                            </div>
                        </div>
                        @endforeach

                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title" style="color: #2d2d2d;">これらのカテゴリーが好きかもしれない</h4>
                        <ul class="list cat-list">
                            @foreach ($tags as $tag )
                            <li>
                                <a href="{{URL::to('/posts/tag/'.$tag->tag_id)}}" class="d-flex">
                                    <p>{{$tag->tag_title}}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Area End -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
                $("#blah").removeAttr('hidden');
            };
            reader.readAsDataURL(input.files[0]);

        }
    }
</script>
@endsection