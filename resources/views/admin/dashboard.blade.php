<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Parkir - Parkir Kabosa</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            color: #f8fafc;
            background:
                radial-gradient(circle at top right, rgba(139, 92, 246, .18), transparent 30%),
                radial-gradient(circle at bottom left, rgba(236, 72, 153, .12), transparent 30%),
                #080810;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            padding: 28px 18px;
            background:
                linear-gradient(160deg, #211038, #100d1c 55%, #080810);
            border-right: 1px solid rgba(168, 85, 247, .25);
            box-shadow: 10px 0 40px rgba(0, 0, 0, .4);
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 8px;
            margin-bottom: 48px;
            font-size: 21px;
            font-weight: 800;
            color: white;
        }

        .logo-icon {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            box-shadow: 0 0 30px rgba(168, 85, 247, .5);
            font-size: 27px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 16px 17px;
            margin-bottom: 12px;
            border-radius: 16px;
            color: #b7abc9;
            text-decoration: none;
            font-size: 14px;
            transition: .3s ease;
        }

        .menu a:hover {
            color: white;
            background: linear-gradient(90deg, #6d28d9, #c026d3);
            box-shadow: 0 0 25px rgba(168, 85, 247, .35);
            transform: translateX(5px);
        }

        .menu a.active {
            color: white;
            background: linear-gradient(90deg, #7c3aed, #c026d3);
            box-shadow: 0 0 28px rgba(168, 85, 247, .45);
        }

        /* ================= MAIN ================= */

        .main {
            min-height: 100vh;
            margin-left: 260px;
            padding: 38px 42px;
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 38px;
        }

        .header h1 {
            margin-bottom: 8px;
            color: white;
            font-size: 35px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .header h1 span {
            color: #c084fc;
        }

        .header p {
            color: #a69ab8;
            font-size: 13px;
        }

        .profile-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 18px;
            background: rgba(29, 24, 42, .85);
            border: 1px solid rgba(168, 85, 247, .25);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .3);
        }

        .avatar {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            color: white;
            font-weight: 800;
            box-shadow: 0 0 20px rgba(168, 85, 247, .4);
        }

        .profile-info h3 {
            color: white;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .profile-info p {
            color: #aaa0ba;
            font-size: 12px;
        }

        /* ================= LOGOUT ================= */

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 15px 20px;
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            background: linear-gradient(135deg, #f43f5e, #ec4899);
            box-shadow: 0 8px 25px rgba(236, 72, 153, .3);
            transition: .3s ease;
        }

        .btn-logout:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(236, 72, 153, .55);
        }

        /* ================= STATISTIC CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 23px;
            margin-bottom: 28px;
        }

        .card {
            position: relative;
            overflow: hidden;
            padding: 27px;
            border-radius: 25px;
            background: linear-gradient(145deg, #211b2d, #110f18);
            border: 1px solid rgba(168, 85, 247, .2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .3);
            transition: .35s ease;
        }

        .card::before {
            content: "";
            position: absolute;
            right: -60px;
            bottom: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(168, 85, 247, .12);
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: #a855f7;
            box-shadow: 0 0 35px rgba(168, 85, 247, .3);
        }

        .card-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            border-radius: 18px;
            background: linear-gradient(135deg, #4c1d95, #a21caf);
            box-shadow: 0 0 25px rgba(139, 92, 246, .3);
            font-size: 25px;
        }

        .card h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 8px;
            color: white;
            font-size: 29px;
            font-weight: 800;
        }

        .card p {
            position: relative;
            z-index: 1;
            color: #aaa0ba;
            font-size: 12px;
        }

        .card .trend {
            display: inline-block;
            margin-top: 17px;
            color: #6ee7b7;
            font-size: 11px;
            font-weight: 600;
        }

        /* ================= CONTENT ================= */

        .bottom {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 27px;
        }

        .box {
            padding: 29px;
            border-radius: 25px;
            background: linear-gradient(145deg, #211b2d, #110f18);
            border: 1px solid rgba(168, 85, 247, .2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .3);
        }

        .box-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .box-header h2 {
            color: white;
            font-size: 18px;
            font-weight: 800;
        }

        .box-header span {
            color: #a69ab8;
            font-size: 11px;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 15px 12px;
            color: #a69ab8;
            text-align: left;
            font-size: 11px;
            border-bottom: 1px solid #382b49;
        }

        td {
            padding: 18px 12px;
            color: #e9dff5;
            font-size: 13px;
            border-bottom: 1px solid #2b2238;
        }

        tbody tr {
            transition: .25s ease;
        }

        tbody tr:hover {
            background: rgba(139, 92, 246, .1);
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            border-radius: 20px;
            background: rgba(16, 185, 129, .15);
            color: #6ee7b7;
            font-size: 11px;
            font-weight: 600;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 10px #34d399;
        }

        /* ================= SLOT PARKIR ================= */

        .slot-number {
            position: relative;
            width: 190px;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 35px auto 20px;
            border-radius: 50%;
            background:
                radial-gradient(circle at center, #171322 58%, transparent 59%),
                conic-gradient(#c026d3 68%, #30213f 0);
            box-shadow:
                0 0 35px rgba(192, 38, 211, .3),
                inset 0 0 25px rgba(0, 0, 0, .5);
        }

        .slot-number::before {
            content: "";
            position: absolute;
            width: 155px;
            height: 155px;
            border-radius: 50%;
            background: #171322;
        }

        .slot-number span {
            position: relative;
            z-index: 2;
            color: #d8b4fe;
            font-size: 42px;
            font-weight: 800;
            text-shadow: 0 0 20px rgba(192, 132, 252, .6);
        }

        .slot-description {
            color: #aaa0ba;
            text-align: center;
            font-size: 13px;
        }

        .slot-details {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            color: #aaa0ba;
            font-size: 12px;
        }

        .slot-details strong {
            color: #d8b4fe;
        }

        .slot-progress {
            height: 12px;
            overflow: hidden;
            margin-top: 28px;
            border-radius: 30px;
            background: #30213f;
        }

        .slot-progress-bar {
            width: 68%;
            height: 100%;
            border-radius: 30px;
            background: linear-gradient(90deg, #7c3aed, #c026d3, #ec4899);
            box-shadow: 0 0 20px rgba(192, 38, 211, .7);
        }

        .total-slot {
            margin-top: 28px;
            color: #d8b4fe;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1250px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .bottom {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 25px 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-area {
                width: 100%;
                justify-content: space-between;
            }
        }

        @media (max-width: 560px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .profile-area {
                flex-direction: column;
                align-items: stretch;
            }

            .header h1 {
                font-size: 28px;
            }

            .box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">🅿</div>
            <span>Parkir kabasa</span>
        </div>

        <nav class="menu">

            <a href="/admin/dashboard" class="active">
                🏠 <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.kendaraan.index') }}">
                🚗 <span>Kendaraan</span>
            </a>

            <a href="{{ route('admin.user.index') }}">
                👤 <span>Data User</span>
            </a>

            <a href="{{ route('admin.area.index') }}">
                🅿️ <span>Area Parkir</span>
            </a>

            <a href="{{ route('admin.tarif.index') }}">
                💰 <span>Tarif Parkir</span>
            </a>

            <a href="{{ route('admin.log.index') }}">
                📋 <span>Log Aktivitas</span>
            </a>

        </nav>

    </aside>

    <!-- ================= MAIN ================= -->

    <main class="main">

        <!-- ================= HEADER ================= -->

        <header class="header">

            <div>
                <h1>Dashboard <span>Parkir</span></h1>

                <p>
                    Ringkasan aktivitas sistem parkir hari ini
                </p>
            </div>

            <div class="profile-area">

                <div class="profile">

                    <div class="avatar">
                        {{ strtoupper(substr(session('username') ?? 'A', 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <h3>
                            {{ session('username') ?? 'Admin' }}
                        </h3>

                        <p>
                            Administrator
                        </p>

                    </div>

                </div>

                <a href="{{ route('logout') }}" class="btn-logout">
                    🚪 Logout
                </a>

            </div>

        </header>

        <!-- ================= CARDS ================= -->

        <section class="cards">

            <div class="card">

                <div class="card-icon">🚗</div>

                <h2>24</h2>

                <p>Sedang Parkir</p>

                <span class="trend">↗ +3 dari kemarin</span>

            </div>

            <div class="card">

                <div class="card-icon">📅</div>

                <h2>97</h2>

                <p>Total Hari Ini</p>

                <span class="trend">↗ +12% dari kemarin</span>

            </div>

            <div class="card">

                <div class="card-icon">💰</div>

                <h2>Rp 486rb</h2>

                <p>Pendapatan Hari Ini</p>

                <span class="trend">↗ +15% dari kemarin</span>

            </div>

            <div class="card">

                <div class="card-icon">⏱️</div>

                <h2>2j 15m</h2>

                <p>Rata-rata Durasi</p>

                <span class="trend">↘ -8% dari kemarin</span>

            </div>

        </section>

        <!-- ================= BOTTOM CONTENT ================= -->

        <section class="bottom">

            <!-- KENDARAAN TERBARU -->

            <div class="box">

                <div class="box-header">

                    <h2>🚗 Kendaraan Masuk Terbaru</h2>

                    <span>Aktivitas terbaru</span>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>Plat Nomor</th>
                                <th>Jenis</th>
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>B 1234 KAB</td>
                                <td>Mobil</td>
                                <td>
                                    <span class="status">Parkir</span>
                                </td>
                            </tr>

                            <tr>
                                <td>B 5521 XYA</td>
                                <td>Motor</td>
                                <td>
                                    <span class="status">Parkir</span>
                                </td>
                            </tr>

                            <tr>
                                <td>D 4471 ASA</td>
                                <td>Mobil</td>
                                <td>
                                    <span class="status">Selesai</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- SLOT PARKIR -->

            <div class="box">

                <div class="box-header">

                    <h2>🅿️ Ketersediaan Slot</h2>

                    <span>Real-time</span>

                </div>

                <div class="slot-number">
                    <span>68%</span>
                </div>

                <p class="slot-description">
                    Slot Parkir Terisi
                </p>

                <div class="slot-progress">
                    <div class="slot-progress-bar"></div>
                </div>

                <div class="slot-details">
                    <span>Slot terisi</span>
                    <strong>27 Slot</strong>
                </div>

                <div class="slot-details">
                    <span>Slot tersedia</span>
                    <strong>13 Slot</strong>
                </div>

                <p class="total-slot">
                    Total 40 Slot Parkir
                </p>

            </div>

        </section>

    </main>

</body>

</html>