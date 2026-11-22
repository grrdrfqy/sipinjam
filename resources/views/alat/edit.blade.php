
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Alat</title>
</head>
<body>

    <h2>Sistem Peminjaman Alat</h2>

    <form method="POST" action="{{ route('alat.update', $alat) }}">
        @csrf
        @method('PUT')

        <p>
            Kode:
            <input type="text" name="kode"
                value="{{ old('kode', $alat->kode) }}">
        </p>

        <p>
            Nama:
            <input type="text" name="nama"
                value="{{ old('nama', $alat->nama) }}">
        </p>

        <p>
            Stok:
            <input type="number" name="stok"
                value="{{ old('stok', $alat->stok) }}">
        </p>

        <p>
            Kondisi:
            <select name="kondisi">
                <option value="baik"
                    {{ $alat->kondisi == 'baik' ? 'selected' : '' }}>
                    Baik
                </option>

                <option value="rusak"
                    {{ $alat->kondisi == 'rusak' ? 'selected' : '' }}>
                    Rusak
                </option>
            </select>
        </p>

        <button type="submit">Perbarui</button>
    </form>

    <br>
    <a href="{{ route('alat.index') }}">Kembali</a>

</body>
</html>
