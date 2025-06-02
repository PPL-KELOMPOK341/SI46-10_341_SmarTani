<div class="sidebar">
    <a href="{{ url('/admin/beranda') }}" class="{{ request()->is('admin/beranda') ? 'bg-light fw-bold' : '' }}">
        <i class="bi bi-house-door-fill me-2"></i> Beranda
    </a>

    <a href="{{ url('/admin/users') }}" class="{{ request()->is('admin/users*') ? 'bg-light fw-bold' : '' }}">
        <i class="bi bi-people-fill me-2"></i> Data Petani
    </a>

    <a href="{{ url('/berita') }}" class="{{ request()->is('berita*') ? 'bg-light fw-bold' : '' }}">
        <i class="bi bi-newspaper me-2"></i> Data Berita
    </a>

    <a href="{{ url('/riwayat-pengaduan') }}" class="{{ request()->is('pengaduan*') ? 'bg-light fw-bold' : '' }}">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> Pengaduan
    </a>

    <a href="{{ route('setting.website') }}" class="{{ request()->is('admin/setting*') ? 'bg-light fw-bold' : '' }}">
        <i class="bi bi-gear-fill me-2"></i> Setting Website
    </a>

    <!-- Logout sebagai link agar tampilannya sama -->
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="{{ request()->is('logout') ? 'bg-light fw-bold' : '' }} mt-3 d-block">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>

    <!-- Form logout tersembunyi -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
        @csrf
        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="d-block text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </form>
</div>
