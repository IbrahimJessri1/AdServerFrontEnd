




<section id="topbar" class="d-flex align-items-center">
    @if(isset($username) && $username != "")
      <span class='ml-[75%] text-lg font-bold text-black'>Welcome</span> 
      &nbsp;&nbsp;&nbsp; 
      <a href="/manage_account" class="hover:text-black"> <span class="text-lg text-white-500">{{$username}}</span>  </a>
      <form class="inline ml-[2%]" method="POST" action="/logout">
        @csrf
        <button type="submit" class='hover:text-black'>
          <i class="fa-solid fa-door-closed"></i> Log out
        </button>
      </form>
    @endif
</section>