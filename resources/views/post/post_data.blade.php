<div class="row justify-content-center">
    @foreach($posts as $post)
    <div class="properties properties_home pb-20">
        @if($post->user->isrestauran)
        <div class="properties__card" style="height: 500px;border-color: rgb(186 237 148);border-style: solid;background-color: #ecf5e3;">
        @else
        <div class="properties__card" style="height: 500px;">
        @endif
            <div class="properties__img overlay1">
                @if($post->post_url == null)
                <img src="{{asset('/user/img/pj3.1.png')}}" alt="" style="height: 200px;">
                @else
                <img src="{{$post->post_url}}" alt="" style="height: 200px;">
                @endif
            </div>
            <div class="properties__caption" style="height: 200px;">
                <h3>{{$post->title}}</h3>
                <p style="white-space: nowrap;overflow: hidden;width: 20em;text-overflow: ellipsis;">{{$post->description}}</p>
                <p style="font-style: italic"><a style="color:blue; " href="{{ URL::to('/users/' . $post->user_id) . '/posts' }}"><b>{{$post->user->user_name}}</b></a>によって{{$post->date_create}}に投稿された </p>
            </div>
            <a href="{{URL::to('/posts/'.$post->post_id)}}" class="border-btn border-btn2">もっと見る</a>
            </div>
        </div>
        @endforeach
    </div>

    {!! $posts->links() !!}