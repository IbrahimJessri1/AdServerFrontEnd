
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/advertiser/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/advertiser/ads">
        <i class="fas fa-ad menu-icon"></i>
        <span class="menu-title">My Ads</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/advertiser/create">
        <i class="fas fa-plus menu-icon"></i>
        <span class="menu-title">Create Ad</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link">
        <i class="menu-icon fa-solid fa-door-closed"></i>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit" class='hover:text-black'>
            <span class="menu-title">Log Out</span>
          </button>
        </form>
      </a>
    </li>
    
  </ul>
</nav>