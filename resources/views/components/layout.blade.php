<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>InspireHub</title>
    <link rel="icon" href="/storage/images/inspirhub_logo.png" type="image/x-icon">
</head>
<body>
    <x-navbar/>

{{$slot}}
<script>
  function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>
  <script>
    document.getElementById('deleteButton').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'flex';
});

document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'none';
});

document.getElementById('confirmLink').addEventListener('click', function() {
    // Add your delete logic here
    document.getElementById('popup').style.display = 'none';
});

  </script>
  {{-- Begin of savedPost function --}}
  <script>
    function readLater(event,postId){
      event.preventDefault(); // Prevent the default anchor action

      let btn = document.querySelector('[read-btn="' + postId + '"]');
      let options ={
                method: 'POST',
                headers:{
                    'Content-type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body: JSON.stringify({post_id: postId})
            };
            fetch('/readLater',options)
            .then(response=>response.json())
            .then(data => {

                if(data.status == "removed"){
                    btn.innerHTML="Read Later";
                }else if(data.status =="added"){
                    btn.innerHTML ="Saved";
                }
            })
            .catch(error=> console.log("Error:",error));  
    }
  </script>
  {{-- Begin of Likes function  --}}
  <script>
function likePost(event,postId){
      event.preventDefault(); // Prevent the default anchor action

      let btn = document.querySelector('[like-btn="' + postId + '"]');
      let nb = document.querySelector('[nb-like="' + postId + '"]');
      let options ={
                method: 'POST',
                headers:{
                    'Content-type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body: JSON.stringify({post_id: postId})
            };
            fetch('/likePost',options)
            .then(response=>response.json())
            .then(data => {

                if(data.status == "liked"){
                    btn.innerHTML="Unlike";
                }else if(data.status =="unliked"){
                    btn.innerHTML ="Like";
                }
                nb.innerHTML=data.likes_count;
            })
            .catch(error=> console.log("Error:",error));  
    }
  </script>
</body>
</html>