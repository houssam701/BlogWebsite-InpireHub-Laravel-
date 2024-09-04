<x-layout>
    @if($savedPosts->isEmpty())
    <div class="savedPost-container">
        <p style="">You have no saved posts yet!</p>
    </div>
    @else
    <div class="home-container">
        <section class="home">
    @foreach ($savedPosts as $post)
    
    <x-post
    :post="$post"
    id="{{$post->id}}"
    title="{{$post->title}}"
    content="{{$post->content}}"
    datePosted="{{$post->created_at->format('F d, Y \a\t h:i A')}}"
    author="{{$post->user->username}}"
    />
     
    @endforeach   
    </section>
    </div>
    @endif

</x-layout>