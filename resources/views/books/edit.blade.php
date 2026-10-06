<x-app-layout>

    <style>
        .edit-layout {
            display: grid;
            grid-template-columns: .75fr 1.25fr;
            gap: 55px;
            align-items: start;
        }

        .edit-side {
            position: sticky;
            top: 110px;
        }

        .cover-preview {
            width: 230px;
            aspect-ratio: 3 / 4;
            border-radius: 14px;
            overflow: hidden;
            background: linear-gradient(145deg, #b94d5b, #7b2835);
            margin-bottom: 22px;
            box-shadow: 0 16px 30px rgba(0,0,0,.12);
        }

        .cover-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .placeholder-cover {
            height: 100%;
            padding: 20px;
            display: flex;
            align-items: flex-end;
            color: white;
            font-size: 22px;
            font-weight: 900;
        }

        .edit-kicker {
            color: #df3f59;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .edit-title {
            margin: 0;
            font-size: 46px;
            line-height: .98;
            font-weight: 900;
            color: #1e2430;
            letter-spacing: -2px;
        }

        .edit-form {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0e2dc;
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
            box-shadow: 0 0 0 3px rgba(223,63,89,.08);
        }

        .upload-box {
            border: 1px dashed #d8c8c2;
            background: #fff8f4;
            border-radius: 12px;
            padding: 17px;
        }

        .upload-note {
            color: #999;
            font-size: 11px;
            margin: 5px 0 12px;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .error-text {
            margin-top: 6px;
            color: #bd3348;
            font-size: 11px;
        }

        .form-actions {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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
            .edit-layout {
                grid-template-columns: 1fr;
            }

            .edit-side {
                position: static;
            }
        }

        @media (max-width: 550px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="edit-layout">

        <section class="edit-side">

            <div class="cover-preview">

                @if($book->cover)
                    <img
                        src="{{ asset('storage/' . $book->cover) }}"
                        alt="{{ $book->title }}"
                    >
                @else
                    <div class="placeholder-cover">
                        {{ $book->title }}
                    </div>
                @endif

            </div>

            <div class="edit-kicker">
                Edit Buku
            </div>

            <h1 class="edit-title">
                Perbarui<br>
                koleksi.
            </h1>

        </section>

        <section>

            <form
                action="{{ route('books.update', $book->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="edit-form"
            >
                @csrf
                @method('PUT')

                <div class="field upload-box">
                    <label>Ganti Cover</label>

                    <div class="upload-note">
                        Kosongkan jika tidak ingin mengganti cover.
                    </div>

                    <input
                        type="file"
                        name="cover"
                        accept=".jpg,.jpeg,.png,.webp,image/*"
                    >

                    @error('cover')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label>Judul Buku</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $book->title) }}"
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
                        value="{{ old('author', $book->author) }}"
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
                        value="{{ old('publisher', $book->publisher) }}"
                    >
                </div>

                <div class="field-row">

                    <div class="field">
                        <label>Tahun Terbit</label>

                        <input
                            type="number"
                            name="year"
                            value="{{ old('year', $book->year) }}"
                        >
                    </div>

                    <div class="field">
                        <label>Stok</label>

                        <input
                            type="number"
                            name="stock"
                            value="{{ old('stock', $book->stock) }}"
                        >
                    </div>

                </div>

                <div class="field">
                    <label>Kategori</label>

                    <select name="category_id">

                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('books.show', $book->id) }}"
                        class="back-button"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </section>

    </div>

</x-app-layout>