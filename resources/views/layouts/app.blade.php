<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Gardu Listrik</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <script src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw"></script>
  @stack('style')
  <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar header"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg box-search"><i class="fas fa-bars header-icon"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search header-icon"></i></a></li>
          </ul>
          {{--  <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>  --}}
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{asset('img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block grey-color">Hi, User</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Gardu</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">GD</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="text_admin"> <span>MENU ADMIN</span></a></li>
            <li><a class="nav-link {{$home ?? ''}}" data-target="dashboard-section" href="./"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link {{$add_gardu ?? ''}}" data-target="input-gardu-section" href="./addGardu"><i class="fas fa-plus"></i> <span>Input Gardu</span></a></li>
            <li><a class="nav-link {{$add_pengukuran ?? ''}}" data-target="input-pengukuran-section" href="./addPengukuran"><i class="fas fa-upload"></i> <span>Input Pengukuran</span></a></li>
            <li><a class="nav-link {{$add_user ?? ''}}" data-target="input-pengguna-section" href="./addUser"><i class="fas fa-user-plus"></i> <span>Input Pengguna</span></a></li>
            <li><a class="nav-link {{$list_gardu ?? ''}}" data-target="list-data-gardu-section" href="./listGardu"><i class="fas fa-list"></i> <span>List Data Gardu</span></a></li>
            <li><a class="nav-link {{$list_pengukuran ?? ''}}" data-target="list-data-pengukuran-section" href="./listPengukuran"><i class="fas fa-list-alt"></i> <span>List Data Pengukuran</span></a></li>
            <li><a class="nav-link {{$list_overload ?? ''}}" data-target="list-data-overload-section" href="./listOverload"><i class="fas fa-th"></i> <span>List Data Overload</span></a></li>
            <li><a class="nav-link {{$list_user ?? ''}}" data-target="list-data-pengguna-section" href="./listUser"><i class="fas fa-users"></i> <span>List Data Pengguna</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      @yield('main')

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="#">Me And My Friend</a>
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  @stack('list')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  @stack('main')

</body>

</html>