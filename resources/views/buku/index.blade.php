<h1>Daftar Buku</h1>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<a href="{{ route('buku.create') }}">Tambah Buku</a>
<table border="1">
    
    <thead>
        <tr>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Jenis Buku</th>
            <th>Tahun Terbit</th>
            <th>Sampul</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $buku)
            <tr>
                <td>{{ $buku->id_buku }}</td>
                <td>{{ $buku->judul_buku }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->jenis_buku }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>
                    @if ($buku->sampul)
                        <img src="{{ asset('storage/' . $buku->sampul) }}" width="100">
                    @else
                        Tidak ada sampul
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>