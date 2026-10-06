<x-app-layout>

    <style>
        .category-hero {
            background: linear-gradient(135deg, #fff1ec, #ffffff);
            border: 1px solid #f2dfd8;
            border-radius: 18px;
            padding: 38px 40px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 30px;
            align-items: center;
            margin-bottom: 32px;
        }

        .category-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .category-title {
            margin: 0;
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1;
            font-weight: 900;
            letter-spacing: -2px;
            color: #1e2430;
        }

        .category-desc {
            margin-top: 12px;
            max-width: 620px;
            color: #7a7a7a;
            font-size: 14px;
            line-height: 1.7;
        }

        .category-count {
            background: #df3f59;
            color: white;
            min-width: 120px;
            min-height: 120px;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .category-count strong {
            font-size: 34px;
            line-height: 1;
        }

        .category-count span {
            margin-top: 6px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 13px;
        }

        .success {
            background: #eef8f0;
            border: 1px solid #cee8d4;
            color: #347347;
        }

        .error {
            background: #fff0f1;
            border: 1px solid #f1c8cf;
            color: #b9364b;
        }

        .category-layout {
            display: grid;
            grid-template-columns: .8fr 1.2fr;
            gap: 28px;
            align-items: start;
        }

        .category-form-card,
        .category-list-card {
            background: white;
            border: 1px solid #f0e2dc;
            border-radius: 16px;
        }

        .card-head {
            padding: 20px 22px;
            border-bottom: 1px solid #f1e6e1;
        }

        .card-title {
            font-size: 17px;
            font-weight: 900;
            color: #1e2430;
        }

        .card-subtitle {
            margin-top: 5px;
            font-size: 12px;
            color: #8a8a8a;
        }

        .category-form {
            padding: 22px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 800;
            color: #555;
        }

        .field input,
        .field textarea {
            width: 100%;
            border: 1px solid #ded6d2;
            background: #fffaf8;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
        }

        .field textarea {
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: #df3f59;
            box-shadow: 0 0 0 3px rgba(223, 63, 89, .08);
        }

        .error-text {
            margin-top: 6px;
            color: #bd3348;
            font-size: 11px;
        }

        .save-button {
            width: 100%;
            border: none;
            background: #df3f59;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
        }

        .save-button:hover {
            background: #c9344b;
        }

        .category-grid {
            padding: 18px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .category-item {
            border: 1px solid #f0e2dc;
            border-radius: 12px;
            padding: 16px;
            background: #fffaf8;
        }

        .category-name {
            font-size: 17px;
            font-weight: 900;
            color: #252525;
        }

        .category-description {
            margin-top: 7px;
            font-size: 12px;
            line-height: 1.6;
            color: #858585;
            min-height: 38px;
        }

        .category-footer {
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px solid #ece4e0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .book-count {
            font-size: 11px;
            color: #777;
        }

        .delete-button {
            border: none;
            background: #fff0f1;
            color: #b9364b;
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 800;
            cursor: pointer;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 42px 20px;
            color: #888;
        }

        @media (max-width: 900px) {
            .category-layout {
                grid-template-columns: 1fr;
            }

            .category-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .category-hero {
                grid-template-columns: 1fr;
            }

            .category-count {
                width: 110px;
                min-height: 100px;
            }
        }
    </style>

    <section class="category-hero">

        <div>
            <div class="category-kicker">
                Kategori Buku
            </div>

            <h1 class="category-title">
                Kelola kategori<br>
                koleksi kamu.
            </h1>

            <p class="category-desc">
                Tambahkan kategori baru untuk membantu pengelompokan buku
                agar koleksi lebih rapi dan lebih mudah ditemukan.
            </p>
        </div>

        <div class="category-count">
            <strong>{{ $categories->count() }}</strong>
            <span>Kategori</span>
        </div>

    </section>

    @if(session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="message error">
            {{ session('error') }}
        </div>
    @endif

    <div class="category-layout">

        <section class="category-form-card">

            <div class="card-head">
                <div class="card-title">
                    Tambah Kategori
                </div>

                <div class="card-subtitle">
                    Buat kategori baru untuk koleksi buku.
                </div>
            </div>

            <form
                action="{{ route('categories.store') }}"
                method="POST"
                class="category-form"
            >
                @csrf

                <div class="field">
                    <label>Nama Kategori</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Sejarah"
                    >

                    @error('name')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label>Deskripsi</label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Deskripsi singkat kategori"
                    >{{ old('description') }}</textarea>
                </div>

                <button
                    type="submit"
                    class="save-button"
                >
                    Simpan Kategori
                </button>

            </form>

        </section>

        <section class="category-list-card">

            <div class="card-head">
                <div class="card-title">
                    Daftar Kategori
                </div>

                <div class="card-subtitle">
                    Semua kategori yang tersedia saat ini.
                </div>
            </div>

            <div class="category-grid">

                @forelse($categories as $category)

                    <div class="category-item">

                        <div class="category-name">
                            {{ $category->name }}
                        </div>

                        <div class="category-description">
                            {{ $category->description ?? 'Tidak ada deskripsi.' }}
                        </div>

                        <div class="category-footer">

                            <div class="book-count">
                                {{ $category->books_count }} buku
                            </div>

                            <form
                                action="{{ route('categories.destroy', $category->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                >
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                @empty

                    <div class="empty-state">
                        Belum ada kategori.
                    </div>

                @endforelse

            </div>

        </section>

    </div>

</x-app-layout>