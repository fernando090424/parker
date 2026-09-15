<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User - Parkir Kabasa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            padding: 40px 20px;
            color: #f8fafc;
            background:
                radial-gradient(circle at top right, #352052 0%, transparent 38%),
                radial-gradient(circle at bottom left, #21113d 0%, transparent 35%),
                #0b0b12;
        }

        .container {
            width: 100%;
            max-width: 650px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
            padding-left: 5px;
        }

        .header h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            font-size: 30px;
            font-weight: 700;
            text-shadow: 0 0 20px rgba(168, 85, 247, 0.35);
        }

        .header p {
            margin-top: 10px;
            color: #aaa7b8;
            font-size: 14px;
            line-height: 1.6;
        }

        .card {
            position: relative;
            padding: 35px;
            overflow: hidden;
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 22px;
            background: linear-gradient(
                145deg,
                rgba(28, 23, 40, 0.97),
                rgba(15, 15, 24, 0.97)
            );
            box-shadow:
                0 20px 45px rgba(0, 0, 0, 0.45),
                0 0 35px rgba(124, 58, 237, 0.08);
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #7c3aed, #c084fc, #7c3aed);
        }

        .card-title {
            margin-bottom: 28px;
            color: #e9d5ff;
            font-size: 18px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 23px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #e9d5ff;
            font-size: 14px;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid rgba(168, 85, 247, 0.28);
            border-radius: 11px;
            outline: none;
            color: #f8fafc;
            background: rgba(10, 10, 18, 0.9);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: #71717a;
        }

        input:hover,
        select:hover {
            border-color: rgba(192, 132, 252, 0.65);
        }

        input:focus,
        select:focus {
            border-color: #a855f7;
            background: #11111c;
            box-shadow:
                0 0 0 3px rgba(168, 85, 247, 0.16),
                0 0 18px rgba(168, 85, 247, 0.08);
        }

        select {
            cursor: pointer;
        }

        select option {
            color: #ffffff;
            background: #15121f;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(168, 85, 247, 0.14);
        }

        .btn-update,
        .btn-kembali {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            padding: 13px 22px;
            border-radius: 11px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-update {
            border: none;
            color: #ffffff;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
            cursor: pointer;
        }

        .btn-update:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #7c3aed, #c084fc);
            box-shadow: 0 10px 28px rgba(168, 85, 247, 0.4);
        }

        .btn-kembali {
            color: #ddd6fe;
            background: rgba(39, 39, 52, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.22);
        }

        .btn-kembali:hover {
            transform: translateY(-3px);
            color: #ffffff;
            background: #3f3f46;
            border-color: rgba(192, 132, 252, 0.4);
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            .card {
                padding: 25px 20px;
                border-radius: 18px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-update,
            .btn-kembali {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>✏️ Edit User</h1>
            <p>
                Perbarui informasi pengguna pada sistem
                <strong>Parkir Kabosa</strong>.
            </p>
        </div>

        <div class="card">

            <div class="card-title">
                👤 Informasi Pengguna
            </div>

            <form action="{{ route('admin.user.update', $user->id_user) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <!-- NAMA LENGKAP -->
                <div class="form-group">

                    <label for="nama_lengkap">Nama Lengkap</label>

                    <input
                        type="text"
                        id="nama_lengkap"
                        name="nama_lengkap"
                        value="{{ $user->nama_lengkap }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="off"
                        required
                    >

                </div>

                <!-- USERNAME -->
                <div class="form-group">

                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ $user->username }}"
                        placeholder="Masukkan username"
                        autocomplete="off"
                        required
                    >

                </div>

                <!-- ROLE -->
                <div class="form-group">

                    <label for="role">Role Pengguna</label>

                    <select name="role" id="role" required>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            🛡️ Admin
                        </option>

                        <option value="petugas"
                            {{ $user->role == 'petugas' ? 'selected' : '' }}>
                            👮 Petugas
                        </option>

                        <option value="owner"
                            {{ $user->role == 'owner' ? 'selected' : '' }}>
                            👑 Owner
                        </option>

                    </select>

                </div>

                <div class="button-group">

                    <button type="submit" class="btn-update">
                        💾 Update User
                    </button>

                    <a href="{{ route('admin.user.index') }}"
                       class="btn-kembali">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>