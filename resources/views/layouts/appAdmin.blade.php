<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.Admin', 'Ujian Online') }}</title> --}}
    <title>@yield('title') - Ujian Online</title>
    <link rel="icon" href="{{ asset('/img/logo-ujian.png') }}"/>

    @include('layouts.style_appAdmin.style.adminStyle')
    @yield('styles')

</head>
<body id="page-top">
    <div id="loading"></div>
        <script>
            var load = document.getElementById("loading");

            window.addEventListener('load', function(){
             load.style.display = "none";
            });
           </script>
        @include('sweetalert::alert')

        {{-- <div id="preloader">
            <div class="socket">
             <img src="/loading/loading-web2.gif" alt="">
            </div>
        </div> --}}

        <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->
                @include('admin.component.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
               <div>
                   <!-- SuperAdmin -->
                    @yield('admin')
                    @yield('sekolah')
                    <!-- End SuperAdmin -->
                   <!-- Admin -->
                    @yield('profile')
                    @yield('content')
                    @yield('categoryUjian')
                    @yield('category')
                    @yield('post')
                    @yield('postEssay')
                    @yield('kelas')
                    @yield('siswaAdmin')
                    @yield('guruAdmin')
                    @yield('distribusiUjianKelas')
                    <!-- End Admin -->
                    @yield('blank')
                    <!-- Guru -->
                    @yield('guru')
                    <!-- End Guru -->
                    <!-- Siswa -->
                    @yield('siswa')
                    @yield('ujianSekolah')
                    <!-- End Siswa -->
                </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        @include('admin.component.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->

</div>
<!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
     </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title badge bg-danger p-2" style="font-size: 16px;" id="exampleModalLabel">Ready to Leave?</h2>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>



@include('layouts.style_appAdmin.js.adminJS')
</body>
</html>

