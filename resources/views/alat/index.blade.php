
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Peminjaman Alat</title>
</head>
<body>

    <h2>Sistem Peminjaman Alat</h2>

    <a href="{{ route('alat.create') }}">+ Tambah Alat</a>

    <p>Alat berhasil ditampilkan.</p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($alat as $a)
                <tr>
                    <td>{{ $a->kode }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->stok }}</td>
                    <td>{{ $a->kondisi }}</td>
<td>
    <a href="{{ route('alat.edit', $a) }}">
        Ubah
    </a>

    <form method="POST"
          action="{{ route('alat.destroy', $a) }}"
          style="display:inline"
          onsubmit="return confirm('Hapus alat ini?')">

        @csrf
        @method('DELETE')

        <button type="submit">Hapus</button>
    </form>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data alat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $alat->links() }}

</body>
</html>
