<x-guest-layout>

    <style>
        .login-form .field {
            margin-bottom: 18px;
        }

        .login-form label {
            display: block;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 800;
            color: #555;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            border: 1px solid #ded6d2;
            background: white;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
        }

        .login-form input:focus {
            border-color: #df3f59;
            box-shadow: 0 0 0 3px rgba(223, 63, 89, .08);
        }

        .login-error {
            margin-top: 6px;
            color: #bd3348;
            font-size: 11px;
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin: 4px 0 22px;
        }

        .remember-label {
            display: flex !important;
            align-items: center;
            gap: 7px;
            margin: 0 !important;
            font-size: 12px !important;
            color: #777 !important;
            font-weight: 600 !important;
        }

        .remember-label input {
            accent-color: #df3f59;
        }

        .forgot-link {
            font-size: 11px;
            color: #df3f59;
            font-weight: 800;
            text-decoration: none;
        }

        .login-button {
            width: 100%;
            border: none;
            background: #df3f59;
            color: white;
            border-radius: 8px;
            padding: 13px 16px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
        }

        .login-button:hover {
            background: #c9344b;
        }

        .status-message {
            margin-bottom: 16px;
            padding: 11px 12px;
            background: #eef8f0;
            color: #347347;
            border: 1px solid #cee8d4;
            border-radius: 8px;
            font-size: 12px;
        }
    </style>

    <div class="auth-heading">
        <div class="auth-kicker">
            Welcome Back
        </div>

        <h2 class="auth-title">
            Masuk ke RakBuku.
        </h2>

        <p class="auth-subtitle">
            Masukkan email dan password untuk mengelola koleksi perpustakaan.
        </p>
    </div>

    @if (session('status'))
        <div class="status-message">
            {{ session('status') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('login') }}"
        class="login-form"
    >
        @csrf

        <div class="field">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="nama@email.com"
            >

            @error('email')
                <div class="login-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label>Password</label>

            <input
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password"
            >

            @error('password')
                <div class="login-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="remember-row">

            <label class="remember-label">
                <input type="checkbox" name="remember">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="forgot-link"
                >
                    Lupa password?
                </a>
            @endif

        </div>

        <button type="submit" class="login-button">
            Masuk
        </button>

    </form>

    <div class="auth-footer">
        Belum punya akun?
        <a href="{{ route('register') }}">
            Daftar sekarang
        </a>
    </div>

</x-guest-layout>