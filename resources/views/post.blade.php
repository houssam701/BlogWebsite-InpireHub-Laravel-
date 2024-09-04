<x-layout>
    <div class="home-container">

    <section class="home">
        <div class="post-container">
            <div class="person-info">
                <img src="/storage/avatars/{{$post->user->avatar}}" alt="" width="60px" height="60px" style="border-radius: 100%">
                <div class="person-info2">
                    <a href="">{{$post->user->username}}</a>
                    <p> Posted on {{$post->created_at->format('F d, Y \a\t h:i A')}}</p>
                </div>
            </div>
            <div class="delete-cont">
                <p><span style="font-weight:bold">Title: </span> {{$post->title}}</p>
                @can('delete',$post)<button id="deleteButton">Delete</button>@endcan
            </div>
            <hr>
            <p>{{$post->content}}</p>
            @auth    
            <div class="comment-form">
                <h4>Leave a comment:</h4>
                <form action="/post/comment/{{$post->id}}" method="POST" >
                    @csrf
                    <textarea style="padding: 4px" cols="10" rows="1" name="content" id="textarea" style="color: grey;" placeholder=" Add a comment..."></textarea>
                    <button type="submit" id="sumbit-comment-btn">Post</button>
                </form>
            </div>
            @endauth
            @foreach ($post->comments as $comment)
                <x-comment
                content="{{$comment->content}}"
                name="{{$comment->user->username}}"
                datePosted="{{$comment->created_at->format('F d, Y \a\t h:i A')}}"
                />
            @endforeach
    
        </div>
    
    </section>
</div>
<div id="popup" class="popup">
    <div class="popup-content">
        <h2>Are you sure?</h2>
        <p>Do you really want to delete this post? This process cannot be undone.</p>
        <a href="/post/delete/{{$post->id}}" id="confirmLink" class="confirm">Delete</a>
        <button id="cancelButton" class="cancel">Cancel</button>
    </div>
</div>

</x-layout>