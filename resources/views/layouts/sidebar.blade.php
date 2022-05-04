<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
    <div class="sidebar-brand-icon">
      <i class="fab fa-audible"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Techno's Helpdesk</div>
  </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="{{Request()->path()=='dashboard' ? 'nav-item active' : 'nav-item'}}">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Kelola Pengguna Collapse Menu -->
    @if(Auth()->user()->tipe=='ADMIN')
    <li class="{{Request()->path()=='data-pengguna' || Request()->path()=='data-pengguna-create' || Request()->path()=='data-pengguna-edit' ? 'nav-item active' :'nav-item'}}">
      <a class="nav-link" href="{{ route('instansi.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola Pengguna</span></a>
    </li>

    <!-- Menu Pengaduan -->
    <li class="{{Request()->path()=='pengaduan' ? 'nav-item active' :'nav-item'}}">
      <a class="nav-link" href="{{ route('pengaduan.index') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Daftar Pengaduan</span></a>
    </li>
    
    <li class="{{Request()->path()=='data-teknisi' || Request()->path()=='data-teknisi-create' || Request()->path()=='data-teknisi-edit' ? 'nav-item active' :'nav-item'}}">
      <a class="nav-link" href="{{ route('teknisi.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Kelola Teknisi</span></a>
    </li>

    <li class="{{Request()->path()=='laporan' ? 'nav-item active' :'nav-item'}}">
      <a class="nav-link" href="{{route('laporan.index')}}">
        <i class="fas fa-fw fa-print"></i>
        <span>Cetak Laporan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
  @endif
  @if(Auth()->user()->tipe=='USER')
    <!-- Menu Pengaduan -->
    <li class="{{Request()->path()=='pengaduan' ? 'nav-item active' :'nav-item'}}">
      <a class="nav-link" href="{{ route('pengaduan.index') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Daftar Pengaduan</span></a>
    </li>
    <!-- Menu Pengaduan -->
    <li class="{{Request()->path()=='pengaduan-create' ? 'nav-item active': 'nav-item'}}">
      <a class="nav-link" href="{{ route('pengaduan.create') }}">
        <i class="fas fa-fw fa-plus"></i>
        <span>Tambah Pengaduan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
  @endif
  <!-- Heading -->
  <div class="sidebar-heading">
    ADDONS
  </div>    
    
  <!-- Ubah Password -->
  <li class="{{Request()->path()=='ubah-password' ? 'nav-item active' :'nav-item'}}">
    <a class="nav-link" href="{{ route('ubah-password.index') }}">
      <i class="fas fa-fw fa-key"></i>
      <span>Ubah Password</span></a>
  </li>

  <!-- Logout -->
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-power-off"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
