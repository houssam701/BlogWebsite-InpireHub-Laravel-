<x-layout>
    <toasts></toasts>
    <div class="home-container">

    <section class="home">
        <div class="newPost-container">
            <form action="/newpost" method="Post">
                @csrf
                <h1>New Post</h1>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" required>
                @error('title')
                <p style="color: red">{{$message}}</p>
                @enderror
                <label for="content">Content</label>
                <textarea style="padding: 4px" name="content" id="content" cols="30" rows="10" placeholder=" Add you content here..."></textarea>
                @error('content')
                <p style="color: red">{{$message}}</p>
                @enderror
                <input type="submit" name="submit" id="submit-btn-post" value="Post">
            </form>
        </div>
    </section>
  </div>
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

var interval = 2000;

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