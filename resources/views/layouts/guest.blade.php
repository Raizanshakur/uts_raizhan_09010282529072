<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RakBuku</title>

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

        .auth-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
        }

        .auth-visual {
            position: relative;
            overflow: hidden;
            padding: 46px;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.7), transparent 32%),
                linear-gradient(145deg, #f4c7bd, #e98c97 50%, #d94b61);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .visual-brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: white;
            z-index: 2;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 900;
        }

        .visual-copy {
            max-width: 520px;
            color: white;
            z-index: 2;
        }

        .visual-tag {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.7px;
            opacity: .8;
            margin-bottom: 14px;
        }

        .visual-title {
            margin: 0;
            font-size: clamp(48px, 5vw, 78px);
            line-height: .95;
            letter-spacing: -3px;
            font-weight: 900;
        }

        .visual-text {
            margin-top: 18px;
            font-size: 15px;
            line-height: 1.8;
            max-width: 460px;
            color: rgba(255,255,255,.88);
        }

        .books-decoration {
            position: absolute;
            right: -25px;
            bottom: 20px;
            width: 330px;
            height: 330px;
            opacity: .88;
        }

        .decor-book {
            position: absolute;
            width: 105px;
            height: 170px;
            border-radius: 8px;
            box-shadow: 0 20px 35px rgba(85,27,39,.22);
        }

        .decor-book.one {
            background: #223951;
            right: 165px;
            bottom: 20px;
            transform: rotate(-14deg);
        }

        .decor-book.two {
            background: #f1bd5e;
            right: 90px;
            bottom: 45px;
            transform: rotate(-3deg);
        }

        .decor-book.three {
            background: #fff2e8;
            right: 20px;
            bottom: 10px;
            transform: rotate(11deg);
        }

        .auth-panel {
            background: #fffaf7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 30px;
        }

        .auth-card {
            width: min(100%, 440px);
        }

        .auth-heading {
            margin-bottom: 30px;
        }

        .auth-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.6px;
            margin-bottom: 8px;
        }

        .auth-title {
            margin: 0;
            font-size: 38px;
            line-height: 1;
            font-weight: 900;
            color: #1e2430;
            letter-spacing: -1.5px;
        }

        .auth-subtitle {
            margin-top: 10px;
            color: #818181;
            font-size: 13px;
            line-height: 1.6;
        }

        .auth-footer {
            margin-top: 22px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }

        .auth-footer a {
            color: #df3f59;
            font-weight: 800;
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .auth-page {
                grid-template-columns: 1fr;
            }

            .auth-visual {
                min-height: 330px;
            }

            .books-decoration {
                transform: scale(.75);
                transform-origin: bottom right;
            }
        }

        @media (max-width: 560px) {
            .auth-visual {
                padding: 30px 24px;
            }

            .auth-panel {
                padding: 40px 22px;
            }

            .books-decoration {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="auth-page">

        <section class="auth-visual">

            <div class="visual-brand">
                <div class="brand-mark">R</div>
                <div class="brand-name">RakBuku</div>
            </div>

            <div class="visual-copy">
                <div class="visual-tag">
                    Perpustakaan Digital
                </div>

                <h1 class="visual-title">
                    Satu tempat<br>
                    untuk semua buku.
                </h1>

                <p class="visual-text">
                    Kelola koleksi, kategori, dan stok buku dengan sistem
                    perpustakaan yang lebih sederhana dan nyaman digunakan.
                </p>
            </div>

            <div class="books-decoration">
                <div class="decor-book one"></div>
                <div class="decor-book two"></div>
                <div class="decor-book three"></div>
            </div>

        </section>

        <section class="auth-panel">

            <div class="auth-card">
                {{ $slot }}
            </div>

        </section>

    </div>

</body>
</html>