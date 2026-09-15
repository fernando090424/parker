<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Area Parkir - Parkir Kabosa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background:
                radial-gradient(circle at top right, #241137 0%, #0d0d12 45%),
                #0d0d12;
            color: #f8fafc;
            min-height: 100vh;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            padding: 25px 15px;
            color: white;
            background: linear-gradient(
                180deg,
                #111118,
                #241137,
                #120d1d
            );
            border-right: 1px solid rgba(168, 85, 247, 0.25);
            box-shadow: 8px 0 30px rgba(0, 0, 0, 0.35);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.35);
            font-size: 22px;
        }

        .brand h2 {
            font-size: 19px;
            color: #ffffff;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 15px;
            border-radius: 11px;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.3s ease;
            font-size: 14px;
        }

        .menu a:hover {
            color: #ffffff;
            background: rgba(168, 85, 247, 0.18);
            transform: translateX(4px);
        }

        .menu a.active {
            color: #ffffff;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            box-shadow: 0 5px 20px rgba(124, 58, 237, 0.35);
        }

        .logout {
            margin-top: 30px;
            justify-content: center;
            color: white !important;
            background: linear-gradient(135deg, #ec4899, #be185d);
            box-shadow: 0 5px 18px rgba(236, 72, 153, 0.25);
        }

        .logout:hover {
            background: linear-gradient(135deg, #f472b6, #db2777) !important;
            transform: translateY(-2px) !important;
        }

        /* MAIN */
        .main {
            flex: 1;
            margin-left: 250px;
            padding: 40px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 30px;
            color: #ffffff;
            text-shadow: 0 0 18px rgba(168, 85, 247, 0.25);
        }

        .header p {
            margin-top: 8px;
            color: #a1a1aa;
            font-size: 14px;
        }

        /* CARD */
        .card {
            padding: 28px;
            border-radius: 18px;
            background: rgba(17, 17, 24, 0.92);
            border: 1px solid rgba(168, 85, 247, 0.25);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.35);
            overflow: hidden;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .top h2 {
            color: #ffffff;
            font-size: 21px;
        }

        /* BUTTON TAMBAH */
        .btn-tambah {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 10px;
            color: white;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 18px rgba(124, 58, 237, 0.3);
            transition: 0.3s ease;
        }

        .btn-tambah:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(168, 85, 247, 0.4);
        }

        /* BUTTON AKSI */
        .btn-edit {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 8px;
            color: white;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .btn-hapus {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            color: white;
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            margin-left: 5px;
        }

        .btn-hapus:hover {
            background: linear-gradient(135deg, #f87171, #dc2626);
        }

        /* PESAN */
        .success {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 10px;
            color: #86efac;
            background: rgba(22, 101, 52, 0.25);
            border: 1px solid rgba(34, 197, 94, 0.35);
        }

        .error-message {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 10px;
            color: #fca5a5;
            background: rgba(127, 29, 29, 0.25);
            border: 1px solid rgba(239, 68, 68, 0.35);
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        table th {
            padding: 15px;
            text-align: left;
            color: #ffffff;
            background: linear-gradient(135deg, #5b21b6, #7c3aed);
            border-bottom: 1px solid rgba(168, 85, 247, 0.5);
            font-size: 14px;
        }

        table td {
            padding: 15px;
            color: #d4d4d8;
            border-bottom: 1px solid rgba(148, 163, 184, 0.12);
            font-size: 14px;
        }

        table tbody tr {
            background: rgba(26, 26, 35, 0.7);
            transition: 0.3s ease;
        }

        table tbody tr:hover {
            background: rgba(124, 58, 237, 0.14);
        }

        .form-hapus {
            display: inline;
        }

        .kosong {
            padding: 30px;
            text-align: center;
            color: #a1a1aa;
        }

        .jumlah-slot {
            color: #86efac;
            font-weight: bold;
        }

        .aksi {
            white-space: nowrap;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                padding: 25px;
            }

            .top {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 650px) {
            .layout {
                display: block;
            }

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .menu {
                gap: 6px;
            }

            .header h1 {
                font-size: 24px;
            }

            .card {
                padding: 18px;
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
            <h2>Parkir Kabosa</h2>
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.kendaraan.index') }}">
                🚗 Kendaraan
            </a>

            <a href="{{ route('admin.user.index') }}">
                👥 Data User
            </a>

            <a href="{{ route('admin.area.index') }}" class="active">
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
            <h1>🅿️ Data Area Parkir</h1>
            <p>Kelola informasi area dan kapasitas parkir Kabosa</p>
        </div>

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

        <div class="card">

            <div class="top">
                <h2>Daftar Area Parkir</h2>

                <a href="{{ route('admin.area.create') }}" class="btn-tambah">
                    + Tambah Area
                </a>
            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Area</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Sisa Slot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($areas as $area)

                            <tr>
                                <td>{{ $area->id_area }}</td>

                                <td>{{ $area->nama_area }}</td>

                                <td>{{ $area->kapasitas }}</td>

                                <td>{{ $area->terisi }}</td>

                                <td class="jumlah-slot">
                                    {{ $area->kapasitas - $area->terisi }}
                                </td>

                                <td class="aksi">

                                    <a href="{{ route('admin.area.edit', $area->id_area) }}"
                                       class="btn-edit">
                                        ✏ Edit
                                    </a>

                                    <form action="{{ route('admin.area.delete', $area->id_area) }}"
                                          method="POST"
                                          class="form-hapus">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-hapus"
                                                onclick="return confirm('Yakin ingin menghapus area ini?')">
                                            🗑 Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="kosong">
                                    🅿️ Belum ada data area parkir.
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