<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data User - Parkir Kabasa</title>

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
                #0d0d12;
            color: #f5f3ff;
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
            padding: 25px 16px;
            background: linear-gradient(180deg, #111118, #241137, #120d1d);
            border-right: 1px solid #302044;
            box-shadow: 8px 0 30px rgba(0, 0, 0, .35);
            z-index: 10;
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
            background: linear-gradient(135deg, #7c3aed, #c026d3);
            box-shadow: 0 0 22px rgba(168, 85, 247, .35);
            font-size: 25px;
        }

        .brand h2 {
            color: white;
            font-size: 20px;
            font-weight: 800;
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
            color: #b8aecb;
            text-decoration: none;
            font-size: 15px;
            transition: .3s ease;
        }

        .menu a:hover {
            color: white;
            background: linear-gradient(90deg, #6d28d9, #9333ea);
            box-shadow: 0 0 20px rgba(139, 92, 246, .25);
            transform: translateX(5px);
        }

        .menu a.active {
            color: white;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            box-shadow: 0 0 22px rgba(139, 92, 246, .35);
        }

        .logout {
            margin-top: 25px;
            background: linear-gradient(135deg, #ec4899, #be185d);
            color: white !important;
            justify-content: center;
            font-weight: 800;
        }

        .logout:hover {
            background: linear-gradient(135deg, #f472b6, #db2777) !important;
            transform: translateY(-3px) !important;
        }

        /* MAIN */
        .main {
            width: calc(100% - 250px);
            margin-left: 250px;
            padding: 35px 40px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: white;
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .header p {
            color: #a69ab8;
            font-size: 14px;
        }

        /* ALERT */
        .success,
        .error-message {
            padding: 15px 18px;
            border-radius: 14px;
            margin-bottom: 22px;
            font-weight: 600;
            border: 1px solid;
        }

        .success {
            color: #6ee7b7;
            background: rgba(16, 185, 129, .12);
            border-color: rgba(52, 211, 153, .3);
        }

        .error-message {
            color: #fca5a5;
            background: rgba(239, 68, 68, .12);
            border-color: rgba(248, 113, 113, .3);
        }

        /* CARD */
        .card {
            padding: 28px;
            background: linear-gradient(145deg, #1a1a23, #111118);
            border: 1px solid #302044;
            border-radius: 23px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .top h2 {
            color: white;
            font-size: 21px;
            font-weight: 800;
        }

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 18px;
            border-radius: 13px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            text-decoration: none;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(139, 92, 246, .25);
            transition: .3s ease;
        }

        .btn-tambah:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(139, 92, 246, .4);
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
        }

        table th {
            padding: 16px 14px;
            text-align: left;
            color: #ddd6fe;
            background: linear-gradient(90deg, #4c1d95, #6d28d9);
            font-size: 13px;
            border-bottom: 1px solid #7c3aed;
        }

        table th:first-child {
            border-radius: 10px 0 0 0;
        }

        table th:last-child {
            border-radius: 0 10px 0 0;
        }

        table td {
            padding: 17px 14px;
            color: #ddd6e9;
            border-bottom: 1px solid #25202f;
            font-size: 14px;
        }

        table tbody tr {
            transition: .25s ease;
        }

        table tbody tr:hover {
            background: rgba(139, 92, 246, .09);
        }

        .id-user {
            color: #c084fc;
            font-weight: 800;
        }

        .username {
            color: #e9d5ff;
            font-weight: 600;
        }

        /* ROLE */
        .role {
            display: inline-flex;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(139, 92, 246, .16);
            color: #c4b5fd;
            border: 1px solid rgba(167, 139, 250, .25);
        }

        /* BUTTON */
        .btn-edit,
        .btn-hapus {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 9px 13px;
            border: none;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s ease;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .btn-hapus {
            margin-left: 5px;
            background: linear-gradient(135deg, #ef4444, #b91c1c);
        }

        .btn-edit:hover,
        .btn-hapus:hover {
            transform: translateY(-3px);
        }

        .btn-edit:hover {
            box-shadow: 0 7px 18px rgba(245, 158, 11, .3);
        }

        .btn-hapus:hover {
            box-shadow: 0 7px 18px rgba(239, 68, 68, .3);
        }

        form {
            display: inline;
        }

        .kosong {
            text-align: center;
            padding: 35px !important;
            color: #a69ab8 !important;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main {
                width: calc(100% - 220px);
                margin-left: 220px;
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
                width: 100%;
                margin-left: 0;
                padding: 22px 15px;
            }

            .header h1 {
                font-size: 27px;
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
            <div class="brand-icon">🅿</div>
            <h2>Parkir Kabosa</h2>
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.kendaraan.index') }}">
                🚗 Kendaraan
            </a>

            <a href="{{ route('admin.user.index') }}" class="active">
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

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="header">
            <h1>👥 Data User</h1>
            <p>Kelola seluruh pengguna sistem Parkir Kabosa</p>
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
                <h2>Daftar User</h2>

                <a href="{{ route('admin.user.create') }}" class="btn-tambah">
                    ＋ Tambah User
                </a>
            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr>
                                <td class="id-user">
                                    #{{ $user->id_user }}
                                </td>

                                <td>
                                    {{ $user->nama_lengkap }}
                                </td>

                                <td class="username">
                                    {{ $user->username }}
                                </td>

                                <td>
                                    <span class="role">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>

                                <td>

                                    <a href="{{ route('admin.user.edit', $user->id_user) }}"
                                       class="btn-edit">
                                        ✏ Edit
                                    </a>

                                    <form action="{{ route('admin.user.delete', $user->id_user) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-hapus"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                                            🗑 Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="kosong">
                                    👥 Belum ada data user.
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