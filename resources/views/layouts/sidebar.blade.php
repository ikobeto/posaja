<!-- resources/views/layouts/sidebar.blade.php -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="">
                {{-- <a href="{{ route('Transaksi') }}" class="nav-link"><i
                        class="fas fa-shopping-cart"></i><span>Transaksi</span></a> --}}
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class=><a class="nav-link" href="layout-default.html">Laporan Bulanan</a></li>
                    <li class=><a class="nav-link" href="layout-default.html">Laporan Harian</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-user"></i> <span>Profile</span></a></li>
            <li class="{{ request()->is('admin/produk*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('produk') }}"><i class="fas fa-store"></i> <span>Product</span></a>
            </li>
            <li class="{{ request()->is('admin/categoryProduct*') ? 'active' : '' }}">
                <a href="{{ route('category') }}" class="nav-link"><i
                        class="fas fa-shopping-cart"></i><span>category</span></a>
            </li>
        </ul>
</div>
