<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Struk Parkir</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --bg: #0b0b12;
            --card: #171322;
            --card-soft: #211a32;

            --purple: #7c3aed;
            --purple-light: #a855f7;
            --purple-soft: #c084fc;

            --text: #f5f3ff;
            --muted: #aaa3bf;
            --line: rgba(192, 132, 252, .2);

            --green: #34d399;
            --green-soft: rgba(52, 211, 153, .13);
        }

        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 45px 20px;
            background:
                radial-gradient(circle at top right, #352052 0%, transparent 35%),
                radial-gradient(circle at bottom left, #21113d 0%, transparent 35%),
                var(--bg);
            color: var(--text);
        }

        .wrapper {
            width: 100%;
            max-width: 480px;
            margin: auto;
        }

        .struk {
            position: relative;
            overflow: hidden;
            padding: 30px;
            border: 1px solid var(--line);
            border-radius: 24px;
            background:
                linear-gradient(145deg, rgba(124, 58, 237, .13), transparent 42%),
                var(--card);
            box-shadow:
                0 20px 55px rgba(0, 0, 0, .35),
                0 0 35px rgba(124, 58, 237, .08);
        }

        .struk::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(
                90deg,
                var(--purple),
                var(--purple-soft),
                var(--purple)
            );
        }

        .header {
            text-align: center;
            padding-bottom: 22px;
            margin-bottom: 24px;
            border-bottom: 2px dashed rgba(192, 132, 252, .35);
        }

        .logo {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                var(--purple),
                var(--purple-light)
            );
            box-shadow: 0 0 28px rgba(168, 85, 247, .4);
            font-size: 32px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.5px;
            background: linear-gradient(
                90deg,
                #ffffff,
                var(--purple-soft)
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .receipt-label {
            display: inline-block;
            margin-top: 15px;
            padding: 7px 13px;
            border: 1px solid rgba(192, 132, 252, .25);
            border-radius: 20px;
            color: var(--purple-soft);
            background: rgba(168, 85, 247, .1);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .details {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .label {
            color: var(--muted);
            font-size: 12px;
        }

        .value {
            max-width: 62%;
            color: #f5f3ff;
            font-size: 12px;
            font-weight: 700;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .value.highlight {
            color: var(--purple-soft);
        }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-top: 25px;
            padding: 19px 0 0;
            border-top: 2px dashed rgba(192, 132, 252, .35);
        }

        .total .label {
            color: white;
            font-size: 13px;
            font-weight: 800;
        }

        .total .value {
            max-width: 70%;
            color: var(--green);
            font-size: 20px;
            font-weight: 800;
            text-shadow: 0 0 15px rgba(52, 211, 153, .18);
        }

        .footer {
            margin-top: 26px;
            padding-top: 20px;
            border-top: 2px dashed rgba(192, 132, 252, .35);
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
            text-align: center;
        }

        .footer strong {
            color: var(--purple-soft);
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 22px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 13px 18px;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .25s ease;
        }

        .btn-cetak {
            background: linear-gradient(
                135deg,
                var(--purple),
                var(--purple-light)
            );
            box-shadow: 0 8px 22px rgba(124, 58, 237, .3);
        }

        .btn-kembali {
            background: rgba(255, 255, 255, .08);
            border: 1px solid var(--line);
            color: #d8d0eb;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-cetak:hover {
            box-shadow: 0 12px 28px rgba(168, 85, 247, .4);
        }

        .btn-kembali:hover {
            background: rgba(168, 85, 247, .14);
            color: white;
        }

        @media (max-width: 520px) {
            body {
                padding: 25px 14px;
            }

            .struk {
                padding: 24px 20px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 21px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        @media print {
            @page {
                size: auto;
                margin: 10mm;
            }

            body {
                padding: 0;
                background: white;
                color: black;
            }

            .wrapper {
                max-width: 100%;
            }

            .struk {
                width: 100%;
                max-width: 420px;
                margin: auto;
                border: 1px solid #ddd;
                border-radius: 0;
                background: white;
                color: black;
                box-shadow: none;
            }

            .struk::before {
                display: none;
            }

            .header h1,
            .value,
            .total .label {
                color: black;
                background: none;
                -webkit-text-fill-color: initial;
            }

            .header p,
            .label,
            .footer {
                color: #555;
            }

            .value.highlight {
                color: #333;
            }

            .total .value {
                color: #047857;
                text-shadow: none;
            }

            .buttons {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="struk">

        <div class="header">

            <div class="logo">
                🅿️
            </div>

            <h1>PARKIR KABASA</h1>

            <p>Struk Pembayaran Parkir</p>

            <span class="receipt-label">
                BUKTI PEMBAYARAN
            </span>

        </div>

        <div class="details">

            <div class="row">
                <span class="label">ID Parkir</span>

                <span class="value highlight">
                    #{{ $transaksi->id_parkir }}
                </span>
            </div>

            <div class="row">
                <span class="label">Plat Nomor</span>

                <span class="value">
                    {{ $transaksi->plat_nomor }}
                </span>
            </div>

            <div class="row">
                <span class="label">Jenis Kendaraan</span>

                <span class="value">
                    {{ ucfirst($transaksi->jenis_kendaraan) }}
                </span>
            </div>

            <div class="row">
                <span class="label">Pemilik</span>

                <span class="value">
                    {{ $transaksi->pemilik }}
                </span>
            </div>

            <div class="row">
                <span class="label">Area Parkir</span>

                <span class="value">
                    {{ $transaksi->nama_area }}
                </span>
            </div>

            <div class="row">
                <span class="label">Waktu Masuk</span>

                <span class="value">
                    {{ $transaksi->waktu_masuk }}
                </span>
            </div>

            <div class="row">
                <span class="label">Waktu Keluar</span>

                <span class="value">
                    {{ $transaksi->waktu_keluar }}
                </span>
            </div>

            <div class="row">
                <span class="label">Durasi</span>

                <span class="value">
                    {{ $transaksi->durasi_jam }} Jam
                </span>
            </div>

            <div class="row">
                <span class="label">Tarif / Jam</span>

                <span class="value">
                    Rp {{ number_format($transaksi->tarif_per_jam, 0, ',', '.') }}
                </span>
            </div>

        </div>

        <div class="total">

            <span class="label">
                TOTAL BAYAR
            </span>

            <span class="value">
                Rp {{ number_format($transaksi->biaya_total, 0, ',', '.') }}
            </span>

        </div>

        <div class="footer">

            Terima kasih telah menggunakan<br>

            layanan <strong>Parkir Kabasa</strong> 🚗💜

            <br>

            Semoga perjalanan Anda menyenangkan.

        </div>

    </div>

    <div class="buttons">

        <button
            onclick="window.print()"
            class="btn btn-cetak"
        >
            🖨️ Cetak Struk
        </button>

        <a
            href="{{ route('petugas.transaksi.index') }}"
            class="btn btn-kembali"
        >
            ← Kembali
        </a>

    </div>

</div>

</body>

</html> 