<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rekap Transaksi - Owner</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --bg: #0b0b12;
            --bg-soft: #11101c;
            --sidebar: #100d1d;
            --card: #171322;
            --card-soft: #211a32;

            --purple: #7c3aed;
            --purple-light: #a855f7;
            --purple-soft: #c084fc;

            --text: #f5f3ff;
            --muted: #a5a0bb;
            --line: rgba(192, 132, 252, .16);

            --green: #34d399;
            --green-soft: rgba(52, 211, 153, .13);

            --blue: #60a5fa;
            --blue-soft: rgba(96, 165, 250, .13);

            --red: #fb7185;
            --red-soft: rgba(251, 113, 133, .13);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top right, #352052 0%, transparent 32%),
                radial-gradient(circle at bottom left, #21113d 0%, transparent 30%),
                var(--bg);
            color: var(--text);
        }

        body {
            overflow-x: hidden;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            flex-shrink: 0;
            padding: 26px 16px;
            display: flex;
            flex-direction: column;
            background:
                linear-gradient(180deg, rgba(124, 58, 237, .13), transparent 45%),
                var(--sidebar);
            border-right: 1px solid var(--line);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: linear-gradient(135deg, var(--purple), var(--purple-light));
            box-shadow: 0 0 25px rgba(168, 85, 247, .45);
            font-size: 21px;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.5px;
            color: white;
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
            border-radius: 13px;
            color: #aaa3c3;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .25s ease;
        }

        .nav-item:hover {
            color: white;
            background: rgba(168, 85, 247, .12);
            transform: translateX(3px);
        }

        .nav-item.active {
            color: white;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            box-shadow: 0 8px 25px rgba(124, 58, 237, .28);
        }

        .sidebar-foot {
            padding: 17px 10px 0;
            border-top: 1px solid var(--line);
            color: #766e91;
            font-size: 11px;
            line-height: 1.8;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            min-width: 0;
            padding: 34px 42px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .topbar h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.8px;
            background: linear-gradient(90deg, #ffffff, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sub {
            color: var(--muted);
            font-size: 13px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 17px 9px 9px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: rgba(23, 19, 34, .9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .18);
        }

        .avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: linear-gradient(135deg, var(--purple), var(--purple-light));
            color: white;
            font-size: 17px;
            font-weight: 800;
            box-shadow: 0 0 18px rgba(168, 85, 247, .3);
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        /* ================= STATISTIK ================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 22px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 24px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background:
                linear-gradient(145deg, rgba(124, 58, 237, .12), transparent 55%),
                var(--card);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .18);
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--purple), var(--purple-soft));
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            right: -60px;
            bottom: -70px;
            border-radius: 50%;
            background: rgba(168, 85, 247, .13);
            filter: blur(5px);
        }

        .stat-label {
            position: relative;
            z-index: 1;
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
        }

        .stat-value {
            position: relative;
            z-index: 1;
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: white;
        }

        /* ================= ALERT ================= */

        .alert {
            margin-bottom: 20px;
            padding: 14px 17px;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid transparent;
        }

        .alert-success {
            color: var(--green);
            background: var(--green-soft);
            border-color: rgba(52, 211, 153, .2);
        }

        .alert-error {
            color: var(--red);
            background: var(--red-soft);
            border-color: rgba(251, 113, 133, .2);
        }

        /* ================= PANEL ================= */

        .panel {
            position: relative;
            overflow: hidden;
            padding: 24px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background:
                linear-gradient(145deg, rgba(124, 58, 237, .08), transparent 40%),
                var(--card);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .2);
        }

        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--purple), var(--purple-soft));
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .panel-head h2 {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            color: white;
        }

        .count {
            padding: 8px 12px;
            border: 1px solid rgba(192, 132, 252, .2);
            border-radius: 20px;
            color: var(--purple-soft);
            background: rgba(168, 85, 247, .1);
            font-size: 11px;
            font-weight: 700;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 14px;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 13px;
            text-align: left;
            white-space: nowrap;
            color: #eee7ff;
            background: linear-gradient(90deg, #4c1d95, #5b21b6);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        td {
            padding: 15px 13px;
            border-bottom: 1px solid var(--line);
            color: #c7c1d8;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: rgba(168, 85, 247, .06);
        }

        tr:last-child td {
            border-bottom: none;
        }

        .plat {
            color: white;
            font-weight: 800;
            letter-spacing: .4px;
        }

        /* ================= STATUS ================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .badge-keluar {
            color: var(--green);
            background: var(--green-soft);
            border: 1px solid rgba(52, 211, 153, .2);
        }

        .badge-masuk {
            color: var(--blue);
            background: var(--blue-soft);
            border: 1px solid rgba(96, 165, 250, .2);
        }

        /* ================= BUTTON ================= */

        .btn-delete {
            border: none;
            padding: 9px 13px;
            border-radius: 10px;
            color: white;
            background: linear-gradient(135deg, #be123c, #fb7185);
            box-shadow: 0 5px 15px rgba(251, 113, 133, .15);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(251, 113, 133, .28);
        }

        .btn-disabled {
            color: #716b87;
            font-size: 11px;
            white-space: nowrap;
        }

        /* ================= EMPTY ================= */

        .empty {
            padding: 40px 20px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 25px 20px;
            }
        }

        @media (max-width: 650px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 17px;
            }

            .panel-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">🅿️</div>

            <div class="brand-name">
                Parkir Kabosa
            </div>
        </div>

        <nav>

            <a href="{{ route('owner.dashboard') }}"
               class="nav-item">

                🏠 Dashboard

            </a>

            <a href="{{ route('owner.rekap.index') }}"
               class="nav-item active">

                📊 Rekap Transaksi

            </a>

            <a href="{{ route('logout') }}"
               class="nav-item">

                🚪 Logout

            </a>

        </nav>

        <div class="sidebar-foot">
            Parkir Kabosa v1.0
            <br>
            Sistem Manajemen Parkir
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <div>
                <h1>Rekap Transaksi</h1>

                <div class="sub">
                    Rekap seluruh transaksi parkir
                </div>
            </div>

            <div class="profile">

                <div class="avatar">
                    O
                </div>

                <div>
                    <div class="profile-name">
                        Owner Parkir
                    </div>

                    <div class="profile-role">
                        Owner
                    </div>
                </div>

            </div>

        </div>

        <!-- STATISTIK -->
        <div class="stats">

            <div class="stat-card">

                <div class="stat-label">
                    Total Transaksi
                </div>

                <div class="stat-value">
                    {{ $totalTransaksi }}
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-label">
                    Total Pendapatan
                </div>

                <div class="stat-value">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </div>

            </div>

        </div>

        <!-- PESAN BERHASIL -->
        @if(session('success'))

            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>

        @endif

        <!-- PESAN ERROR -->
        @if(session('error'))

            <div class="alert alert-error">
                ⚠️ {{ session('error') }}
            </div>

        @endif

        <!-- PANEL TRANSAKSI -->
        <div class="panel">

            <div class="panel-head">

                <h2>Daftar Transaksi</h2>

                <span class="count">
                    {{ $totalTransaksi }} transaksi
                </span>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plat Nomor</th>
                            <th>Jenis</th>
                            <th>Pemilik</th>
                            <th>Area</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Durasi</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($transaksi as $item)

                        <tr>

                            <td>
                                {{ $item->id_parkir }}
                            </td>

                            <td class="plat">
                                {{ $item->plat_nomor }}
                            </td>

                            <td>
                                {{ ucfirst($item->jenis_kendaraan) }}
                            </td>

                            <td>
                                {{ $item->pemilik }}
                            </td>

                            <td>
                                {{ $item->nama_area }}
                            </td>

                            <td>
                                {{ date('Y-m-d H:i:s', strtotime($item->waktu_masuk)) }}
                            </td>

                            <td>
                                @if($item->waktu_keluar)
                                    {{ date('Y-m-d H:i:s', strtotime($item->waktu_keluar)) }}
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
                                @if($item->status == 'keluar')

                                    <span class="badge badge-keluar">
                                        ✓ Keluar
                                    </span>

                                @else

                                    <span class="badge badge-masuk">
                                        Masuk
                                    </span>

                                @endif
                            </td>

                            <td>

                                @if($item->status == 'keluar')

                                    <form
                                        action="{{ route('owner.rekap.destroy', $item->id_parkir) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus transaksi ini? Data yang sudah dihapus tidak dapat dikembalikan.');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-delete"
                                        >
                                            🗑 Hapus
                                        </button>

                                    </form>

                                @else

                                    <span class="btn-disabled">
                                        Tidak dapat dihapus
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="11" class="empty">
                                Belum ada data transaksi.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

</body>
</html>