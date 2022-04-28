<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion shadow-sm" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center {{ Request::is('dashboard')? " active ":" " }}" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <i class="bi bi-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ __("Ujian Online") }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('home')? " active ":" " }}">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __("Dashboard") }}</span></a>
    </li>
    <li class="nav-item {{ Request::is('profile')? " active ":" " }}">
        <a class="nav-link " href="{{ url('/profile') }}">
            <i class="bi bi-person-workspace"></i>
            <span>{{ __("Profile") }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading  text-gray-200">
        {{ __('Materi Ujian') }}
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item {{ Request::is('categories') ? " active ":" " }} || {{ Request::is('categories-edit-*') ? " active ":" " }} || {{ Request::is('categories-show-*') ? " active ":" " }} ">
        <a class="nav-link" href="{{ url('/categories') }}">
            <i class="fas fa-clipboard-list "></i>
            <span>{{ __('Category') }}</span></a> 
            
    </li>

    <!-- Nav Item - Posts Ujian -->
    <li class="nav-item {{ Request::is('posts')? " active ":" " }} || {{ Request::is('posts-edit-*') ? " active ":" " }} || {{ Request::is('posts-show-*') ? " active ":" " }}">
        <a class="nav-link " href="{{ url('/posts') }}">
            <i class="bi bi-file-post"></i>
            <span>{{ __('Post Ujian') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading text-gray-200">
        {{ __('Data Users') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item 
    {{ Request::is('kelas')? " active ":" " }} || {{ Request::is('kelas-edit-*')? " active ":" " }} || {{ Request::is('kelas-show-*')? " active ":" " }}
    || {{ Request::is('siswa')? " active ":" " }} || {{ Request::is('siswa-edit-*')? " active ":" " }} || {{ Request::is('siswa-show-*')? " active ":" " }}
    || {{ Request::is('guru')? " active ":" " }} || {{ Request::is('guru-edit-*')? " active ":" " }} || {{ Request::is('guru-show-*')? " active ":" " }}
    || {{ Request::is('#')? "active ":" " }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="bi bi-person-circle"></i>
            <span>{{ __('Users') }}</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Users</h6>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('#') }}">Guru</a>
                <a class="collapse-item {{ Request::is('kelas')? " active ":" " }} || {{ Request::is('kelas-edit-*')? " active ":" " }} || {{ Request::is('kelas-show-*')? " active ":" " }}" href="{{ url('/kelas') }}">Kelas</a>
                <a class="collapse-item {{ Request::is('siswa')? " active ":" " }} || {{ Request::is('siswa-edit-*')? " active ":" " }} || {{ Request::is('siswa-show-*')? " active ":" " }}" href="{{ url('/siswa') }}">Siswa</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-gray-200">
        {{ __('Data Ujian') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('#')? " active ":" " }} {{ Request::is('#')? "active ":" " }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataUjianSiswa1" aria-expanded="true" aria-controls="collapseDataUjianSiswa1">
            <i class="bi bi-person-lines-fill"></i>
            <span class="badge bg-info">{{ __('Kelas VII (7)') }}</span>
        </a>
        <div id="collapseDataUjianSiswa1" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Nilai Ujian</h6>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VII-A</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VII-B</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VII-C</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('#')? " active ":" " }} {{ Request::is('#')? "active ":" " }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataUjianSiswa2" aria-expanded="true" aria-controls="collapseDataUjianSiswa2">
            <i class="bi bi-person-lines-fill"></i>
            <span class="badge bg-warning">{{ __('Kelas VIII (8)') }}</span>
        </a>
        <div id="collapseDataUjianSiswa2" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Nilai Ujian</h6>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VIII-A</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VIII-B</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">VIII-C</a>

            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('#')? " active ":" " }} {{ Request::is('#')? "active ":" " }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataUjianSiswa3" aria-expanded="true" aria-controls="collapseDataUjianSiswa3">
            <i class="bi bi-person-lines-fill "></i>
            <span class="badge bg-success">{{ __('Kelas IX (9)') }}</span>
        </a>
        <div id="collapseDataUjianSiswa3" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Nilai Ujian</h6>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">IX-A</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">IX-B</a>
                <a class="collapse-item {{ Request::is(" # ") ? "active ": " " }}" href="{{ url('/#') }}">IX-C</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>