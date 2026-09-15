<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Owner - Parkir Kabasa</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --page-bg: #0b0b12;
            --page-bg-2: #151022;

            --sidebar: #120d20;
            --sidebar-2: #211238;
            --sidebar-active: #5b21b6;

            --primary: #7c3aed;
            --primary-light: #a855f7;
            --primary-soft: rgba(168, 85, 247, .16);

            --ink: #f5f3ff;
            --muted: #aaa2c5;
            --line: rgba(192, 132, 252, .16);

            --card: #171322;
            --card-2: #211a32;

            --blue: #60a5fa;
            --blue-soft: rgba(96, 165, 250, .16);

            --teal: #2dd4bf;
            --teal-soft: rgba(45, 212, 191, .15);

            --pink: #f472b6;
            --pink-soft: rgba(244, 114, 182, .15);

            --green: #4ade80;
            --green-soft: rgba(74, 222, 128, .15);

            --danger: #fb7185;
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
                radial-gradient(circle at top right, #352052 0%, transparent 35%),
                radial-gradient(circle at bottom left, #21113d 0%, transparent 32%),
                var(--page-bg);
            color: var(--ink);
        }

        body {
            min-height: 100vh;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 255px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            padding: 26px 18px;
            color: #ddd6fe;
            background:
                linear-gradient(180deg, rgba(124, 58, 237, .16), transparent 35%),
                linear-gradient(190deg, var(--sidebar), var(--sidebar-2));
            border-right: 1px solid rgba(192, 132, 252, .14);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 28px;
            margin-bottom: 14px;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            background: linear-gradient(135deg, #6d28d9, #c084fc);
            box-shadow: 0 0 22px rgba(168, 85, 247, .35);
        }

        .brand-name {
            color: white;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: .2px;
        }

        .brand-name span {
            display: block;
            color: #c4b5fd;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.4px;
            margin-top: 3px;
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
            color: #b8add4;
            text-decoration: none;
            font-size: 14px;
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
            box-shadow: 0 8px 24px rgba(124, 58, 237, .28);
        }

        .sidebar-foot {
            padding-top: 17px;
            border-top: 1px solid rgba(192, 132, 252, .15);
            color: #8e82ae;
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
            align-items: flex-start;
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
            font-size: 14px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 17px 9px 9px;
            background: rgba(23, 19, 34, .88);
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .18);
        }

        .avatar {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-weight: 800;
            background: linear-gradient(135deg, #7c3aed, #c084fc);
            box-shadow: 0 0 18px rgba(168, 85, 247, .25);
        }

        .profile-name {
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        /* ================= STATISTIK ================= */

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
            background:
                linear-gradient(145deg, rgba(255,255,255,.025), transparent),
                var(--card);
            border: 1px solid var(--line);
            border-radius: 19px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, .18);
            transition: .25s ease;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #7c3aed, #c084fc);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(192, 132, 252, .4);
            box-shadow: 0 15px 35px rgba(124, 58, 237, .16);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            margin-bottom: 17px;
            font-size: 20px;
        }

        .blue {
            color: var(--blue);
            background: var(--blue-soft);
        }

        .teal {
            color: var(--teal);
            background: var(--teal-soft);
        }

        .indigo {
            color: #c084fc;
            background: var(--primary-soft);
        }

        .green {
            color: var(--green);
            background: var(--green-soft);
        }

        .stat-value {
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            word-break: break-word;
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            margin-top: 7px;
        }

        .stat-desc {
            color: #c084fc;
            font-size: 11px;
            font-weight: 600;
            margin-top: 15px;
        }

        /* ================= CONTENT ================= */

        .content-grid {
            display: grid;
            grid-template-columns: 1.7fr 1fr;
            gap: 20px;
        }

        .panel {
            position: relative;
            overflow: hidden;
            padding: 24px;
            background:
                linear-gradient(145deg, rgba(168, 85, 247, .035), transparent),
                var(--card);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, .18);
        }

        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #7c3aed, #c084fc);
        }

        .panel-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .panel-head h2 {
            margin: 0;
            color: #ffffff;
            font-size: 17px;
            font-weight: 800;
        }

        .count {
            color: var(--muted);
            font-size: 11px;
        }

        .btn-rekap {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 10px;
            color: white;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 6px 18px rgba(124, 58, 237, .2);
            transition: .25s ease;
        }

        .btn-rekap:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 23px rgba(168, 85, 247, .35);
        }

        /* ================= TABLE ================= */

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 13px 10px;
            text-align: left;
            color: #c4b5fd;
            background: rgba(124, 58, 237, .12);
            border-bottom: 1px solid var(--line);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 8px 0 0 8px;
        }

        th:last-child {
            border-radius: 0 8px 8px 0;
        }

        td {
            padding: 14px 10px;
            color: #d8d1e8;
            border-bottom: 1px solid rgba(192, 132, 252, .1);
            font-size: 12px;
            white-space: nowrap;
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
            color: #ffffff;
            font-weight: 800;
        }

        /* ================= BADGE ================= */

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
        }

        .badge-masuk {
            color: #93c5fd;
            background: rgba(59, 130, 246, .16);
            border: 1px solid rgba(96, 165, 250, .18);
        }

        .badge-keluar {
            color: #86efac;
            background: rgba(34, 197, 94, .14);
            border: 1px solid rgba(74, 222, 128, .18);
        }

        .empty {
            padding: 30px !important;
            text-align: center;
            color: var(--muted);
        }

        /* ================= DONUT ================= */

        .donut-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 12px;
        }

        .donut {
            width: 185px;
            height: 185px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background:
                conic-gradient(
                    #a855f7 0% {{ $persentaseTerisi }}%,
                    #30263f {{ $persentaseTerisi }}% 100%
                );
            box-shadow:
                0 0 30px rgba(168, 85, 247, .16),
                inset 0 0 20px rgba(0, 0, 0, .15);
        }

        .donut-center {
            width: 133px;
            height: 133px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #171322;
            border: 1px solid rgba(192, 132, 252, .12);
        }

        .pct {
            color: #ffffff;
            font-size: 28px;
            font-weight: 800;
        }

        .donut-label {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 23px;
        }

        .legend-item {
            color: var(--muted);
            font-size: 12px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1150px) {
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

        @media (max-width: 800px) {
            .sidebar {
                width: 215px;
            }

            .main {
                padding: 22px;
            }

            .topbar {
                flex-direction: column;
                align-items: stretch;
            }

            .profile {
                width: fit-content;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 18px;
            }

            .panel-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar h1 {
                font-size: 25px;
            }

            .donut {
                width: 165px;
                height: 165px;
            }

            .donut-center {
                width: 119px;
                height: 119px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">
                🅿️
            </div>

            <div class="brand-name">
                Parkir Kabasa
                <span>OWNER PANEL</span>
            </div>
        </div>

        <nav>

            <a href="{{ route('owner.dashboard') }}"
               class="nav-item active">
                🏠 Dashboard
            </a>

            <a href="{{ route('owner.rekap.index') }}"
               class="nav-item">
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


    <!-- ================= MAIN ================= -->

    <main class="main">

        <!-- ================= HEADER ================= -->

        <div class="topbar">

            <div>
                <h1>
                    Dashboard Owner
                </h1>

                <div class="sub">
                    Ringkasan bisnis dan aktivitas parkir
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


        <!-- ================= STATISTIK ================= -->

        <div class="stats">

            <!-- TOTAL TRANSAKSI -->

            <div class="stat-card">

                <div class="stat-icon blue">
                    🚗
                </div>

                <div class="stat-value">
                    {{ $totalTransaksi }}
                </div>

                <div class="stat-label">
                    Total Transaksi
                </div>

                <div class="stat-desc">
                    Semua transaksi parkir
                </div>

            </div>


            <!-- TOTAL PENDAPATAN -->

            <div class="stat-card">

                <div class="stat-icon teal">
                    💰
                </div>

                <div class="stat-value">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </div>

                <div class="stat-label">
                    Total Pendapatan
                </div>

                <div class="stat-desc">
                    Dari transaksi selesai
                </div>

            </div>


            <!-- PENDAPATAN HARI INI -->

            <div class="stat-card">

                <div class="stat-icon indigo">
                    📅
                </div>

                <div class="stat-value">
                    Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}
                </div>

                <div class="stat-label">
                    Pendapatan Hari Ini
                </div>

                <div class="stat-desc">
                    Pendapatan hari ini
                </div>

            </div>


            <!-- SEDANG PARKIR -->

            <div class="stat-card">

                <div class="stat-icon green">
                    🅿️
                </div>

                <div class="stat-value">
                    {{ $sedangParkir }}
                </div>

                <div class="stat-label">
                    Sedang Parkir
                </div>

                <div class="stat-desc">
                    Kendaraan masih berada di area
                </div>

            </div>

        </div>


        <!-- ================= CONTENT ================= -->

        <div class="content-grid">

            <!-- ================= TRANSAKSI TERBARU ================= -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        Transaksi Terbaru
                    </h2>

                    <a href="{{ route('owner.rekap.index') }}"
                       class="btn-rekap">
                        Lihat Rekap
                    </a>

                </div>


                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>
                                <th>Plat Nomor</th>
                                <th>Jenis</th>
                                <th>Area</th>
                                <th>Waktu Masuk</th>
                                <th>Status</th>
                            </tr>

                        </thead>


                        <tbody>

                        @forelse($transaksiTerbaru as $item)

                            <tr>

                                <td class="plat">
                                    {{ $item->plat_nomor }}
                                </td>

                                <td>
                                    {{ ucfirst($item->jenis_kendaraan) }}
                                </td>

                                <td>
                                    {{ $item->nama_area }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('d-m-Y H:i') }}
                                </td>

                                <td>

                                    @if($item->status == 'masuk')

                                        <span class="badge badge-masuk">
                                            Masuk
                                        </span>

                                    @else

                                        <span class="badge badge-keluar">
                                            ✓ Keluar
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="empty">
                                    Belum ada transaksi.
                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- ================= SLOT PARKIR ================= -->

            <div class="panel">

                <div class="panel-head">

                    <h2>
                        Ketersediaan Slot
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
                            ⚫ Kosong ({{ $slotKosong }})
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>