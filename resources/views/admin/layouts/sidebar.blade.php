<div class="sidebar position-fixed top-0 start-0 h-100">

<div class="{{ request()->is('beranda-admin') ? 'active' : '' }}">
    <a href="{{ url('/admin/beranda') }}">Beranda</a>
</div>
<div class="{{ request()->is('data-user') ? 'active' : '' }}">
    <a href="{{ url('/admin/users') }}">Data User</a>
</div>
<div class="{{ request()->is('pengaduan') ? 'active' : '' }}">
    <a href="{{ url('/pengaduan') }}">Riwayat Pengaduan</a>
</div>
<div class="{{ request()->is('setting-website') ? 'active' : '' }}">
    <a href="{{ route('setting.website') }}">Setting Website</a>
</div>

</div> 
