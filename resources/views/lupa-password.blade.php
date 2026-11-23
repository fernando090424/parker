<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Kata Sandi - Parkir Kabasa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card bg-secondary text-white p-4" style="width: 400px; border-radius: 12px;">
        <h3 class="mb-3 text-center">Reset Kata Sandi</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('lupa-password.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username Anda" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="password" id="password_baru" name="password_baru" class="form-control" placeholder="Masukkan kata sandi baru" required>
            </div>

            <!-- Checkbox Tampilkan Password -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePassword()">
                <label class="form-check-input-label" for="showPassword" style="font-size: 14px; cursor: pointer;">
                    Tampilkan Kata Sandi
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Kata Sandi Baru</button>
            <a href="{{ route('login') }}" class="btn btn-outline-light w-100">Kembali ke Login</a>
        </form>
    </div>

    <!-- Script JavaScript untuk Toggle Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password_baru');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>