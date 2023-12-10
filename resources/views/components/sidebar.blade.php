<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">KelasGuru</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class=''>
                        <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            @if (auth()->user()->roles_id == 1 )
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>User list</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-book-open-reader"></i><span>Materi list</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('mapel.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Mapel list</span></a>
            </li>
            @endif
    </aside>
</div>
