<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RakBuku - Sistem Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff8f4;
            color: #252525;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .site-header {
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #f0ddd6;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        .header-inner {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            background: #df3f59;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            border-radius: 10px;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 900;
            color: #1e2430;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-link {
            font-size: 13px;
            font-weight: 700;
            color: #656565;
            transition: .2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #df3f59;
        }

        .add-link {
            background: #df3f59;
            color: #fff !important;
            padding: 10px 16px;
            border-radius: 8px;
        }

        .add-link:hover {
            background: #c9344b;
        }

        /* USER MENU */
        .user-menu {
            position: relative;
        }

        .user-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: #1e2430;
            color: #fff;
            font-weight: 900;
            cursor: pointer;
            transition: .2s ease;
        }

        .user-circle:hover {
            background: #df3f59;
        }

        .user-dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            width: 250px;
            background: white;
            border: 1px solid #eee0da;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,.12);
            overflow: hidden;
            z-index: 999;
        }

        .user-info {
            padding: 18px;
            border-bottom: 1px solid #eee;
        }

        .user-name {
            font-weight: 800;
            font-size: 14px;
            color: #272727;
        }

        .user-email {
            margin-top: 5px;
            font-size: 12px;
            color: #888;
            word-break: break-word;
        }

        .logout-button {
            width: 100%;
            text-align: left;
            padding: 14px 18px;
            background: white;
            border: none;
            color: #c9344b;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #fff1f3;
        }

        .page-content {
            padding: 34px 0 70px;
        }

        .site-footer {
            background: #172033;
            color: #d7deea;
            margin-top: 60px;
        }

        .footer-inner {
            padding: 42px 0;
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr;
            gap: 40px;
        }

        .footer-brand {
            font-size: 25px;
            font-weight: 900;
            color: white;
            margin-bottom: 10px;
        }

        .footer-copy {
            font-size: 13px;
            color: #aeb7c7;
            line-height: 1.7;
            max-width: 340px;
        }

        .footer-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            margin-bottom: 12px;
        }

        .footer-link {
            display: block;
            font-size: 13px;
            margin-bottom: 8px;
            color: #aeb7c7;
        }

        @media (max-width: 900px) {
            .header-inner {
                flex-wrap: wrap;
                padding: 14px 0;
            }

            .nav {
                order: 3;
                width: 100%;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .footer-inner {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="container">

            <div class="header-inner">

                <a href="{{ route('dashboard') }}" class="brand">
                    <div class="brand-mark">
                        R
                    </div>

                    <div class="brand-name">
                        RakBuku
                    </div>
                </a>

                <nav class="nav">

                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    >
                        Beranda
                    </a>

                    <a
                        href="{{ route('books.index') }}"
                        class="nav-link {{ request()->routeIs('books.index') || request()->routeIs('books.show') || request()->routeIs('books.edit') ? 'active' : '' }}"
                    >
                        Koleksi
                    </a>

                    <a
                        href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                    >
                        Kategori
                    </a>

                    <a
                        href="{{ route('books.create') }}"
                        class="nav-link add-link"
                    >
                        + Tambah Buku
                    </a>

                </nav>

                <div
                    class="user-menu"
                    x-data="{ open: false }"
                    @click.outside="open = false"
                >

                    <button
                        type="button"
                        class="user-circle"
                        @click="open = !open"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>

                    <div
                        class="user-dropdown"
                        x-show="open"
                        x-transition
                        style="display: none;"
                    >

                        <div class="user-info">

                            <div class="user-name">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="user-email">
                                {{ Auth::user()->email }}
                            </div>

                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="logout-button"
                            >
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </header>

    <main class="page-content">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">

            <div class="footer-inner">

                <div>
                    <div class="footer-brand">
                        RakBuku
                    </div>

                    <div class="footer-copy">
                        Sistem perpustakaan digital sederhana untuk mengelola
                        koleksi buku, kategori, dan stok dalam satu tempat.
                    </div>
                </div>

                <div>
                    <div class="footer-title">
                        Menu
                    </div>

                    <a href="{{ route('dashboard') }}" class="footer-link">
                        Beranda
                    </a>

                    <a href="{{ route('books.index') }}" class="footer-link">
                        Koleksi Buku
                    </a>

                    <a href="{{ route('categories.index') }}" class="footer-link">
                        Kategori
                    </a>
                </div>

                <div>
                    <div class="footer-title">
                        Pengelolaan
                    </div>

                    <a href="{{ route('books.create') }}" class="footer-link">
                        Tambah Buku
                    </a>

                    <div class="footer-link">
                        Laravel 12
                    </div>

                    <div class="footer-link">
                        UTS Pemrograman Web
                    </div>
                </div>

            </div>

        </div>
    </footer>

</body>
</html>