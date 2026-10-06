<x-app-layout>

    <style>
        .hero {
            background:
                linear-gradient(
                    90deg,
                    rgba(255,255,255,.98) 0%,
                    rgba(255,255,255,.95) 52%,
                    rgba(255,240,236,.72) 100%
                );
            min-height: 390px;
            border-radius: 20px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            box-shadow: 0 10px 40px rgba(81, 43, 43, .08);
        }

        .hero-content {
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-tag {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #df3f59;
            margin-bottom: 16px;
        }

        .hero-title {
            margin: 0;
            font-size: clamp(42px, 5vw, 70px);
            line-height: .98;
            color: #1d2330;
            letter-spacing: -2.5px;
            font-weight: 900;
        }

        .hero-title span {
            color: #df3f59;
        }

        .hero-text {
            margin: 20px 0 28px;
            max-width: 520px;
            font-size: 15px;
            line-height: 1.8;
            color: #737373;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 12px;
            font-weight: 800;
        }

        .btn-primary {
            background: #df3f59;
            color: white;
        }

        .btn-primary:hover {
            background: #c9334b;
        }

        .btn-secondary {
            background: white;
            border: 1px solid #dedede;
            color: #333;
        }

        .hero-visual {
            position: relative;
            min-height: 390px;
            background:
                radial-gradient(circle at 40% 30%, #ffe5dd, transparent 35%),
                linear-gradient(135deg, #f5ddd3, #fff8f4);
        }

        .book-stack {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book {
            width: 150px;
            height: 220px;
            border-radius: 8px;
            position: absolute;
            box-shadow: 0 22px 40px rgba(0,0,0,.18);
            padding: 20px;
            color: white;
            font-weight: 900;
            display: flex;
            align-items: flex-end;
            line-height: 1.1;
        }

        .book.one {
            background: #c9424f;
            transform: translateX(-85px) rotate(-8deg);
        }

        .book.two {
            background: #243c55;
            transform: translateY(-15px);
            z-index: 2;
        }

        .book.three {
            background: #e19d3f;
            transform: translateX(85px) rotate(8deg);
        }

        .stats {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.05);
            overflow: hidden;
        }

        .stat {
            padding: 24px 26px;
            border-right: 1px solid #f0e4df;
        }

        .stat:last-child {
            border-right: 0;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 900;
            color: #1e2430;
        }

        .stat-label {
            margin-top: 5px;
            font-size: 12px;
            color: #8a8a8a;
        }

        .section {
            margin-top: 52px;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .section-small {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            margin-bottom: 5px;
        }

        .section-title {
            font-size: 26px;
            font-weight: 900;
            margin: 0;
            color: #1f2531;
        }

        .view-all {
            font-size: 12px;
            font-weight: 800;
            color: #df3f59;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .book-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #f1e7e3;
            transition: .2s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 28px rgba(0,0,0,.08);
        }

        .cover {
            aspect-ratio: 3 / 4;
            padding: 20px;
            display: flex;
            align-items: flex-end;
            color: white;
            font-size: 20px;
            line-height: 1.05;
            font-weight: 900;
            position: relative;
            overflow: hidden;
        }

        .cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            inset: 0;
        }

        .book-card:nth-child(5n + 1) .cover {
            background: #b84855;
        }

        .book-card:nth-child(5n + 2) .cover {
            background: #243d57;
        }

        .book-card:nth-child(5n + 3) .cover {
            background: #a47446;
        }

        .book-card:nth-child(5n + 4) .cover {
            background: #3f6553;
        }

        .book-card:nth-child(5n + 5) .cover {
            background: #76536e;
        }

        .book-info {
            padding: 15px;
        }

        .book-category {
            font-size: 10px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 1px;
            color: #df3f59;
        }

        .book-name {
            font-size: 15px;
            font-weight: 900;
            color: #272727;
            margin: 7px 0 4px;
            min-height: 36px;
        }

        .book-author {
            font-size: 12px;
            color: #888;
            min-height: 30px;
        }

        .book-footer {
            margin-top: 13px;
            padding-top: 12px;
            border-top: 1px solid #f0eeee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .book-stock {
            font-size: 11px;
            color: #777;
        }

        .detail-link {
            background: #df3f59;
            color: white;
            font-size: 10px;
            font-weight: 800;
            padding: 7px 10px;
            border-radius: 6px;
        }

        .category-banner {
            margin-top: 52px;
            background: #172033;
            color: white;
            border-radius: 18px;
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            overflow: hidden;
        }

        .banner-content {
            padding: 38px 42px;
        }

        .banner-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #f3a8b3;
            font-weight: 800;
        }

        .banner-title {
            font-size: 34px;
            font-weight: 900;
            margin: 8px 0 12px;
        }

        .banner-text {
            color: #bfc8d5;
            font-size: 14px;
            line-height: 1.7;
            max-width: 560px;
        }

        .banner-action {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #df3f59;
        }

        .banner-action a {
            color: white;
            font-weight: 900;
            font-size: 13px;
            border: 1px solid rgba(255,255,255,.6);
            padding: 13px 18px;
            border-radius: 7px;
        }

        @media (max-width: 1000px) {
            .books-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 800px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                min-height: 300px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .stat {
                border-right: none;
                border-bottom: 1px solid #f0e4df;
            }

            .category-banner {
                grid-template-columns: 1fr;
            }

            .banner-action {
                padding: 25px;
            }
        }

        @media (max-width: 650px) {
            .hero-content {
                padding: 40px 25px;
            }

            .books-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

    <section class="hero">

        <div class="hero-content">

            <div class="hero-tag">
                Perpustakaan Digital
            </div>

            <h1 class="hero-title">
                Temukan cerita<br>
                <span>favoritmu.</span>
            </h1>

            <p class="hero-text">
                Jelajahi koleksi buku perpustakaan, cari berdasarkan judul
                atau penulis, dan kelola data buku dengan lebih mudah.
            </p>

            <div class="hero-actions">

                <a href="{{ route('books.index') }}" class="btn-primary">
                    Lihat Koleksi
                </a>

                <a href="{{ route('books.create') }}" class="btn-secondary">
                    Tambah Buku
                </a>

            </div>

        </div>

        <div class="hero-visual">

            <div class="book-stack">
                <div class="book one">
                    Stories<br>Collection
                </div>

                <div class="book two">
                    Digital<br>Library
                </div>

                <div class="book three">
                    Read<br>More
                </div>
            </div>

        </div>

    </section>

    <section class="stats">

        <div class="stat">
            <div class="stat-number">
                {{ $totalBooks }}
            </div>

            <div class="stat-label">
                Judul buku tersedia
            </div>
        </div>

        <div class="stat">
            <div class="stat-number">
                {{ $totalCategories }}
            </div>

            <div class="stat-label">
                Kategori koleksi
            </div>
        </div>

        <div class="stat">
            <div class="stat-number">
                {{ $totalStock }}
            </div>

            <div class="stat-label">
                Total stok buku
            </div>
        </div>

    </section>

    <section class="section">

        <div class="section-head">

            <div>
                <div class="section-small">
                    Pilihan Terbaru
                </div>

                <h2 class="section-title">
                    Buku terbaru
                </h2>
            </div>

            <a href="{{ route('books.index') }}" class="view-all">
                Lihat semua →
            </a>

        </div>

        <div class="books-grid">

            @forelse($latestBooks as $book)

                <div class="book-card">

                    <div class="cover">

                        @if($book->cover)

                            <img
                                src="{{ asset('storage/' . $book->cover) }}"
                                alt="{{ $book->title }}"
                            >

                        @else

                            {{ $book->title }}

                        @endif

                    </div>

                    <div class="book-info">

                        <div class="book-category">
                            {{ $book->category->name }}
                        </div>

                        <div class="book-name">
                            {{ $book->title }}
                        </div>

                        <div class="book-author">
                            {{ $book->author }}
                        </div>

                        <div class="book-footer">

                            <div class="book-stock">
                                Stok {{ $book->stock }}
                            </div>

                            <a
                                href="{{ route('books.show', $book->id) }}"
                                class="detail-link"
                            >
                                Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <p>Belum ada buku.</p>

            @endforelse

        </div>

    </section>

    <section class="category-banner">

        <div class="banner-content">

            <div class="banner-label">
                Eksplorasi Koleksi
            </div>

            <div class="banner-title">
                Temukan buku berdasarkan kategori.
            </div>

            <div class="banner-text">
                Mulai dari teknologi, novel, hingga buku pendidikan.
                Gunakan kategori untuk menemukan koleksi yang kamu cari.
            </div>

        </div>

        <div class="banner-action">

            <a href="{{ route('categories.index') }}">
                Lihat Kategori
            </a>

        </div>

    </section>

</x-app-layout>