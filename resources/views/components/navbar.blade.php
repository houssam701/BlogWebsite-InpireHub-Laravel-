<nav>
  <ul class="sidebar">
    <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
    @auth
    <li><a href="/about">About</a></li>
    <li><a href="/">Home</a></li>
    <li><a href="/author/{{auth()->id()}}">My profile</a></li>
    <li><a href="/savedPost">Saved Post</a></li>
    <li><a href="/logout">logout</a></li>
    @else
    <li><a href="/login">Login</a></li>
    @endauth

  </ul>
  <ul>
    <li id="logo">Inspire <span style="color: #695cfe;">Hub</span></li>
    @auth
    <li class="hideOnMobile"><a href="/about">About</a></li>
    <li class="hideOnMobile"><a href="/">Home</a></li>
    <li class="hideOnMobile"><a href="/author/{{auth()->id()}}">My profile</a></li>
    <li class="hideOnMobile"><a href="/savedPost">Saved Post</a></li>
    <li class="hideOnMobile"><a href="/logout">logout</a></li>
    @else
    <li class="hideOnMobile"><a href="/login">Login</a></li>
    @endauth
    <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
  </ul>
</nav>