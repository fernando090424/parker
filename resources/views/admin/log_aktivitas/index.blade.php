<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log Aktivitas - Parkir Kabosa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            color: #f8fafc;
            background:
                radial-gradient(circle at top right, #241137 0%, #0d0d12 45%),
                #0d0d12;
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
            top: 0;
            left: 0;
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
            color: #ffffff;
            font-size: 19px;
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
            font-size: 14px;
            transition: 0.3s ease;
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

        /* MAIN CONTENT */
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

        .card h2 {
            margin-bottom: 25px;
            color: #ffffff;
            font-size: 21px;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
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
            vertical-align: middle;
        }

        table tbody tr {
            background: rgba(26, 26, 35, 0.7);
            transition: 0.3s ease;
        }

        table tbody tr:hover {
            background: rgba(124, 58, 237, 0.14);
        }

        .aktivitas {
            color: #c4b5fd;
            font-weight: 500;
        }

        .waktu {
            color: #a1a1aa;
            white-space: nowrap;
        }

        .kosong {
            padding: 30px;
            text-align: center;
            color: #a1a1aa;
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

            <a href="{{ route('admin.area.index') }}">
                🅿️ Area Parkir
            </a>

            <a href="{{ route('admin.tarif.index') }}">
                💰 Tarif Parkir
            </a>

            <a href="{{ route('admin.log.index') }}" class="active">
                📋 Log Aktivitas
            </a>

            <a href="{{ route('logout') }}" class="logout">
                🚪 Logout
            </a>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="header">
            <h1>📋 Log Aktivitas</h1>
            <p>Riwayat aktivitas pengguna pada sistem Parkir Kabosa</p>
        </div>

        <div class="card">

            <h2>Riwayat Aktivitas Sistem</h2>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Aktivitas</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($logs as $log)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $log->nama_lengkap ?? '-' }}
                                </td>

                                <td>
                                    {{ $log->username ?? '-' }}
                                </td>

                                <td class="aktivitas">
                                    {{ $log->aktivitas }}
                                </td>

                                <td class="waktu">
                                    {{ $log->waktu_aktivitas }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="kosong">
                                    📋 Belum ada riwayat aktivitas.
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