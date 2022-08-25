




<section id="topbar" class="d-flex align-items-center">
    {{-- <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div> --}}
    @if(isset($username) && $username != "")
      <span class='ml-[75%] text-lg font-bold text-black'>Welcome</span> 
      &nbsp;&nbsp;&nbsp; 
      <span class="text-lg text-white-500">{{$username}}</span> 
      <form class="inline ml-[2%]" method="POST" action="/logout">
        @csrf
        <button type="submit" class='text-white hover:text-black'>
          <i class="fa-solid fa-door-closed"></i> Logout
        </button>
      </form>
    @endif
</section>