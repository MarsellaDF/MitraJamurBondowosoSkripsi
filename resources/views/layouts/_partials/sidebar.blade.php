<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ route('home') }}">
        <span class="align-middle">AdminKit</span>
    </a>

    <ul class="sidebar-nav">
        <li class="sidebar-header">
            Pages
        </li>

        <li class="sidebar-item {{ request()->segment(2) == 'home' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('home') }}">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Home</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->segment(2) == 'produk' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('produk.index') }}">
                <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Produk</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->segment(2) == 'gallery' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('gallery.index') }}">
                <i class="align-middle" data-feather="image"></i> <span class="align-middle">Gallery</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('dashboard.edit', 1) }}">
                <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->segment(2) == 'feedback' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('feedback.index') }}">
                <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Feedback</span>
            </a>
        </li>

    </ul>
</div>
