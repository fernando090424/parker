<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Tarif Parkir - Parkir Kabasa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(126, 34, 206, .15), transparent 35%),
                #0b0b12;
            color: #f5f3ff;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            padding: 25px 16px;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 10;
            color: white;
            background: linear-gradient(
                180deg,
                #111118 0%,
                #241137 55%,
                #100b1c 100%
            );
            border-right: 1px solid #35204d;
            box-shadow: 8px 0 30px rgba(0, 0, 0, .4);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 5px 8px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            font-size: 25px;
            box-shadow: 0 0 25px rgba(168, 85, 247, .4);
        }

        .brand h2 {
            color: #ffffff;
            font-size: 20px;
            font-weight: 800;
        }

        .brand small {
            display: block;
            margin-top: 3px;
            color: #b8aecb;
            font-size: 11px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 16px;
            color: #b8aecb;
            text-decoration: none;
            border-radius: 14px;
            font-size: 14px;
            transition: .3s ease;
        }

        .menu a:hover {
            color: white;
            background: linear-gradient(90deg, #6d28d9, #9333ea);
            box-shadow: 0 0 20px rgba(139, 92, 246, .3);
            transform: translateX(5px);
        }

        .menu a.active {
            color: white;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            box-shadow: 0 0 22px rgba(139, 92, 246, .4);
        }

        .logout {
            margin-top: 25px;
            justify-content: center;
            color: white !important;
            background: linear-gradient(135deg, #ec4899, #be185d);
            box-shadow: 0 8px 22px rgba(236, 72, 153, .25);
        }

        .logout:hover {
            background: linear-gradient(135deg, #f472b6, #db2777) !important;
            transform: translateY(-3px) !important;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            margin-left: 250px;
            min-height: 100vh;
            padding: 35px 40px;
        }

        /* ================= HEADER ================= */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #ffffff;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .header p {
            color: #a69ab8;
            font-size: 14px;
        }

        .header-line {
            width: 85px;
            height: 5px;
            margin-top: 15px;
            border-radius: 20px;
            background: linear-gradient(90deg, #7c3aed, #ec4899);
            box-shadow: 0 0 15px rgba(168, 85, 247, .5);
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            background: #181521;
            border: 1px solid #35204d;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .3);
        }

        .avatar {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #7c3aed, #ec4899);
            color: white;
            font-weight: 800;
            font-size: 18px;
        }

        .user-info strong {
            display: block;
            color: white;
            font-size: 14px;
        }

        .user-info span {
            display: block;
            margin-top: 4px;
            color: #a69ab8;
            font-size: 12px;
        }

        /* ================= ALERT ================= */

        .success,
        .error-message {
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 14px;
            font-size: 14px;
            border: 1px solid;
        }

        .success {
            color: #6ee7b7;
            background: rgba(6, 78, 59, .35);
            border-color: #047857;
        }

        .error-message {
            color: #fda4af;
            background: rgba(127, 29, 29, .35);
            border-color: #be123c;
        }

        /* ================= CARD ================= */

        .card {
            padding: 28px;
            background: linear-gradient(145deg, #1a1824, #111118);
            border: 1px solid #35204d;
            border-radius: 24px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .35);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .card-title-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: linear-gradient(135deg, #312052, #7c3aed);
            font-size: 23px;
            box-shadow: 0 0 20px rgba(139, 92, 246, .25);
        }

        .card-title h2 {
            color: white;
            font-size: 21px;
            font-weight: 800;
        }

        .card-title p {
            margin-top: 5px;
            color: #a69ab8;
            font-size: 13px;
        }

        /* ================= BUTTON ================= */

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 18px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border-radius: 13px;
            background: linear-gradient(135deg, #7c3aed, #c026d3);
            box-shadow: 0 8px 22px rgba(139, 92, 246, .3);
            transition: .3s ease;
        }

        .btn-tambah:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(168, 85, 247, .45);
        }

        .btn-edit {
            display: inline-block;
            padding: 9px 13px;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            border-radius: 9px;
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            transition: .3s;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(139, 92, 246, .4);
        }

        .btn-hapus {
            padding: 9px 13px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            border-radius: 9px;
            background: linear-gradient(135deg, #ec4899, #be185d);
            transition: .3s;
        }

        .btn-hapus:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(236, 72, 153, .4);
        }

        .form-hapus {
            display: inline;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid #35204d;
            border-radius: 16px;
        }

        table thead th {
            padding: 16px;
            text-align: left;
            color: #e9d5ff;
            background: linear-gradient(90deg, #321052, #4c1d95);
            border-bottom: 1px solid #6d28d9;
            font-size: 12px;
            font-weight: 700;
        }

        table tbody td {
            padding: 17px 16px;
            color: #ddd6e9;
            background: #15131d;
            border-bottom: 1px solid #2b213b;
            font-size: 13px;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        table tbody tr {
            transition: .25s ease;
        }

        table tbody tr:hover td {
            background: rgba(124, 58, 237, .12);
        }

        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            padding: 6px 9px;
            border-radius: 9px;
            color: #d8b4fe;
            background: #2e1b49;
            font-weight: 700;
        }

        .vehicle-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 20px;
            color: #c4b5fd;
            background: rgba(109, 40, 217, .2);
            border: 1px solid #5b21b6;
            font-size: 12px;
            font-weight: 600;
        }

        .price {
            color: #f0abfc;
            font-size: 14px;
            font-weight: 800;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .kosong {
            padding: 35px !important;
            text-align: center;
            color: #a69ab8 !important;
            background: #15131d !important;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
                padding: 30px 25px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .card-top {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                padding: 25px 18px;
            }

            .brand {
                margin-bottom: 25px;
            }

            .menu {
                gap: 6px;
            }

            .menu a {
                padding: 12px;
            }

            .header h1 {
                font-size: 27px;
            }

            .user-box {
                width: 100%;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">
                🅿️
            </div>

            <div>
                <h2>Parkir Kabosa</h2>
                <small>Sistem Informasi Parkir</small>
            </div>
        </div>

        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.kendaraan.index') }}">
                🚗 Kendaraan
            </a>

            <a href="{{ route('admin.user.index') }}">
                👥 Data User
            </a>

            <a href="{{ route('admin.area.index') }}">
                🅿️ Area Parkir
            </a>

            <a href="{{ route('admin.tarif.index') }}" class="active">
                💰 Tarif Parkir
            </a>

            <a href="{{ route('admin.log.index') }}">
                📋 Log Aktivitas
            </a>

            <a href="{{ route('logout') }}" class="logout">
                🚪 Logout
            </a>

        </nav>

    </aside>

    <!-- ================= MAIN ================= -->

    <main class="main">

        <!-- ================= HEADER ================= -->

        <div class="header">

            <div>
                <h1>💰 Data Tarif Parkir</h1>

                <p>
                    Kelola tarif parkir kendaraan pada sistem Parkir Kabosa
                </p>

                <div class="header-line"></div>
            </div>

            <div class="user-box">

                <div class="avatar">
                    {{ strtoupper(substr(session('username') ?? 'A', 0, 1)) }}
                </div>

                <div class="user-info">
                    <strong>
                        {{ session('username') ?? 'Admin' }}
                    </strong>

                    <span>
                        Administrator
                    </span>
                </div>

            </div>

        </div>

        <!-- ================= ALERT ================= -->

        @if(session('success'))
            <div class="success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-message">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- ================= DATA CARD ================= -->

        <section class="card">

            <div class="card-top">

                <div class="card-title">

                    <div class="card-title-icon">
                        💰
                    </div>

                    <div>
                        <h2>Daftar Tarif Parkir</h2>
                        <p>Informasi tarif berdasarkan jenis kendaraan</p>
                    </div>

                </div>

                <a href="{{ route('admin.tarif.create') }}" class="btn-tambah">
                    ➕ Tambah Tarif
                </a>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tarif per Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($tarifs as $tarif)

                            <tr>

                                <td>
                                    <span class="id-badge">
                                        #{{ $tarif->id_tarif }}
                                    </span>
                                </td>

                                <td>
                                    <span class="vehicle-badge">
                                        @if(strtolower($tarif->jenis_kendaraan) == 'motor')
                                            🏍️
                                        @elseif(strtolower($tarif->jenis_kendaraan) == 'mobil')
                                            🚗
                                        @else
                                            🚘
                                        @endif

                                        {{ ucfirst($tarif->jenis_kendaraan) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="price">
                                        Rp {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>

                                    <div class="action-group">

                                        <a
                                            href="{{ route('admin.tarif.edit', $tarif->id_tarif) }}"
                                            class="btn-edit">
                                            ✏️ Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.tarif.delete', $tarif->id_tarif) }}"
                                            method="POST"
                                            class="form-hapus">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-hapus"
                                                onclick="return confirm('Yakin ingin menghapus tarif ini?')">
                                                🗑️ Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="kosong">
                                    💰 Belum ada data tarif parkir.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</div>

</body>

</html>