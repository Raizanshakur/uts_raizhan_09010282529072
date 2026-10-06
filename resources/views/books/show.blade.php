<x-app-layout>

    <style>
        .detail-layout {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 55px;
            align-items: start;
        }

        .detail-cover {
            aspect-ratio: 3 / 4;
            border-radius: 18px;
            background: linear-gradient(145deg, #b94d5b, #7b2835);
            color: white;
            padding: 30px;
            display: flex;
            align-items: flex-end;
            font-size: 34px;
            line-height: 1.05;
            font-weight: 900;
            box-shadow: 0 18px 35px rgba(70, 38, 38, .15);
            overflow: hidden;
            position: relative;
        }

        .detail-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            inset: 0;
        }

        .detail-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .detail-title {
            margin: 0;
            font-size: clamp(40px, 5vw, 64px);
            line-height: .98;
            font-weight: 900;
            letter-spacing: -2px;
            color: #1e2430;
        }

        .detail-author {
            margin-top: 12px;
            font-size: 18px;
            color: #7c7c7c;
        }

        .detail-grid {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .detail-item {
            background: white;
            border: 1px solid #f0e2dc;
            border-radius: 12px;
            padding: 18px;
        }

        .detail-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-weight: 800;
            color: #999;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 15px;
            font-weight: 800;
            color: #262626;
        }

        .detail-actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .action-primary,
        .action-secondary,
        .action-danger {
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 800;
        }

        .action-primary {
            background: #df3f59;
            color: white;
        }

        .action-secondary {
            background: #1e2430;
            color: white;
        }

        .action-danger {
            background: #fff0f1;
            color: #b9364b;
            border: none;
            cursor: pointer;
        }

        @media (max-width: 850px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }

            .detail-cover {
                max-width: 320px;
            }
        }

        @media (max-width: 560px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="detail-layout">

        <div class="detail-cover">

            @if($book->cover)

                <img
                    src="{{ asset('storage/' . $book->cover) }}"
                    alt="{{ $book->title }}"
                >

            @else

                {{ $book->title }}

            @endif

        </div>

        <div>

            <div class="detail-kicker">
                {{ $book->category->name }}
            </div>

            <h1 class="detail-title">
                {{ $book->title }}
            </h1>

            <div class="detail-author">
                oleh {{ $book->author }}
            </div>

            <div class="detail-grid">

                <div class="detail-item">
                    <div class="detail-label">
                        Penerbit
                    </div>

                    <div class="detail-value">
                        {{ $book->publisher }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        Tahun Terbit
                    </div>

                    <div class="detail-value">
                        {{ $book->year }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        Kategori
                    </div>

                    <div class="detail-value">
                        {{ $book->category->name }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        Stok Tersedia
                    </div>

                    <div class="detail-value">
                        {{ $book->stock }} buku
                    </div>
                </div>

            </div>

            <div class="detail-actions">

                <a
                    href="{{ route('books.edit', $book->id) }}"
                    class="action-primary"
                >
                    Edit Buku
                </a>

                <a
                    href="{{ route('books.index') }}"
                    class="action-secondary"
                >
                    Kembali
                </a>

                <form
                    action="{{ route('books.destroy', $book->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="action-danger"
                    >
                        Hapus Buku
                    </button>
                </form>

            </div>

        </div>

    </div>

</x-app-layout>