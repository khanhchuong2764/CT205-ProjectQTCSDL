<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          @if (isset($user))
              <p>Chào, {{ $user->fullname }}</p>
          @endif
      </li>
      <li class="nav-item">
          <a class="btn btn-danger btn-sm" href="/admin/auth/logout">Đăng Xuất</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
          </a>
      </li>
    </ul>
    {{-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          @if (isset($user))
            <p>Chào, {{ $user->fullname}}</p>
          @endif
      </li> 
      <li class="nav-item">
        <a class="btn btn-danger btn-sm" href="/admin/auth/logout">Đăng Xuất</a>  
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul> --}}
</nav>