<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="dsahboard.html" class="dash_logo"><img src="{{ asset('public/frontend/images/logo.png') }}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a href="{{ route('user.dashboard.orders') }}"><i class="fas fa-list-ul"></i> Orders</a></li>
      {{-- <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li> --}}
      {{-- <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li> --}}

      <li>
        <a href="{{ route('user.dashboard.wishlist') }}">
          <i class="far fa-heart"></i> Wishlist
        </a>
      </li>

      <li>
        <a class="active" href="{{ route('user.dashboard.profile') }}">
          <i class="far fa-user"></i> My Profile
        </a>
      </li>
      
      <li>
        <a href="{{ route('home') }}">
          <i class="fal fa-home"></i> Go Main Website
        </a>
      </li>

      <li>
        <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
          @csrf
          
            <button type="submit" class="btn btn-primary"><i class="far fa-sign-out-alt"></i> Logout</button>
            {{-- <i class="far fa-sign-out-alt"></i> Log out --}}
        </form>
      </li>
    </ul>
  </div>