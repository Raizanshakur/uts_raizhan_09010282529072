<x-app-layout>

    <style>
        .create-layout {
            display: grid;
            grid-template-columns: .78fr 1.22fr;
            gap: 55px;
            align-items: start;
        }

        .create-intro {
            position: sticky;
            top: 110px;
        }

        .create-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .create-title {
            margin: 0;
            font-size: clamp(42px, 5vw, 64px);
            line-height: .98;
            font-weight: 900;
            color: #1e2430;
            letter-spacing: -2px;
        }

        .create-text {
            margin-top: 18px;
            max-width: 360px;
            font-size: 14px;
            line-height: 1.7;
            color: #777;
        }

        .form-card {
            background: white;
            border: 1px solid #f0e2dc;
            border-radius: 16px;
            padding: 28px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 11px;
            font-weight: 800;
            color: #555;
        }

        .field input,
        .field select {
            width: 100%;
            border: 1px solid #ded6d2;
            background: #fffaf8;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: #df3f59;
            box-shadow: 0 0 0 3px rgba(223, 63, 89, .08);
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .upload-box {
            border: 1px dashed #d8c8c2;
            background: #fff8f4;
            border-radius: 12px;
            padding: 18px;
        }

        .upload-title {
            font-size: 13px;
            font-weight: 800;
            color: #333;
        }

        .upload-note {
            margin: 5px 0 12px;
            font-size: 11px;
            color: #999;
        }

        .upload-box input {
            background: white;
        }

        .error-text {
            margin-top: 6px;
            color: #bd3348;
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 26px;
        }

        .save-button,
        .back-button {
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 800;
        }

        .save-button {
            border: none;
            background: #df3f59;
            color: white;
            cursor: pointer;
        }

        .back-button {
            background: #eef0f3;
            color: #343840;
        }

        @media (max-width: 850px) {
            .create-layout {
                grid-template-columns: 1fr;
            }

            .create-intro {
                position: static;
            }
        }

        @media (max-width: 550px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="create-layout">

        <section class="create-intro">
            <div class="create-kicker">
                Tambah Koleksi
            </div>

            <h1 class="create-title">
                Tambahkan<br>
                buku baru.
            </h1>

            <p class="create-text">
                Masukkan informasi buku dan tambahkan cover agar koleksi
                terlihat lebih menarik di halaman RakBuku.
            </p>
        </section>

        <section>

            <form
                action="{{ route('books.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="form-card"
            >
                @csrf

                <div class="field upload-box">
                    <div class="upload-title">
                        Cover Buku
                    </div>

                    <div class="upload-note">
                        JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                    </div>

                    <input
                        type="file"
                        name="cover"
                        accept=".jpg,.jpeg,.png,.webp,image/*"
                    >

                    @error('cover')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label>Judul Buku</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Masukkan judul buku"
                    >

                    @error('title')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label>Penulis</label>

                    <input
                        type="text"
                        name="author"
                        value="{{ old('author') }}"
                        placeholder="Nama penulis"
                    >

                    @error('author')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label>Penerbit</label>

                    <input
                        type="text"
                        name="publisher"
                        value="{{ old('publisher') }}"
                        placeholder="Nama penerbit"
                    >

                    @error('publisher')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field-row">

                    <div class="field">
                        <label>Tahun Terbit</label>

                        <input
                            type="number"
                            name="year"
                            value="{{ old('year') }}"
                            placeholder="2026"
                        >

                        @error('year')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Stok</label>

                        <input
                            type="number"
                            name="stock"
                            value="{{ old('stock') }}"
                            placeholder="10"
                        >

                        @error('stock')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="field">
                    <label>Kategori</label>

                    <select name="category_id">
                        <option value="">Pilih kategori</option>

                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('books.index') }}"
                        class="back-button"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        Simpan Buku
                    </button>

                </div>

            </form>

        </section>

    </div>

</x-app-layout>