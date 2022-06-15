<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpus App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->can('menu-dashboard'))
        <li class="nav-item  {{ $page == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    @if (auth()->user()->can('menu-users'))
        <li class="nav-item {{ $page == 'users' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapsePages" class="collapse {{ $page == 'users' ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Settings Users:</h6>
                    @if (auth()->user()->can('user-list'))
                        <a class="collapse-item {{ request()->routeIs('users.index') ? 'active' : ''}}" href="{{ route('users.index') }}">Users</a>
                    @endif
                    @if (auth()->user()->can('role-list'))
                        <a class="collapse-item {{ request()->routeIs('roles.index') ? 'active' : ''}}" href="{{ route('roles.index') }}">Roles</a>
                    @endif
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->can('menu-master'))
        <li class="nav-item {{ $page == 'master' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
            </a>
            <div id="collapseTwo" class="collapse {{ $page == 'master' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master:</h6>
                    @if (auth()->user()->can('raks-list'))
                        <a class="collapse-item {{ request()->routeIs('raks.index') ? 'active' : ''}}" href="{{ route('raks.index') }}">Rak</a>
                    @endif
                    @if (auth()->user()->can('books-list'))
                        <a class="collapse-item {{ request()->routeIs('books.index') ? 'active' : ''}}" href="{{ route('books.index') }}">Buku</a>
                    @endif
                    @if (auth()->user()->can('penerbit-list'))
                        <a class="collapse-item {{ request()->routeIs('penerbit.index') ? 'active' : ''}}" href="{{ route('penerbit.index') }}">Penerbit</a>
                    @endif
                    @if (auth()->user()->can('anggota-list'))
                        <a class="collapse-item {{ request()->routeIs('anggotas.index') ? 'active' : ''}}" href="{{ route('anggotas.index') }}">Anggota</a>
                    @endif
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Utilities Collapse Menu -->
    @if (auth()->user()->can('menu-transactions'))
        <li class="nav-item {{ $page == 'transaction' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-money-bill-wave"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ $page == 'transaction' ? 'show' : '' }}" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if (auth()->user()->can('peminjaman-list'))
                        <a class="collapse-item {{ request()->routeIs('peminjaman.index') ? 'active' : ''}}" href="{{ route('peminjaman.index') }}">Peminjaman</a>
                    @endif
                    {{-- @if (auth()->user()->can('pengembalian-list'))
                        <a class="collapse-item" href="{{ route('pengembalian.index') }}">Pengembalian</a>
                    @endif --}}
                </div>
            </div>
        </li>
    @endif
</ul>
