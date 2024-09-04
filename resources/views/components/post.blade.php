<div class="post-container">
    <div class="person-info">
        <img src="/storage/avatars/{{$post->user->avatar}}" alt="" width="60px" height="60px" style="border-radius: 100%">
        <div class="person-info2">
            <a href="/author/{{$post->user->id}}">{{$author}}</a>
            <p> Posted on {{$datePosted}}</p>
        </div>
   </div>
    <h1 style="color: black">{{$title}}</h1>
    <p>{{$content}}</p>
    <div class="like-comment-container">
        <p id="likes"><span nb-like={{$id}}>{{ $post->likes()->count() }}</span> Like</p>
        <p id="comments"><span nb-like={{$id}}>{{ $post->comments()->count() }}</span> comment</p>
    </div>
    <hr style="margin-bottom: 7px">
    <a href="" id="btn-post" onclick="readLater(event,{{$id}})" read-btn={{$id}}>    @if($post->isReadLater(Auth::id())) Saved @else Read Later @endif</a>       
    <a href="/post/{{$id}}" id="btn-post">Interact</a>       
    <a href="" id="btn-post"  onclick="likePost(event,{{$id}})" like-btn={{$id}}>{{ $post->isLikedByUser(Auth::user()) ? 'Unlike' : 'Like' }}</a>
</div>