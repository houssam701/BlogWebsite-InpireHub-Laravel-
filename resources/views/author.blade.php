<x-layout>
    <div class="home-container">

        <section class="home">
            <!-- author container -->
            <div class="author-container">
                <img src="/storage/avatars/{{$user->avatar}}" alt="" width="250px" height="250px">    
                <div class="author-info">
                    <h1>{{$user->username}}</h1>           
                    <p><?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg width="25px" height="24px" height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 32 32" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M7,5l-3,-0c-0.796,-0 -1.559,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121l-0,16c-0,0.796 0.316,1.559 0.879,2.121c0.562,0.563 1.325,0.879 2.121,0.879c5.154,0 18.846,0 24,-0c0.796,0 1.559,-0.316 2.121,-0.879c0.563,-0.562 0.879,-1.325 0.879,-2.121l-0,-16c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879l-3,-0l-0,-1c-0,-1.657 -1.343,-3 -3,-3l-12,0c-1.657,0 -3,1.343 -3,3l-0,1Zm-4,7.437l-0,11.563c-0,0.265 0.105,0.52 0.293,0.707c0.187,0.188 0.442,0.293 0.707,0.293l24,0c0.265,0 0.52,-0.105 0.707,-0.293c0.188,-0.187 0.293,-0.442 0.293,-0.707l0,-11.562c0,-0 -9.857,4.333 -9.995,4.335l-0.005,-0l0,1.239c0,0.553 -0.448,1 -1,1l-4,0c-0.552,0 -1,-0.447 -1,-1l-0,-1.243c-0.136,0 -10,-4.332 -10,-4.332Zm14,1.563l0,3.012c0,0 -2,0 -2,0c-0,0 -0,-3.012 -0,-3.012l2,0Zm12,-3.75l0,-2.25c0,-0.265 -0.105,-0.52 -0.293,-0.707c-0.187,-0.188 -0.442,-0.293 -0.707,-0.293l-24,-0c-0.265,-0 -0.52,0.105 -0.707,0.293c-0.188,0.187 -0.293,0.442 -0.293,0.707l0,2.25l10,4.426l-0,-1.676c0,-0.552 0.448,-1 1,-1l4,-0c0.552,-0 1,0.448 1,1l0,1.679l10,-4.429Zm-6,-5.25l-0,-1c-0,-0.552 -0.448,-1 -1,-1c-0,0 -12,0 -12,0c-0.552,0 -1,0.448 -1,1l-0,1l14,-0Z"/><g id="Icon"/></svg><span style="margin-left: 4px;">{{$user->job}}</span></p>
                    <p> <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.0//EN'  'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'><svg width="25px" height="25px" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="12,3 1,9 12,15 23,9 "/><polygon points="19,12.8 12,17 5,12.8 5,17.2 12,21 19,17.2 "/><rect height="8" width="2" x="21" y="9"/></svg><span style="margin-left: 3px;"> {{$user->education}}</span></p>
                    <p><?xml version="1.0" ?><svg width="25px" height="25px"  viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M24 4c-7.73 0-14 6.27-14 14 0 10.5 14 26 14 26s14-15.5 14-26c0-7.73-6.27-14-14-14zm0 19c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/><path d="M0 0h48v48H0z" fill="none"/></svg> <span style="margin-left: 3px;">{{$user->address}}</span></p>
                    <p>Post count: {{$numberOfPosts}}</p>
                    @can('update',$user)
                    <a href="/editAuthor/{{auth()->id()}}" id="edit-profile" style="margin-top:5px;">Edit Profile</a>
                    <a href="/newpost" id="edit-profile" style="margin-top:5px;">Add Post</a>
                    @endcan
                </div>
            </div>
            <div class="line1"></div>
            <!-- ends of author container -->
            @foreach($posts as $post)
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
    
</x-layout>