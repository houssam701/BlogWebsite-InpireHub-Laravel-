<x-layout>
    <toasts></toasts>
    <div class="home-container">

    <section class="home">
        <div class="newPost-container">
            <form action="/editProfile/{{auth()->id()}}" method="Post" enctype="multipart/form-data">
                @csrf
                <h1>Change Profile info</h1>
                <label for="address">Address</label>
                <input type="text" name="address" id="title" value='{{old("address",$user->address)}}'>
                @error('address')
                <p style="color: red">{{$message}}</p>
                @enderror
                <label for="job">Job</label>
                <input name="job"  value="{{old('job',$user->job)}}">
                @error('job')
                <p style="color: red">{{$message}}</p>
                @enderror
                <label for="education">Education</label>
                <input type="text" name="education" value="{{old('education',$user->education)}}">
                <label for="imgae">Upload Image</label>
                <input type="file" name="avatar" accept="image/*" value="{{old('avatar',$user->avatar)}}">
                @error('avatar')
                <p>{{$message}}</p>
                @enderror
                <input type="submit" name="submit" id="submit-btn-post" value="Edit">
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