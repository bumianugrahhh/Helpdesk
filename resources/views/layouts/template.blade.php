<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.head')
	@stack('head')
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    	@include('layouts.sidebar')
    	<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            	@include('layouts.topbar')
            	@yield('content')
            </div>
            @if(Request()->path() != 'dashboard')
                @include('layouts.footer')
            @endif
        </div>
        @if(Request()->path() == 'dashboard')
            @include('layouts.footer')
        @endif
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Yakin ingin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" jika ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    	@csrf
    </form>
    @include('layouts.script')
    @stack('script')
</body>
</html>