<x-app-layout>

    <style>
        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .page-title {
            margin: 0;
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1;
            font-weight: 900;
            color: #1e2430;
            letter-spacing: -2px;
        }

        .page-subtitle {
            margin-top: 10px;
            color: #7f7f7f;
            font-size: 14px;
        }

        .add-button {
            background: #df3f59;
            color: white;
            padding: 12px 17px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 800;
        }

        .filter-box {
            background: white;
            padding: 18px;
            border-radius: 14px;
            border: 1px solid #f0e2dc;
            display: grid;
            grid-template-columns: 1fr 230px auto;
            gap: 12px;
            margin-bottom: 30px;
        }

        .search-input,
        .category-select {
            width: 100%;
            border: 1px solid #e2d9d5;
            background: #fffaf8;
            border-radius: 8px;
            padding: 12px 13px;
            outline: none;
            font-size: 13px;
        }

        .search-input:focus,
        .category-select:focus {
            border-color: #df3f59;
            box-shadow: 0 0 0 3px rgba(223, 63, 89, .08);
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .search-button,
        .reset-button {
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 11px;
            font-weight: 800;
            border: none;
            cursor: pointer;
        }

        .search-button {
            background: #1e2430;
            color: white;
        }

        .reset-button {
            background: #f1ece9;
            color: #4c4c4c;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .book-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #f0e2dc;
            transition: .22s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 35px rgba(70, 38, 38, .09);
        }

        .book-cover {
            aspect-ratio: 3 / 4;
            padding: 22px;
            display: flex;
            align-items: flex-end;
            color: white;
            font-weight: 900;
            font-size: 23px;
            line-height: 1.05;
            position: relative;
            overflow: hidden;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            inset: 0;
        }

        .book-card:nth-child(6n + 1) .book-cover {
            background: linear-gradient(145deg, #b94d5b, #7b2835);
        }

        .book-card:nth-child(6n + 2) .book-cover {
            background: linear-gradient(145deg, #314e6b, #162637);
        }

        .book-card:nth-child(6n + 3) .book-cover {
            background: linear-gradient(145deg, #b17a48, #654122);
        }

        .book-card:nth-child(6n + 4) .book-cover {
            background: linear-gradient(145deg, #46715d, #203d31);
        }

        .book-card:nth-child(6n + 5) .book-cover {
            background: linear-gradient(145deg, #765a78, #3e2e40);
        }

        .book-card:nth-child(6n + 6) .book-cover {
            background: linear-gradient(145deg, #d1844d, #8d4f26);
        }

        .book-content {
            padding: 16px;
        }

        .book-category {
            color: #df3f59;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 800;
        }

        .book-title {
            margin: 7px 0 4px;
            font-size: 17px;
            font-weight: 900;
            color: #242424;
            min-height: 42px;
        }

        .book-author {
            font-size: 12px;
            color: #888;
            margin-bottom: 12px;
        }

        .book-meta {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid #f1eeee;
            color: #777;
            font-size: 11px;
        }

        .book-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7px;
            margin-top: 13px;
        }

        .detail-button,
        .edit-button,
        .delete-button {
            text-align: center;
            border-radius: 7px;
            padding: 9px 8px;
            font-size: 10px;
            font-weight: 800;
            border: none;
            cursor: pointer;
        }

        .detail-button {
            background: #df3f59;
            color: white;
        }

        .edit-button {
            background: #1e2430;
            color: white;
        }

        .delete-form {
            grid-column: 1 / -1;
        }

        .delete-button {
            width: 100%;
            background: #fff0f1;
            color: #ba3247;
        }

        .success-message {
            background: #eef8f0;
            color: #347347;
            border: 1px solid #cee8d4;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .empty-state {
            grid-column: 1 / -1;
            background: white;
            border: 1px dashed #dbcfc9;
            border-radius: 14px;
            padding: 50px 20px;
            text-align: center;
            color: #888;
        }

        @media (max-width: 1000px) {
            .book-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 800px) {
            .filter-box {
                grid-template-columns: 1fr;
            }

            .book-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 520px) {
            .page-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .book-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="page-head">

        <div>
            <div class="page-kicker">
                Koleksi Perpustakaan
            </div>

            <h1 class="page-title">
                Temukan buku<br>yang kamu cari.
            </h1>

            <div class="page-subtitle">
                {{ $books->count() }} buku ditemukan
            </div>
        </div>

        <a href="{{ route('books.create') }}" class="add-button">
            + Tambah Buku
        </a>

    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('books.index') }}" class="filter-box">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul atau penulis..."
            class="search-input"
        >

        <select name="category_id" class="category-select">
            <option value="">Semua Kategori</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <div class="filter-actions">

            <button type="submit" class="search-button">
                Cari
            </button>

            <a href="{{ route('books.index') }}" class="reset-button">
                Reset
            </a>

        </div>

    </form>

    <div class="book-grid">

        @forelse($books as $book)

            <article class="book-card">

                <div class="book-cover">

                    @if($book->cover)

                        <img
                            src="{{ asset('storage/' . $book->cover) }}"
                            alt="{{ $book->title }}"
                        >

                    @else

                        {{ $book->title }}

                    @endif

                </div>

                <div class="book-content">

                    <div class="book-category">
                        {{ $book->category->name }}
                    </div>

                    <div class="book-title">
                        {{ $book->title }}
                    </div>

                    <div class="book-author">
                        {{ $book->author }}
                    </div>

                    <div class="book-meta">
                        <span>{{ $book->publisher }}</span>
                        <span>{{ $book->year }}</span>
                    </div>

                    <div class="book-meta">
                        <span>Stok</span>
                        <strong>{{ $book->stock }}</strong>
                    </div>

                    <div class="book-actions">

                        <a
                            href="{{ route('books.show', $book->id) }}"
                            class="detail-button"
                        >
                            Detail
                        </a>

                        <a
                            href="{{ route('books.edit', $book->id) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            class="delete-form"
                            action="{{ route('books.destroy', $book->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                Hapus Buku
                            </button>
                        </form>

                    </div>

                </div>

            </article>

        @empty

            <div class="empty-state">
                Buku tidak ditemukan.
            </div>

        @endforelse

    </div>

</x-app-layout>