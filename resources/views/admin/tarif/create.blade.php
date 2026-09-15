<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tarif - Parkir Kabasa</title>

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
            max-width: 680px;
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

        .input-wrapper {
            position: relative;
        }

        .currency {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #c084fc;
            font-size: 14px;
            font-weight: 700;
            pointer-events: none;
        }

        .currency-input {
            padding-left: 48px;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(168, 85, 247, 0.14);
        }

        .btn-simpan,
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

        .btn-simpan {
            border: none;
            color: #ffffff;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
            cursor: pointer;
        }

        .btn-simpan:hover {
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
            <h1>💰 Tambah Tarif</h1>
            <p>
                Tambahkan tarif kendaraan baru ke dalam sistem
                <strong>Parkir Kabosa</strong>.
            </p>
        </div>

        <div class="card">

            <div class="card-title">
                🧾 Informasi Tarif Parkir
            </div>

            <form action="{{ route('admin.tarif.store') }}" method="POST">

                @csrf

                <!-- JENIS KENDARAAN -->
                <div class="form-group">

                    <label for="jenis_kendaraan">Jenis Kendaraan</label>

                    <select
                        name="jenis_kendaraan"
                        id="jenis_kendaraan"
                        required
                    >
                        <option value="">-- Pilih Jenis Kendaraan --</option>
                        <option value="motor">🏍️ Motor</option>
                        <option value="mobil">🚘 Mobil</option>
                        <option value="lainnya">🚙 Lainnya</option>
                    </select>

                </div>

                <!-- TARIF PER JAM -->
                <div class="form-group">

                    <label for="tarif_per_jam">Tarif per Jam</label>

                    <div class="input-wrapper">
                        <span class="currency">Rp</span>

                        <input
                            type="number"
                            id="tarif_per_jam"
                            name="tarif_per_jam"
                            class="currency-input"
                            placeholder="Contoh: 3000"
                            min="0"
                            required
                        >
                    </div>

                </div>

                <div class="button-group">

                    <button type="submit" class="btn-simpan">
                        💾 Simpan Tarif
                    </button>

                    <a href="{{ route('admin.tarif.index') }}"
                       class="btn-kembali">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>