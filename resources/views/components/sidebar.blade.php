<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">MRA RESTO</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MRA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>
             <li class="menu-header">Pages</li>
            <li class="">
                <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Users</span></a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-cube"></i> <span>Products</span></a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('categories.index') }}"><i class="fas fa-folder"></i> <span>Categories</span></a>
            </li>
        </ul>
    </aside>
</div>
