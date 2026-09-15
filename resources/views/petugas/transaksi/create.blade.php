<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kendaraan Masuk - Parkir Kabasa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 18px;
            background:
                radial-gradient(circle at top left, #352052 0%, transparent 38%),
                radial-gradient(circle at bottom right, #21113d 0%, transparent 40%),
                #0b0b12;
            color: #f5f3ff;
        }

        .container {
            width: 100%;
            max-width: 680px;
        }

        .card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #171322, #100d18);
            padding: 38px;
            border-radius: 24px;
            border: 1px solid rgba(168, 85, 247, 0.25);
            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.45),
                0 0 35px rgba(124, 58, 237, 0.08);
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(
                90deg,
                #6d28d9,
                #a855f7,
                #c084fc
            );
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .icon {
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            font-size: 38px;
            box-shadow: 0 12px 30px rgba(168, 85, 247, 0.3);
        }

        h1 {
            color: #ffffff;
            font-size: 30px;
            margin-bottom: 10px;
            text-shadow: 0 0 18px rgba(192, 132, 252, 0.25);
        }

        .subtitle {
            color: #b8a9d2;
            font-size: 14px;
            line-height: 1.7;
        }

        .error {
            margin-bottom: 24px;
            padding: 16px 18px;
            border-radius: 13px;
            background: rgba(190, 24, 93, 0.15);
            color: #fda4af;
            border: 1px solid rgba(244, 63, 94, 0.35);
            font-size: 14px;
        }

        .error strong {
            display: block;
            margin-bottom: 8px;
            color: #fecdd3;
        }

        .error ul {
            margin-left: 20px;
            line-height: 1.8;
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

        .label-icon {
            margin-right: 6px;
        }

        .select-wrapper {
            position: relative;
        }

        select {
            width: 100%;
            appearance: none;
            padding: 15px 45px 15px 16px;
            border: 1px solid #3d2b58;
            border-radius: 13px;
            outline: none;
            background: #0f0b18;
            color: #f5f3ff;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        select option {
            background: #171322;
            color: #ffffff;
        }

        select:focus {
            border-color: #a855f7;
            box-shadow:
                0 0 0 4px rgba(168, 85, 247, 0.13),
                0 0 18px rgba(168, 85, 247, 0.12);
        }

        .select-wrapper::after {
            content: "⌄";
            position: absolute;
            right: 17px;
            top: 10px;
            color: #c084fc;
            font-size: 24px;
            pointer-events: none;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-simpan,
        .btn-kembali {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 13px 18px;
            border-radius: 13px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-simpan {
            border: none;
            background: linear-gradient(135deg, #6d28d9, #a855f7);
            color: white;
            cursor: pointer;
            box-shadow: 0 10px 24px rgba(124, 58, 237, 0.25);
        }

        .btn-simpan:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(168, 85, 247, 0.4);
        }

        .btn-kembali {
            background: #24202f;
            color: #d8c9eb;
            border: 1px solid #49365f;
        }

        .btn-kembali:hover {
            background: #332844;
            color: white;
            transform: translateY(-3px);
        }

        .footer-note {
            text-align: center;
            color: #76658e;
            font-size: 12px;
            margin-top: 25px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .card {
                padding: 30px 22px;
                border-radius: 20px;
            }

            h1 {
                font-size: 26px;
            }

            .form-actions {
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

    <div class="card">

        <div class="header">

            <div class="icon">
                🚗
            </div>

            <h1>Kendaraan Masuk</h1>

            <p class="subtitle">
                Tambahkan transaksi kendaraan yang masuk ke area parkir
                dengan mudah dan cepat.
            </p>

        </div>


        @if($errors->any())

            <div class="error">

                <strong>⚠️ Terjadi kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form action="{{ route('petugas.transaksi.store') }}" method="POST">

            @csrf


            {{-- PILIH KENDARAAN --}}
            <div class="form-group">

                <label for="id_kendaraan">
                    <span class="label-icon">🚘</span>
                    Pilih Kendaraan
                </label>

                <div class="select-wrapper">

                    <select name="id_kendaraan" id="id_kendaraan" required>

                        <option value="">
                            -- Pilih Kendaraan --
                        </option>

                        @foreach($kendaraans as $kendaraan)

                            <option value="{{ $kendaraan->id_kendaraan }}">

                                {{ $kendaraan->plat_nomor }}
                                -
                                {{ ucfirst($kendaraan->jenis_kendaraan) }}
                                -
                                {{ $kendaraan->pemilik }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- PILIH AREA PARKIR --}}
            <div class="form-group">

                <label for="id_area">
                    <span class="label-icon">📍</span>
                    Area Parkir
                </label>

                <div class="select-wrapper">

                    <select name="id_area" id="id_area" required>

                        <option value="">
                            -- Pilih Area Parkir --
                        </option>

                        @foreach($areas as $area)

                            <option value="{{ $area->id_area }}">

                                {{ $area->nama_area }}
                                (Kapasitas: {{ $area->kapasitas }})

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- PILIH TARIF --}}
            <div class="form-group">

                <label for="id_tarif">
                    <span class="label-icon">💰</span>
                    Tarif Parkir
                </label>

                <div class="select-wrapper">

                    <select name="id_tarif" id="id_tarif" required>

                        <option value="">
                            -- Pilih Tarif --
                        </option>

                        @foreach($tarifs as $tarif)

                            <option value="{{ $tarif->id_tarif }}">

                                {{ ucfirst($tarif->jenis_kendaraan) }}
                                -
                                Rp {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}
                                / Jam

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            <div class="form-actions">

                <button type="submit" class="btn-simpan">
                    💾 Simpan Transaksi
                </button>

                <a href="{{ route('petugas.transaksi.index') }}"
                   class="btn-kembali">
                    ← Kembali
                </a>

            </div>

        </form>


        <div class="footer-note">
            Sistem Manajemen Parkir Kabasa
        </div>

    </div>

</div>

</body>
</html>