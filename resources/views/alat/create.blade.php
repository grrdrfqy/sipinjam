
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Alat</title>
</head>
<body>

    <h2>Tambah Data Alat</h2>

    <form action="{{ route('alat.store') }}" method="POST">
        @csrf

        <p>
            Kode Alat:
            <input type="text" name="kode" required>
        </p>

        <p>
            Nama Alat:
            <input type="text" name="nama" required>
        </p>

        <p>
            Stok:
            <input type="number" name="stok" required>
        </p>

        <p>
            Kondisi:
            <select name="kondisi" required>
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
            </select>
        </p>

        <button type="submit">Simpan</button>

    </form>

    <br>

    <a href="{{ route('alat.index') }}">Kembali</a>

</body>
</html>
