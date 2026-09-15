<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Parkir Kabasa</title>

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
            padding: 25px;

            background:
                radial-gradient(circle at top left, #352052 0%, transparent 38%),
                radial-gradient(circle at bottom right, #21113d 0%, transparent 40%),
                #0b0b12;

            overflow-x: hidden;
        }

        .login-wrapper {
            width: 1100px;
            min-height: 650px;
            display: flex;
            overflow: hidden;

            border: 1px solid rgba(168, 85, 247, 0.35);
            border-radius: 30px;

            background: #151122;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.55),
                0 0 35px rgba(124, 58, 237, 0.15);
        }

        /* BAGIAN KIRI */

        .left-section {
            position: relative;
            width: 50%;
            padding: 65px 55px;
            color: white;
            overflow: hidden;

            background:
                radial-gradient(circle at top right, rgba(192, 132, 252, 0.25), transparent 35%),
                linear-gradient(145deg, #21113d, #4c1d75);
        }

        .left-section::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            right: -190px;
            top: -160px;
            border-radius: 50%;
            background: rgba(192, 132, 252, 0.12);
        }

        .left-section::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 230px;
            bottom: -110px;
            left: -100px;
            border-radius: 50%;
            background: rgba(124, 58, 237, 0.25);
        }

        .brand {
            position: relative;
            z-index: 2;
        }

        .logo {
            width: 78px;
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 25px;

            border: 2px solid rgba(255, 255, 255, 0.4);
            border-radius: 22px;

            color: #6d28d9;
            background: #ffffff;

            font-size: 43px;
            font-weight: 800;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.25),
                0 0 20px rgba(192, 132, 252, 0.25);
        }

        .brand h1 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 18px;
            text-shadow: 0 0 18px rgba(192, 132, 252, 0.4);
        }

        .brand h1 span {
            color: #d8b4fe;
        }

        .brand p {
            max-width: 350px;
            color: #ede9fe;
            font-size: 17px;
            line-height: 1.7;
        }

        /* ILUSTRASI PARKIR */

        .parking-illustration {
            position: absolute;
            bottom: 35px;
            left: 55px;
            right: 55px;
            height: 210px;
            z-index: 2;
        }

        .road {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 110px;

            background: #c4b5fd;
            clip-path: polygon(20% 0, 80% 0, 100% 100%, 0 100%);
            opacity: 0.8;
        }

        .parking-sign {
            position: absolute;
            left: 35px;
            bottom: 90px;

            width: 70px;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 7px solid white;
            border-radius: 12px;

            background: #7c3aed;
            color: white;

            font-size: 40px;
            font-weight: bold;

            box-shadow: 0 0 18px rgba(192, 132, 252, 0.45);
        }

        .parking-sign::after {
            content: "";
            position: absolute;
            width: 8px;
            height: 65px;
            top: 63px;
            background: #ddd6fe;
        }

        .gate {
            position: absolute;
            right: 45px;
            bottom: 75px;

            width: 130px;
            height: 80px;

            border-radius: 10px 10px 0 0;
            background: #5b21b6;

            box-shadow: inset 0 0 0 8px #8b5cf6;
        }

        .gate::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 12px;
            top: 15px;
            left: 80px;

            background: #f472b6;
            transform: rotate(-8deg);
            transform-origin: left;

            box-shadow: 0 0 0 4px white;
        }

        .car {
            position: absolute;
            right: 130px;
            bottom: 20px;

            width: 150px;
            height: 65px;

            border: 5px solid #a78bfa;
            border-radius: 45px 45px 15px 15px;
            background: #ffffff;

            box-shadow: 0 0 20px rgba(192, 132, 252, 0.25);
        }

        .car::before {
            content: "";
            position: absolute;
            width: 75px;
            height: 35px;
            left: 32px;
            top: -30px;

            border: 5px solid #a78bfa;
            border-bottom: none;
            border-radius: 35px 35px 0 0;
            background: #ddd6fe;
        }

        .wheel {
            position: absolute;
            bottom: -18px;

            width: 35px;
            height: 35px;

            border: 7px solid white;
            border-radius: 50%;
            background: #21113d;
        }

        .wheel.left {
            left: 20px;
        }

        .wheel.right {
            right: 20px;
        }

        /* BAGIAN KANAN */

        .right-section {
            width: 50%;
            padding: 60px 65px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(31, 22, 48, 0.98),
                    rgba(18, 14, 30, 0.98)
                );
        }

        .right-section h2 {
            margin-bottom: 12px;

            color: #ffffff;
            font-size: 34px;

            text-shadow: 0 0 15px rgba(192, 132, 252, 0.35);
        }

        .subtitle {
            margin-bottom: 35px;
            color: #c4b5fd;
            line-height: 1.6;
        }

        .alert {
            padding: 13px 15px;
            margin-bottom: 18px;

            border: 1px solid rgba(251, 113, 133, 0.35);
            border-radius: 12px;

            background: rgba(159, 18, 57, 0.2);
            color: #fda4af;

            font-size: 14px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;

            color: #e9d5ff;
            font-weight: 600;
        }

        .input-box {
            position: relative;
        }

        .input-box span {
            position: absolute;
            left: 16px;
            top: 14px;

            font-size: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 15px 18px 15px 50px;

            border: 1px solid #4c2678;
            border-radius: 13px;
            outline: none;

            color: #ffffff;
            background: #151122;

            font-size: 15px;
            transition: 0.3s ease;
        }

        .input-box input::placeholder {
            color: #8f82a8;
        }

        .input-box input:focus {
            border-color: #c084fc;
            background: #1b1430;

            box-shadow:
                0 0 0 4px rgba(192, 132, 252, 0.12),
                0 0 18px rgba(124, 58, 237, 0.12);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 5px 0 25px;
            font-size: 14px;
        }

        .remember {
            color: #a8a0ba;
        }

        .remember input {
            margin-right: 6px;
            accent-color: #a855f7;
        }

        .forgot {
            color: #c084fc;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot:hover {
            color: #e9d5ff;
        }

        .login-button {
            width: 100%;
            padding: 16px;

            border: none;
            border-radius: 13px;

            background: linear-gradient(135deg, #6d28d9, #a855f7);
            color: white;

            font-size: 17px;
            font-weight: bold;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(124, 58, 237, 0.3),
                0 0 15px rgba(168, 85, 247, 0.12);

            transition: 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-3px);

            box-shadow:
                0 15px 30px rgba(168, 85, 247, 0.4),
                0 0 20px rgba(168, 85, 247, 0.2);
        }

        .features {
            display: flex;
            justify-content: space-between;

            margin-top: 35px;
            padding-top: 25px;

            border-top: 1px solid #302342;
        }

        .feature {
            text-align: center;
            color: #a8a0ba;
            font-size: 12px;
        }

        .feature strong {
            display: block;
            margin-bottom: 6px;

            color: #c084fc;
            font-size: 24px;

            text-shadow: 0 0 12px rgba(192, 132, 252, 0.35);
        }

        .copyright {
            margin-top: 25px;

            text-align: center;
            color: #746783;
            font-size: 12px;
        }

        @media (max-width: 900px) {
            .login-wrapper {
                width: 100%;
                max-width: 520px;
            }

            .left-section {
                display: none;
            }

            .right-section {
                width: 100%;
                padding: 45px 30px;
            }
        }

        @media (max-width: 500px) {
            body {
                padding: 15px;
            }

            .right-section {
                padding: 35px 22px;
            }

            .right-section h2 {
                font-size: 28px;
            }

            .form-options {
                gap: 10px;
                flex-direction: column;
                align-items: flex-start;
            }

            .features {
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <section class="left-section">

            <div class="brand">
                <div class="logo">P</div>

                <h1>
                    Sistem Informasi<br>
                    <span>Parkir Kabasa</span>
                </h1>

                <p>
                    Kelola parkir dengan lebih mudah, cepat, aman,
                    dan terintegrasi dalam satu sistem.
                </p>
            </div>

            <div class="parking-illustration">
                <div class="road"></div>
                <div class="parking-sign">P</div>
                <div class="gate"></div>

                <div class="car">
                    <div class="wheel left"></div>
                    <div class="wheel right"></div>
                </div>
            </div>

        </section>

        <section class="right-section">

            <h2>Selamat Datang 👋</h2>

            <p class="subtitle">
                Silakan masuk menggunakan username dan kata sandi
                untuk melanjutkan ke sistem.
            </p>

            @if(session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username">👤 Username</label>

                    <div class="input-box">
                        <span>👤</span>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">🔒 Kata Sandi</label>

                    <div class="input-box">
                        <span>🔒</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan kata sandi"
                            required
                        >
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Ingat saya
                    </label>

                    <a href="#" class="forgot">
                        Lupa kata sandi?
                    </a>
                </div>

                <button type="submit" class="login-button">
                    Masuk ➜
                </button>
            </form>

            <div class="features">
                <div class="feature">
                    <strong>🛡️</strong>
                    Aman
                </div>

                <div class="feature">
                    <strong>⚡</strong>
                    Cepat
                </div>

                <div class="feature">
                    <strong>☁️</strong>
                    Terintegrasi
                </div>
            </div>

            <div class="copyright">
                © {{ date('Y') }} Parkir Kabasa. All Rights Reserved.
            </div>

        </section>

    </div>

</body>
</html>