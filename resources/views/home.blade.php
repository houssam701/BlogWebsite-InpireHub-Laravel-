<x-layout>
    <toasts></toasts>
{{-- ends of toast message --}}
    
{{-- ends of search input --}}
    <div class="home-container">
    <section class="home">
      <div class="search-container">
            <form action="/search" method="POST">
              @csrf
              <input type="text" name="query" placeholder="Search For a Title or any word in the content..." required>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
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
{{-- ends of posts --}}



@if(session()->has('success'))
<script>

const toastContainer = document.querySelector("toasts");

//Predefined toasts, yummy
var toasts = [
  {
    title: "Success",
    body: "{{session('success')}}",
    type: "success"
  },
];

//Sleep function
const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay));

var interval = 500;

function displayToast() {
  toasts.forEach((item, i) => {
    setTimeout(async function () {
      //Add element
      const newToast = document.createElement("toast");
      newToast.classList.add(item.type);
      newToast.innerHTML = `<p>${item.title}</p><small>${item.body}</small>`;
      toastContainer.prepend(newToast);

      //Add animation
      var toast = document.querySelector("toast");
      toast.style.animation = "pop-up 6s ease-in-out forwards";

      //Remove toast
      toasts.splice([i]);
      await sleep(6000);
      newToast.remove();
    }, i * interval);
  });
}
displayToast();
</script>
{{-- else if logout message --}}
@elseif(session()->has('failed'))

<script>
  
const toastContainer = document.querySelector("toasts");

//Predefined toasts, yummy
var toasts = [
  {
    title: "Success",
    body: "{{session('failed')}}",
    type: "error"
  }
];

//Sleep function
const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay));

var interval = 1000;

function displayToast() {
  toasts.forEach((item, i) => {
    setTimeout(async function () {
      //Add element
      const newToast = document.createElement("toast");
      newToast.classList.add(item.type);
      newToast.innerHTML = `<p>${item.title}</p><small>${item.body}</small>`;
      toastContainer.prepend(newToast);

      //Add animation
      var toast = document.querySelector("toast");
      toast.style.animation = "pop-up 6s ease-in-out forwards";

      //Remove toast
      toasts.splice([i]);
      await sleep(6000);
      newToast.remove();
    }, i * interval);
  });
}
displayToast();
</script>
@endif
</x-layout>