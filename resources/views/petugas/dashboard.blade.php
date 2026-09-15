<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - Parkir Kabasa</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --page-bg: #0b0b12;
            --sidebar: #151122;
            --sidebar-2: #21113d;
            --sidebar-active: #6d28d9;
            --sidebar-hover: #302342;

            --card: #171326;
            --card-2: #1d1630;

            --primary: #a855f7;
            --primary-dark: #6d28d9;
            --primary-soft: rgba(168, 85, 247, 0.15);

            --text: #ffffff;
            --text-soft: #ddd6fe;
            --muted: #a8a0ba;

            --border: #38254f;

            --blue: #60a5fa;
            --blue-soft: rgba(96, 165, 250, 0.15);

            --teal: #2dd4bf;
            --teal-soft: rgba(45, 212, 191, 0.15);

            --pink: #f472b6;
            --pink-soft: rgba(244, 114, 182, 0.15);

            --orange: #fbbf24;
            --orange-soft: rgba(251, 191, 36, 0.15);

            --success: #4ade80;
            --success-soft: rgba(74, 222, 128, 0.15);
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
                var(--page-bg);
            color: var(--text);
        }

        body {
            min-height: 100vh;
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

            background:
                linear-gradient(
                    180deg,
                    rgba(33, 17, 61, 0.98),
                    rgba(15, 11, 25, 0.98)
                );

            border-right: 1px solid rgba(168, 85, 247, 0.2);
            box-shadow: 10px 0 35px rgba(0, 0, 0, 0.2);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 8px 25px;
            margin-bottom: 15px;

            border-bottom: 1px solid rgba(192, 132, 252, 0.15);
        }

        .brand-mark {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 13px;

            background: linear-gradient(135deg, #6d28d9, #a855f7);
            color: white;

            font-size: 22px;

            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
        }

        .brand-name {
            color: white;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 0.2px;
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
            gap: 13px;

            padding: 14px 15px;
            border: 1px solid transparent;
            border-radius: 12px;

            color: #b9acd0;
            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition: 0.3s ease;
        }

        .nav-item:hover {
            background: rgba(168, 85, 247, 0.1);
            border-color: rgba(168, 85, 247, 0.2);
            color: white;
            transform: translateX(3px);
        }

        .nav-item.active {
            background: linear-gradient(
                135deg,
                rgba(109, 40, 217, 0.9),
                rgba(168, 85, 247, 0.65)
            );

            border-color: rgba(216, 180, 254, 0.3);
            color: white;

            box-shadow: 0 8px 20px rgba(109, 40, 217, 0.2);
        }

        .sidebar-foot {
            padding-top: 18px;

            border-top: 1px solid rgba(255, 255, 255, 0.1);

            color: #8f82a8;
            font-size: 12px;
            line-height: 1.8;
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

        .topbar h1 {
            margin: 0 0 8px;

            color: white;
            font-size: 29px;
            font-weight: 800;

            text-shadow: 0 0 18px rgba(192, 132, 252, 0.3);
        }

        .sub {
            color: var(--muted);
            font-size: 14px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 9px 17px 9px 9px;

            border: 1px solid rgba(168, 85, 247, 0.25);
            border-radius: 15px;

            background: linear-gradient(
                145deg,
                rgba(31, 22, 48, 0.98),
                rgba(18, 14, 30, 0.98)
            );

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
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

            box-shadow: 0 0 18px rgba(168, 85, 247, 0.25);
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

        /* STATISTIK */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;

            padding: 21px;

            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 18px;

            background: linear-gradient(
                145deg,
                rgba(31, 22, 48, 0.98),
                rgba(18, 14, 30, 0.98)
            );

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.22),
                0 0 20px rgba(124, 58, 237, 0.05);

            transition: 0.3s ease;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;

            width: 100%;
            height: 4px;

            background: linear-gradient(90deg, #7c3aed, #c084fc);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(192, 132, 252, 0.45);

            box-shadow:
                0 18px 35px rgba(0, 0, 0, 0.3),
                0 0 25px rgba(168, 85, 247, 0.12);
        }

        .stat-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 17px;

            border-radius: 13px;
            font-size: 21px;
        }

        .blue {
            background: var(--blue-soft);
        }

        .teal {
            background: var(--teal-soft);
        }

        .indigo {
            background: var(--pink-soft);
        }

        .slate {
            background: var(--orange-soft);
        }

        .stat-value {
            overflow-wrap: anywhere;

            color: white;
            font-size: 25px;
            font-weight: 800;
        }

        .stat-label {
            margin-top: 7px;

            color: var(--muted);
            font-size: 13px;
        }

        .stat-trend {
            margin-top: 15px;

            color: #c4b5fd;
            font-size: 11px;
            line-height: 1.5;
        }

        /* CONTENT */

        .content-grid {
            display: grid;
            grid-template-columns: 1.7fr 1fr;
            gap: 20px;
        }

        .panel {
            min-width: 0;
            padding: 23px;

            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 18px;

            background: linear-gradient(
                145deg,
                rgba(31, 22, 48, 0.98),
                rgba(18, 14, 30, 0.98)
            );

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.22);
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            margin-bottom: 20px;
        }

        .panel-head h2 {
            margin: 0;

            color: white;
            font-size: 16px;
            font-weight: 700;
        }

        .count {
            color: #a8a0ba;
            font-size: 12px;
            white-space: nowrap;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 12px 10px;

            border-bottom: 1px solid var(--border);

            color: #a8a0ba;
            font-size: 11px;
            font-weight: 600;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 15px 10px;

            border-bottom: 1px solid rgba(56, 37, 79, 0.65);

            color: #ddd6fe;
            font-size: 13px;
            white-space: nowrap;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: rgba(168, 85, 247, 0.06);
        }

        .plat {
            color: white;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        .badge {
            display: inline-block;

            padding: 6px 11px;
            border-radius: 20px;

            font-size: 11px;
            font-weight: 700;
        }

        .badge.parkir {
            background: rgba(96, 165, 250, 0.15);
            color: #93c5fd;
            border: 1px solid rgba(96, 165, 250, 0.2);
        }

        .badge.selesai {
            background: rgba(74, 222, 128, 0.15);
            color: #86efac;
            border: 1px solid rgba(74, 222, 128, 0.2);
        }

        /* DONUT */

        .donut-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding-top: 12px;
        }

        .donut {
            width: 190px;
            height: 190px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: conic-gradient(
                #a855f7 0% {{ $persentaseTerisi }}%,
                #302342 {{ $persentaseTerisi }}% 100%
            );

            box-shadow:
                0 0 25px rgba(168, 85, 247, 0.15),
                inset 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .donut-center {
            width: 138px;
            height: 138px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(192, 132, 252, 0.15);
            border-radius: 50%;

            background: #171326;
        }

        .pct {
            color: white;
            font-size: 28px;
            font-weight: 800;

            text-shadow: 0 0 15px rgba(192, 132, 252, 0.35);
        }

        .donut-label {
            margin-top: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .legend {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;

            margin-top: 25px;
        }

        .legend-item {
            color: #b9acd0;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .main {
                padding: 28px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 220px;
            }

            .main {
                padding: 25px 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile {
                width: 100%;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 22px 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 18px 14px;
            }

            .panel-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .donut {
                width: 170px;
                height: 170px;
            }

            .donut-center {
                width: 124px;
                height: 124px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">
                🅿️
            </div>

            <div class="brand-name">
                Parkir Kabasa
            </div>
        </div>

        <nav>

            <a href="{{ route('petugas.dashboard') }}"
               class="nav-item active">
                🏠 Dashboard
            </a>

            <a href="{{ route('petugas.transaksi.index') }}"
               class="nav-item">
                🚗 Transaksi
            </a>

            <a href="{{ route('logout') }}"
               class="nav-item">
                🚪 Logout
            </a>

        </nav>

        <div class="sidebar-foot">
            Parkir Kabasa v1.0
            <br>
            Sistem Manajemen Parkir
        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <div class="topbar">

            <div>
                <h1>Dashboard Petugas</h1>

                <div class="sub">
                    Ringkasan aktivitas parkir hari ini
                </div>
            </div>

            <div class="profile">

                <div class="avatar">
                    P
                </div>

                <div>
                    <div class="profile-name">
                        Petugas Parkir
                    </div>

                    <div class="profile-role">
                        Petugas
                    </div>
                </div>

            </div>

        </div>


        <!-- STATISTIK -->

        <div class="stats">

            <div class="stat-card">

                <div class="stat-icon blue">
                    🚗
                </div>

                <div class="stat-value">
                    {{ $sedangParkir }}
                </div>

                <div class="stat-label">
                    Sedang Parkir
                </div>

                <div class="stat-trend">
                    Kendaraan masih berada di area
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon teal">
                    📅
                </div>

                <div class="stat-value">
                    {{ $totalHariIni }}
                </div>

                <div class="stat-label">
                    Total Hari Ini
                </div>

                <div class="stat-trend">
                    Total kendaraan masuk hari ini
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon indigo">
                    💰
                </div>

                <div class="stat-value">
                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                </div>

                <div class="stat-label">
                    Pendapatan Hari Ini
                </div>

                <div class="stat-trend">
                    Dari kendaraan yang sudah keluar
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon slate">
                    ⏱️
                </div>

                <div class="stat-value">
                    {{ $rataDurasiFormat }}
                </div>

                <div class="stat-label">
                    Rata-rata Durasi
                </div>

                <div class="stat-trend">
                    Berdasarkan transaksi selesai
                </div>

            </div>

        </div>


        <!-- CONTENT -->

        <div class="content-grid">

            <!-- KENDARAAN TERBARU -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        🚘 Kendaraan Masuk Terbaru
                    </h2>

                    <span class="count">
                        6 transaksi terakhir
                    </span>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>Plat Nomor</th>
                                <th>Jenis</th>
                                <th>Jam Masuk</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($kendaraanTerbaru as $transaksi)

                            <tr>

                                <td class="plat">
                                    {{ $transaksi->plat_nomor }}
                                </td>

                                <td>
                                    {{ ucfirst($transaksi->jenis_kendaraan) }}
                                </td>

                                <td>
                                    {{ date('H:i', strtotime($transaksi->waktu_masuk)) }}
                                </td>

                                <td>

                                    @if($transaksi->status == 'masuk')

                                        <span class="badge parkir">
                                            Sedang Parkir
                                        </span>

                                    @else

                                        <span class="badge selesai">
                                            Selesai
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    style="text-align:center; padding:30px; color:#a8a0ba;">

                                    Belum ada transaksi.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- SLOT PARKIR -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        📊 Ketersediaan Slot
                    </h2>

                    <span class="count">
                        Total {{ $totalSlot }} Slot
                    </span>

                </div>

                <div class="donut-wrap">

                    <div class="donut">

                        <div class="donut-center">

                            <div class="pct">
                                {{ $persentaseTerisi }}%
                            </div>

                            <div class="donut-label">
                                Terisi
                            </div>

                        </div>

                    </div>

                    <div class="legend">

                        <div class="legend-item">
                            🟣 Terisi ({{ $slotTerisi }})
                        </div>

                        <div class="legend-item">
                            ⚪ Kosong ({{ $slotKosong }})
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>