<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kendaraan - Parkir Kabosa</title>

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
                #111118,
                #241137,
                #100b1b
            );
            border-right: 1px solid #382052;
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
            justify-content: center;
            align-items: center;
            border-radius: 16px;
            font-size: 25px;
            background: linear-gradient(135deg, #7c3aed, #c026d3);
            box-shadow: 0 0 25px rgba(168, 85, 247, .4);
        }

        .brand h2 {
            font-size: 20px;
            font-weight: 800;
        }

        .brand small {
            display: block;
            margin-top: 4px;
            color: #b9a9d0;
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
            border-radius: 14px;
            color: #bcb1ce;
            text-decoration: none;
            font-size: 15px;
            transition: .3s ease;
        }

        .menu a:hover {
            color: white;
            background: linear-gradient(90deg, #6d28d9, #9333ea);
            box-shadow: 0 0 22px rgba(139, 92, 246, .3);
            transform: translateX(5px);
        }

        .menu a.active {
            color: white;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            box-shadow: 0 0 25px rgba(139, 92, 246, .4);
        }

        .logout {
            margin-top: 25px;
            justify-content: center;
            background: linear-gradient(135deg, #ec4899, #be185d);
            color: white !important;
            box-shadow: 0 0 20px rgba(236, 72, 153, .25);
        }

        .logout:hover {
            background: linear-gradient(135deg, #f472b6, #db2777) !important;
        }

        /* ================= MAIN ================= */

        .main {
            flex: 1;
            margin-left: 250px;
            min-height: 100vh;
            padding: 35px 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 34px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .header p {
            color: #a99abf;
            font-size: 14px;
        }

        .header-line {
            width: 100px;
            height: 5px;
            margin-top: 18px;
            border-radius: 20px;
            background: linear-gradient(90deg, #c026d3, #7c3aed);
            box-shadow: 0 0 15px rgba(192, 38, 211, .5);
        }

        /* ================= STATISTIC ================= */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px;
            border: 1px solid #382052;
            border-radius: 22px;
            background: linear-gradient(145deg, #1b1725, #111118);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .3);
        }

        .summary-icon {
            width: 55px;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 17px;
            font-size: 25px;
            background: linear-gradient(135deg, #312052, #6d28d9);
            box-shadow: 0 0 20px rgba(139, 92, 246, .3);
        }

        .summary-card h3 {
            font-size: 25px;
            color: white;
        }

        .summary-card p {
            margin-top: 4px;
            color: #a99abf;
            font-size: 13px;
        }

        /* ================= ALERT ================= */

        .success,
        .error-message {
            padding: 15px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .success {
            color: #6ee7b7;
            background: rgba(6, 78, 59, .35);
            border: 1px solid #047857;
        }

        .error-message {
            color: #fda4af;
            background: rgba(127, 29, 29, .35);
            border: 1px solid #be123c;
        }

        /* ================= CONTENT CARD ================= */

        .card {
            padding: 28px;
            border: 1px solid #382052;
            border-radius: 24px;
            background: linear-gradient(145deg, #191622, #0f0f17);
            box-shadow: 0 12px 35px rgba(0, 0, 0, .35);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .top h2 {
            color: white;
            font-size: 21px;
        }

        .top p {
            color: #a99abf;
            font-size: 13px;
            margin-top: 6px;
        }

        /* ================= BUTTON TAMBAH ================= */

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 18px;
            border-radius: 13px;
            color: white;
            text-decoration: none;
            font-weight: 700;
            background: linear-gradient(135deg, #c026d3, #7c3aed);
            box-shadow: 0 0 20px rgba(192, 38, 211, .3);
            transition: .3s;
        }

        .btn-tambah:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(192, 38, 211, .55);
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #302044;
            border-radius: 17px;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        table th {
            padding: 17px 15px;
            text-align: left;
            color: #e9d5ff;
            font-size: 13px;
            background: linear-gradient(90deg, #281548, #211633);
            border-bottom: 1px solid #51317a;
        }

        table td {
            padding: 18px 15px;
            color: #ddd6e9;
            border-bottom: 1px solid #292033;
        }

        table tbody tr {
            transition: .25s;
        }

        table tbody tr:hover {
            background: rgba(139, 92, 246, .1);
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            padding: 7px 10px;
            border-radius: 10px;
            color: #e9d5ff;
            background: #302052;
            border: 1px solid #6d28d9;
            font-weight: 700;
        }

        .plate {
            color: #ffffff;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .vehicle-type {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #d8b4fe;
        }

        .owner {
            color: #b9a9d0;
        }

        /* ================= BUTTON AKSI ================= */

        .action-area {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-hapus {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 13px;
            border: none;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .btn-edit {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 18px rgba(124, 58, 237, .5);
        }

        .btn-hapus {
            background: linear-gradient(135deg, #ec4899, #be185d);
        }

        .btn-hapus:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 18px rgba(236, 72, 153, .5);
        }

        .form-hapus {
            display: inline;
        }

        .kosong {
            padding: 35px;
            text-align: center;
            color: #a99abf;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1100px) {
            .summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                padding: 25px 20px;
            }

            .layout {
                display: block;
            }

            .menu {
                gap: 5px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 600px) {
            .top {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-tambah {
                width: 100%;
                justify-content: center;
            }

            .card {
                padding: 18px;
            }

            .header h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">🅿</div>

            <div>
                <h2>Parkir Kabosa</h2>
                <small>Sistem Informasi Parkir</small>
            </div>
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.kendaraan.index') }}" class="active">
                🚗 Kendaraan
            </a>

            <a href="{{ route('admin.user.index') }}">
                👥 Data User
            </a>

            <a href="{{ route('admin.area.index') }}">
                🅿️ Area Parkir
            </a>

            <a href="{{ route('admin.tarif.index') }}">
                💰 Tarif Parkir
            </a>

            <a href="{{ route('admin.log.index') }}">
                📋 Log Aktivitas
            </a>

            <a href="{{ route('logout') }}" class="logout">
                🚪 Logout
            </a>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <div class="header">
            <div>
                <h1>🚗 Data Kendaraan</h1>
                <p>Kelola seluruh data kendaraan yang terdaftar pada sistem Parkir Kabosa</p>
                <div class="header-line"></div>
            </div>
        </div>

        <!-- RINGKASAN -->
        <div class="summary">

            <div class="summary-card">
                <div class="summary-icon">🚘</div>
                <div>
                    <h3>{{ $kendaraans->count() }}</h3>
                    <p>Total Kendaraan</p>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">🅿️</div>
                <div>
                    <h3>Aktif</h3>
                    <p>Data Kendaraan Terdaftar</p>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">📋</div>
                <div>
                    <h3>Data</h3>
                    <p>Manajemen Kendaraan</p>
                </div>
            </div>

        </div>

        <!-- PESAN SUKSES -->
        @if(session('success'))
            <div class="success">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- PESAN ERROR -->
        @if(session('error'))
            <div class="error-message">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- CARD DATA -->
        <div class="card">

            <div class="top">

                <div>
                    <h2>Daftar Kendaraan</h2>
                    <p>Informasi kendaraan yang tersimpan dalam sistem</p>
                </div>

                <a href="{{ route('admin.kendaraan.create') }}" class="btn-tambah">
                    ＋ Tambah Kendaraan
                </a>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plat Nomor</th>
                            <th>Jenis Kendaraan</th>
                            <th>Pemilik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($kendaraans as $kendaraan)

                            <tr>

                                <td>
                                    <span class="id-badge">
                                        {{ $kendaraan->id_kendaraan }}
                                    </span>
                                </td>

                                <td>
                                    <span class="plate">
                                        {{ $kendaraan->plat_nomor }}
                                    </span>
                                </td>

                                <td>
                                    <span class="vehicle-type">
                                        @if(strtolower($kendaraan->jenis_kendaraan) == 'mobil')
                                            🚘
                                        @else
                                            🏍️
                                        @endif

                                        {{ ucfirst($kendaraan->jenis_kendaraan) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="owner">
                                        {{ $kendaraan->pemilik }}
                                    </span>
                                </td>

                                <td>
                                    <div class="action-area">

                                        <a href="{{ route('admin.kendaraan.edit', $kendaraan->id_kendaraan) }}"
                                           class="btn-edit">
                                            ✏ Edit
                                        </a>

                                        <form action="{{ route('admin.kendaraan.delete', $kendaraan->id_kendaraan) }}"
                                              method="POST"
                                              class="form-hapus">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn-hapus"
                                                    onclick="return confirm('Yakin ingin menghapus kendaraan ini?')">
                                                🗑 Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="kosong">
                                    🚗 Belum ada data kendaraan.
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