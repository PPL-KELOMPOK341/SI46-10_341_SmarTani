    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <a href="{{ route('dashboard') }}"><i class="fas fa-home me-2"></i> Beranda</a>
        <a href="{{ route('form-pencatatan') }}"><i class="fas fa-file-alt me-2"></i> Form Pencatatan</a>
        <a href="{{ route('penanaman.index') }}"><i class="fas fa-seedling me-2"></i> Riwayat Penanaman</a>
        <a href="{{ route('pengeluaran.index') }}"><i class="fas fa-receipt me-2"></i> Riwayat Pengeluaran</a>
        <a href="{{ route('hasil-panen.index') }}"><i class="fas fa-wheat-alt me-2"></i> Riwayat Hasil Panen</a>
        <a href="{{ route('riwayat_pendapatan.index') }}"><i class="fas fa-money-bill-wave me-2"></i> Riwayat Pendapatan</a>
        <a href="#"><i class="fas fa-chart-line me-2"></i> Grafik</a>
        <a href="#"><i class="fas fa-comment-alt me-2"></i> Form Pengaduan</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </form>
    </div>

    <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        <div class="profile d-flex align-items-center gap-2">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name }}</span>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openSidebar() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("main-content").classList.add("sidebar-open");
        }

        function closeSidebar() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main-content").classList.remove("sidebar-open");
        }
    </script>