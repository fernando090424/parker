<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kendaraan - Parkir Kabosa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            padding: 40px 20px;
            color: #f8fafc;
            background:
                radial-gradient(circle at top right, #241137 0%, #0d0d12 45%),
                #0d0d12;
        }

        .container {
            width: 100%;
            max-width: 650px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #ffffff;
            font-size: 30px;
            text-shadow: 0 0 18px rgba(168, 85, 247, 0.25);
        }

        .header p {
            margin-top: 8px;
            color: #a1a1aa;
            font-size: 14px;
        }

        .card {
            padding: 35px;
            border-radius: 18px;
            background: rgba(17, 17, 24, 0.94);
            border: 1px solid rgba(168, 85, 247, 0.28);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #e9d5ff;
            font-size: 14px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 10px;
            outline: none;
            color: #f8fafc;
            background: #111118;
            font-size: 15px;
            transition: 0.3s ease;
        }

        input::placeholder {
            color: #71717a;
        }

        select option {
            color: #ffffff;
            background: #111118;
        }

        input:focus,
        select:focus {
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.18);
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .btn-simpan,
        .btn-kembali {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-simpan {
            border: none;
            color: white;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            box-shadow: 0 5px 18px rgba(124, 58, 237, 0.3);
            cursor: pointer;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.4);
        }

        .btn-kembali {
            color: #e4e4e7;
            background: #27272a;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        .btn-kembali:hover {
            color: #ffffff;
            background: #3f3f46;
            transform: translateY(-2px);
        }

        .error {
            margin-top: 6px;
            color: #fca5a5;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            .card {
                padding: 23px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-simpan,
            .btn-kembali {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🚗 Tambah Kendaraan</h1>
        <p>Masukkan data kendaraan baru ke dalam sistem Parkir Kabosa.</p>
    </div>

    <div class="card">

        <form action="{{ route('admin.kendaraan.store') }}" method="POST">

            @csrf

            <!-- PLAT NOMOR -->
            <div class="form-group">

                <label for="plat_nomor">Plat Nomor</label>

                <input
                    type="text"
                    id="plat_nomor"
                    name="plat_nomor"
                    placeholder="Contoh: N 1234 AB"
                    value="{{ old('plat_nomor') }}"
                    required
                >

                @error('plat_nomor')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <!-- JENIS KENDARAAN -->
            <div class="form-group">

                <label for="jenis_kendaraan">Jenis Kendaraan</label>

                <select
                    name="jenis_kendaraan"
                    id="jenis_kendaraan"
                    required
                >
                    <option value="">-- Pilih Jenis Kendaraan --</option>
                    <option value="motor">Motor</option>
                    <option value="mobil">Mobil</option>
                    <option value="lainnya">Lainnya</option>
                </select>

                @error('jenis_kendaraan')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <!-- PEMILIK -->
            <div class="form-group">

                <label for="pemilik">Nama Pemilik</label>

                <input
                    type="text"
                    id="pemilik"
                    name="pemilik"
                    placeholder="Masukkan nama pemilik"
                    value="{{ old('pemilik') }}"
                    required
                >

                @error('pemilik')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="button-group">

                <button type="submit" class="btn-simpan">
                    💾 Simpan Kendaraan
                </button>

                <a href="{{ route('admin.kendaraan.index') }}"
                   class="btn-kembali">
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>