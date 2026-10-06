<x-guest-layout>

    <style>
        .register-form .field {
            margin-bottom: 17px;
        }

        .register-form label {
            display: block;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 800;
            color: #555;
        }

        .register-form input {
            width: 100%;
            border: 1px solid #ded6d2;
            background: white;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
        }

        .register-form input:focus {
            border-color: #df3f59;
            box-shadow: 0 0 0 3px rgba(223, 63, 89, .08);
        }

        .register-error {
            margin-top: 6px;
            color: #bd3348;
            font-size: 11px;
        }

        .register-button {
            width: 100%;
            border: none;
            background: #df3f59;
            color: white;
            border-radius: 8px;
            padding: 13px 16px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            margin-top: 4px;
        }

        .register-button:hover {
            background: #c9344b;
        }
    </style>

    <div class="auth-heading">

        <div class="auth-kicker">
            Create Account
        </div>

        <h2 class="auth-title">
            Buat akun baru.
        </h2>

        <p class="auth-subtitle">
            Daftar untuk mulai mengelola koleksi buku di RakBuku.
        </p>

    </div>

    <form
        method="POST"
        action="{{ route('register') }}"
        class="register-form"
    >
        @csrf

        <div class="field">
            <label>Nama</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Nama lengkap"
            >

            @error('name')
                <div class="register-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="nama@email.com"
            >

            @error('email')
                <div class="register-error">
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
                autocomplete="new-password"
                placeholder="Minimal 8 karakter"
            >

            @error('password')
                <div class="register-error">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label>Konfirmasi Password</label>

            <input
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password"
            >
        </div>

        <button type="submit" class="register-button">
            Daftar
        </button>

    </form>

    <div class="auth-footer">
        Sudah punya akun?
        <a href="{{ route('login') }}">
            Masuk
        </a>
    </div>

</x-guest-layout>