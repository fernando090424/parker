<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tarif - Parkir Kabasa</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            padding: 40px 20px;
            background:
                radial-gradient(circle at top left, #352052 0%, transparent 38%),
                radial-gradient(circle at bottom right, #21113d 0%, transparent 40%),
                #0b0b12;
            color: #ffffff;
        }

        .container {
            width: 100%;
            max-width: 680px;
            margin: auto;
        }

        .card {
            position: relative;
            overflow: hidden;
            padding: 35px;
            border: 1px solid rgba(168, 85, 247, 0.35);
            border-radius: 22px;
            background: linear-gradient(
                145deg,
                rgba(31, 22, 48, 0.98),
                rgba(18, 14, 30, 0.98)
            );
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.45),
                0 0 25px rgba(124, 58, 237, 0.12);
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #7c3aed, #c084fc, #7c3aed);
        }

        h1 {
            margin-bottom: 10px;
            text-align: center;
            color: #ffffff;
            font-size: 30px;
            text-shadow: 0 0 15px rgba(192, 132, 252, 0.6);
        }

        .subtitle {
            margin-bottom: 30px;
            color: #c4b5fd;
            text-align: center;
            font-size: 14px;
        }

        .form-group {
            margin-top: 22px;
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
            color: #ffffff;
            background: #151122;
            border: 1px solid #4c2678;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
            transition: 0.3s ease;
        }

        input::placeholder {
            color: #8f82a8;
        }

        input:focus,
        select:focus {
            border-color: #c084fc;
            box-shadow: 0 0 0 3px rgba(192, 132, 252, 0.15);
            background: #1b1430;
        }

        select option {
            color: #ffffff;
            background: #151122;
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
            font-weight: bold;
            pointer-events: none;
        }

        .currency-input {
            padding-left: 48px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-update,
        .btn-kembali {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 13px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-update {
            flex: 1;
            color: #ffffff;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            border: none;
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.25);
        }

        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(168, 85, 247, 0.4);
        }

        .btn-kembali {
            color: #ddd6fe;
            background: #211b2d;
            border: 1px solid #514064;
        }

        .btn-kembali:hover {
            color: #ffffff;
            background: #302342;
            border-color: #a855f7;
            transform: translateY(-3px);
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            .card {
                padding: 25px 20px;
            }

            h1 {
                font-size: 25px;
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
        <div class="card">

            <h1>✏️ Edit Tarif</h1>
            <p class="subtitle">
                Perbarui informasi tarif kendaraan parkir
            </p>

            <form action="{{ route('admin.tarif.update', $tarif->id_tarif) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="jenis_kendaraan">🚗 Jenis Kendaraan</label>

                    <select name="jenis_kendaraan" id="jenis_kendaraan" required>
                        <option value="motor"
                            {{ $tarif->jenis_kendaraan == 'motor' ? 'selected' : '' }}>
                            Motor
                        </option>

                        <option value="mobil"
                            {{ $tarif->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>
                            Mobil
                        </option>

                        <option value="lainnya"
                            {{ $tarif->jenis_kendaraan == 'lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tarif_per_jam">💰 Tarif per Jam</label>

                    <div class="input-wrapper">
                        <span class="currency">Rp</span>

                        <input type="number"
                               id="tarif_per_jam"
                               name="tarif_per_jam"
                               value="{{ $tarif->tarif_per_jam }}"
                               min="0"
                               placeholder="Masukkan tarif per jam"
                               class="currency-input"
                               required>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-update">
                        💾 Update Tarif
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