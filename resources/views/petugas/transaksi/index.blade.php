<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Parkir - Parkir Kabasa</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --bg: #0b0b12;
            --sidebar: #151122;
            --sidebar-2: #21113d;
            --active: #6d28d9;

            --card: #171326;
            --card-light: #1f1732;

            --primary: #a855f7;
            --primary-dark: #6d28d9;
            --primary-soft: rgba(168, 85, 247, .15);

            --text: #ffffff;
            --soft: #ddd6fe;
            --muted: #a8a0ba;
            --border: #3b2854;

            --success: #4ade80;
            --success-bg: rgba(74, 222, 128, .14);

            --danger: #fb7185;
            --danger-bg: rgba(251, 113, 133, .14);

            --blue: #60a5fa;
            --blue-bg: rgba(96, 165, 250, .14);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
            font-family: "Inter", Arial, sans-serif;
            background:
                radial-gradient(circle at top left, #352052 0%, transparent 32%),
                radial-gradient(circle at bottom right, #21113d 0%, transparent 35%),
                var(--bg);
            color: var(--text);
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 255px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            padding: 25px 18px;
            background: linear-gradient(180deg, rgba(33, 17, 61, .98), rgba(15, 11, 25, .98));
            border-right: 1px solid rgba(168, 85, 247, .2);
            box-shadow: 10px 0 35px rgba(0, 0, 0, .2);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 25px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(192, 132, 252, .15);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            color: white;
            font-size: 22px;
            font-weight: 800;
            box-shadow: 0 0 20px rgba(168, 85, 247, .3);
        }

        .brand-name {
            color: white;
            font-size: 17px;
            font-weight: 800;
        }

        nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 15px;
            border: 1px solid transparent;
            border-radius: 12px;
            color: #b9acd0;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .3s ease;
        }

        .nav-item:hover {
            background: rgba(168, 85, 247, .1);
            border-color: rgba(168, 85, 247, .25);
            color: white;
            transform: translateX(3px);
        }

        .nav-item.active {
            background: linear-gradient(135deg, rgba(109, 40, 217, .95), rgba(168, 85, 247, .65));
            border-color: rgba(216, 180, 254, .3);
            color: white;
            box-shadow: 0 8px 20px rgba(109, 40, 217, .25);
        }

        /* MAIN */
        .main {
            flex: 1;
            min-width: 0;
            padding: 32px 40px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .title-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--primary-soft);
            border: 1px solid rgba(168, 85, 247, .3);
            font-size: 27px;
            box-shadow: 0 0 20px rgba(168, 85, 247, .12);
        }

        h1 {
            margin: 0 0 7px;
            color: white;
            font-size: 29px;
            font-weight: 800;
            text-shadow: 0 0 18px rgba(192, 132, 252, .3);
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
        }

        /* PROFILE */
        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 17px 9px 9px;
            border: 1px solid rgba(168, 85, 247, .25);
            border-radius: 15px;
            background: linear-gradient(145deg, rgba(31, 22, 48, .98), rgba(18, 14, 30, .98));
            box-shadow: 0 8px 25px rgba(0, 0, 0, .2);
        }

        .avatar {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            color: white;
            font-size: 17px;
            font-weight: 800;
            box-shadow: 0 0 18px rgba(168, 85, 247, .25);
        }

        .profile-name {
            color: white;
            font-size: 14px;
            font-weight: 700;
        }

        .profile-role {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
        }

        /* ALERT & NOTIFIKASI REALTIME */
        .alert-success,
        .alert-error {
            padding: 15px 18px;
            margin-bottom: 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-success {
            color: #86efac;
            background: var(--success-bg);
            border: 1px solid rgba(74, 222, 128, .25);
            border-left: 5px solid var(--success);
        }

        .alert-error {
            color: #fda4af;
            background: var(--danger-bg);
            border: 1px solid rgba(251, 113, 133, .25);
            border-left: 5px solid var(--danger);
        }

        .notif-realtime {
            display: none;
            align-items: center;
            padding: 16px 20px;
            margin-bottom: 20px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(109, 40, 217, 0.35), rgba(168, 85, 247, 0.2));
            border: 1px solid rgba(168, 85, 247, 0.6);
            border-left: 5px solid #a855f7;
            color: #f3e8ff;
            font-size: 14px;
            line-height: 1.5;
            box-shadow: 0 10px 25px rgba(109, 40, 217, 0.25);
        }

        /* PANEL */
        .panel {
            position: relative;
            overflow: hidden;
            padding: 25px;
            border: 1px solid rgba(168, 85, 247, .2);
            border-radius: 20px;
            background: linear-gradient(145deg, rgba(31, 22, 48, .98), rgba(18, 14, 30, .98));
            box-shadow: 0 15px 35px rgba(0, 0, 0, .25), 0 0 25px rgba(124, 58, 237, .05);
        }

        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #7c3aed, #c084fc);
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .panel-title {
            margin: 0;
            color: white;
            font-size: 21px;
            font-weight: 800;
        }

        /* TOOLBAR PENCARIAN & FILTER STATUS */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(11, 11, 18, 0.45);
            border: 1px solid rgba(168, 85, 247, 0.18);
            border-radius: 14px;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 260px;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            font-size: 15px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 12px 38px 12px 40px;
            background: rgba(31, 23, 50, 0.9);
            border: 1px solid rgba(168, 85, 247, 0.35);
            border-radius: 11px;
            color: white;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 500;
            outline: none;
            transition: .25s ease;
        }

        .search-input::placeholder {
            color: var(--muted);
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
        }

        .btn-clear {
            position: absolute;
            right: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #ddd6fe;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            font-size: 12px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .btn-clear:hover {
            background: rgba(251, 113, 133, 0.3);
            color: white;
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid rgba(168, 85, 247, 0.25);
            background: rgba(31, 23, 50, 0.65);
            color: var(--muted);
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .tab-btn:hover {
            color: white;
            border-color: rgba(168, 85, 247, 0.5);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            border-color: rgba(216, 180, 254, 0.4);
            color: white;
            box-shadow: 0 4px 14px rgba(109, 40, 217, 0.3);
        }

        .tab-count {
            background: rgba(0, 0, 0, 0.3);
            padding: 2px 7px;
            border-radius: 999px;
            font-size: 11px;
        }

        /* BUTTON */
        .btn-tambah,
        .btn-keluar,
        .btn-struk {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s ease;
        }

        .btn-tambah {
            padding: 13px 20px;
            color: white;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            box-shadow: 0 8px 20px rgba(109, 40, 217, .25);
        }

        .btn-tambah:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(168, 85, 247, .35);
        }

        .btn-keluar {
            padding: 10px 17px;
            color: white;
            background: linear-gradient(135deg, #be123c, #f43f5e);
            border: none;
            box-shadow: 0 5px 15px rgba(244, 63, 94, .18);
        }

        .btn-keluar:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(244, 63, 94, .3);
        }

        .btn-struk {
            padding: 10px 17px;
            color: white;
            background: linear-gradient(135deg, #047857, #10b981);
            box-shadow: 0 5px 15px rgba(16, 185, 129, .18);
        }

        .btn-struk:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, .3);
        }

        /* TABLE */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border-radius: 13px;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #4c1d75, #6d28d9);
        }

        th {
            padding: 15px 14px;
            color: #f3e8ff;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid rgba(216, 180, 254, .2);
        }

        td {
            padding: 15px 14px;
            color: #ddd6fe;
            font-size: 13px;
            white-space: nowrap;
            border-bottom: 1px solid rgba(59, 40, 84, .75);
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: rgba(168, 85, 247, .07);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .plat {
            color: white;
            font-weight: 800;
            letter-spacing: .4px;
        }

        .empty {
            padding: 35px;
            color: var(--muted);
            text-align: center;
        }

        /* BADGE */
        .badge {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-masuk {
            color: #93c5fd;
            background: var(--blue-bg);
            border: 1px solid rgba(96, 165, 250, .25);
        }

        .badge-keluar {
            color: #86efac;
            background: var(--success-bg);
            border: 1px solid rgba(74, 222, 128, .25);
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .sidebar {
                width: 220px;
            }
            .main {
                padding: 28px 22px;
            }
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
            .profile {
                width: 100%;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                display: none;
            }
            .main {
                padding: 22px 15px;
            }
            .panel {
                padding: 20px 15px;
            }
            .panel-head {
                align-items: flex-start;
                flex-direction: column;
            }
            .btn-tambah {
                width: 100%;
            }
            h1 {
                font-size: 25px;
            }
            .title-icon {
                width: 48px;
                height: 48px;
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">🅿️</div>
            <div class="brand-name">Parkir Kabasa</div>
        </div>

        <nav>
            <a href="{{ route('petugas.dashboard') }}" class="nav-item">🏠 Dashboard</a>
            <a href="{{ route('petugas.transaksi.index') }}" class="nav-item active" style="justify-content: space-between;">
                <span>🚗 Transaksi</span>
                <span id="sidebar-notif-badge" style="display: none; background: #ef4444; color: white; font-size: 11px; font-weight: 800; padding: 2px 8px; border-radius: 999px; box-shadow: 0 0 10px rgba(239,68,68,0.6);">0</span>
            </a>
            <a href="{{ route('logout') }}" class="nav-item">🚪 Logout</a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <div class="topbar">
            <div class="title">
                <div class="title-icon">🚗</div>
                <div>
                    <h1>Transaksi Parkir</h1>
                    <div class="subtitle">Kelola kendaraan masuk dan keluar dari area parkir.</div>
                </div>
            </div>

            <!-- PROFILE -->
            <div class="profile">
                <div class="avatar">P</div>
                <div>
                    <div class="profile-name">Petugas Parkir</div>
                    <div class="profile-role">Petugas</div>
                </div>
            </div>
        </div>

        <!-- BANNER NOTIFIKASI OTOMATIS (KENDARAAN BARU DARI ADMIN) -->
        <div id="notif-kendaraan-baru" class="notif-realtime">
            <div id="notif-kendaraan-text">
                🔔 Ada kendaraan baru terdaftar oleh Admin!
            </div>
        </div>

        <!-- PESAN BERHASIL -->
        @if(session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- PESAN ERROR -->
        @if(session('error'))
            <div class="alert-error">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- PANEL -->
        <div class="panel">
            <div class="panel-head">
                <h2 class="panel-title">📋 Daftar Transaksi</h2>
                <a href="{{ route('petugas.transaksi.create') }}" class="btn-tambah">
                    ＋ Kendaraan Masuk
                </a>
            </div>

            <!-- TOOLBAR PENCARIAN & FILTER -->
            <div class="toolbar">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input
                        type="text"
                        id="searchInput"
                        class="search-input"
                        placeholder="Ketik Plat Nomor (misal: N 5454), ID (#38), atau Nama Pemilik..."
                        autocomplete="off"
                    >
                    <button type="button" id="clearSearch" class="btn-clear" title="Hapus pencarian">✕</button>
                </div>

                <div class="filter-tabs">
                    <button type="button" class="tab-btn active" data-filter="masuk">
                        🚗 Sedang Parkir <span class="tab-count" id="count-masuk">0</span>
                    </button>
                    <button type="button" class="tab-btn" data-filter="keluar">
                        ✓ Sudah Keluar <span class="tab-count" id="count-keluar">0</span>
                    </button>
                    <button type="button" class="tab-btn" data-filter="semua">
                        📋 Semua <span class="tab-count" id="count-semua">0</span>
                    </button>
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plat Nomor</th>
                            <th>Jenis</th>
                            <th>Pemilik</th>
                            <th>Area Parkir</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Durasi</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="transaksiTableBody">
                        @forelse($transaksi as $item)
                            <tr
                                class="transaksi-row"
                                data-status="{{ $item->status }}"
                                data-search="{{ strtolower($item->id_parkir . ' #' . $item->id_parkir . ' ' . $item->plat_nomor . ' ' . str_replace(' ', '', $item->plat_nomor) . ' ' . $item->pemilik . ' ' . $item->nama_area) }}"
                            >
                                <td>#{{ $item->id_parkir }}</td>
                                <td class="plat">{{ $item->plat_nomor }}</td>
                                <td>{{ ucfirst($item->jenis_kendaraan) }}</td>
                                <td>{{ $item->pemilik }}</td>
                                <td>{{ $item->nama_area }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    @if($item->waktu_keluar)
                                        {{ \Carbon\Carbon::parse($item->waktu_keluar)->format('Y-m-d H:i:s') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($item->durasi_jam)
                                        {{ $item->durasi_jam }} Jam
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($item->biaya_total)
                                        Rp {{ number_format($item->biaya_total, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'masuk')
                                        <span class="badge badge-masuk">🚗 Masuk</span>
                                    @else
                                        <span class="badge badge-keluar">✓ Keluar</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'masuk')
                                        <form action="{{ route('petugas.transaksi.keluar', $item->id_parkir) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn-keluar" onclick="return confirm('Yakin kendaraan {{ $item->plat_nomor }} akan keluar dari parkir?')">
                                                🚪 Keluar
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('petugas.struk.show', $item->id_parkir) }}" class="btn-struk">
                                            🧾 Struk
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyDatabaseRow">
                                <td colspan="11" class="empty">
                                    Belum ada transaksi parkir.
                                </td>
                            </tr>
                        @endforelse

                        <!-- BARIS JIKA HASIL PENCARIAN / FILTER KOSONG -->
                        <tr id="noFilterMatchRow" style="display: none;">
                            <td colspan="11" class="empty">
                                Tidak ada data kendaraan yang sesuai dengan pencarian atau filter status.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</div>

<script>
    // =====================================================
    // 1. LOGIKA FILTER STATUS & PENCARIAN REAL-TIME
    // =====================================================
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const clearSearchBtn = document.getElementById('clearSearch');
        const tabButtons = document.querySelectorAll('.tab-btn');
        const rows = document.querySelectorAll('.transaksi-row');
        const noMatchRow = document.getElementById('noFilterMatchRow');

        let currentStatusFilter = 'masuk'; // Default fokus ke kendaraan yang sedang parkir

        // Hitung jumlah badge di setiap tab
        function updateTabCounts() {
            let countMasuk = 0;
            let countKeluar = 0;

            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (status === 'masuk') countMasuk++;
                if (status === 'keluar') countKeluar++;
            });

            document.getElementById('count-masuk').innerText = countMasuk;
            document.getElementById('count-keluar').innerText = countKeluar;
            document.getElementById('count-semua').innerText = rows.length;
        }

        // Jalankan penyaringan baris tabel
        function filterTable() {
            const keyword = searchInput.value.toLowerCase().trim();
            clearSearchBtn.style.display = keyword.length > 0 ? 'flex' : 'none';

            let visibleCount = 0;

            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                const searchData = row.getAttribute('data-search');

                const matchStatus = (currentStatusFilter === 'semua') || (status === currentStatusFilter);
                const matchKeyword = keyword === '' || searchData.includes(keyword);

                if (matchStatus && matchKeyword) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (rows.length > 0 && noMatchRow) {
                noMatchRow.style.display = (visibleCount === 0) ? '' : 'none';
            }
        }

        // Event ketik di kolom pencarian
        searchInput.addEventListener('input', filterTable);

        // Event tombol hapus pencarian (X)
        clearSearchBtn.addEventListener('click', function () {
            searchInput.value = '';
            searchInput.focus();
            filterTable();
        });

        // Event klik tab status (Sedang Parkir / Sudah Keluar / Semua)
        tabButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                tabButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentStatusFilter = this.getAttribute('data-filter');
                filterTable();
            });
        });

        // Otomatis fokuskan kursor ke kotak pencarian saat halaman dibuka
        searchInput.focus();

        updateTabCounts();
        filterTable();
    });

    // =====================================================
    // 2. CEK NOTIFIKASI REAL-TIME KENDARAAN BARU DARI ADMIN
    // =====================================================
    function cekKendaraanDariAdmin() {
        fetch(`{{ route('petugas.transaksi.cek_kendaraan_baru') }}`)
            .then(response => {
                if (!response.ok) throw new Error('Akses ditolak / session berubah');
                return response.json();
            })
            .then(res => {
                const banner = document.getElementById('notif-kendaraan-baru');
                const text = document.getElementById('notif-kendaraan-text');
                const badge = document.getElementById('sidebar-notif-badge');

                if (res.jumlah > 0 && res.terbaru) {
                    badge.innerText = res.jumlah + ' Baru';
                    badge.style.display = 'inline-block';

                    const jenis = res.terbaru.jenis_kendaraan.charAt(0).toUpperCase() + res.terbaru.jenis_kendaraan.slice(1);
                    text.innerHTML = `🔔 <strong>Ada ${res.jumlah} Kendaraan Baru dari Admin!</strong> Terbaru: <strong>${res.terbaru.plat_nomor}</strong> (${jenis} - Pemilik: ${res.terbaru.pemilik}) belum dimasukkan ke area parkir.`;
                    banner.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                    banner.style.display = 'none';
                }
            })
            .catch(err => console.log('Menunggu pengecekan:', err.message));
    }

    cekKendaraanDariAdmin();
    setInterval(cekKendaraanDariAdmin, 3000);
</script>

</body>
</html>