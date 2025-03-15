<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="judul_buku">Judul Buku:</label>
    <input type="text" name="judul_buku" id="judul_buku" required>
    <br>
    <label for="pengarang">Pengarang:</label>
    <input type="text" name="pengarang" id="pengarang" required>
    <br>
    <label for="jenis_buku">Jenis Buku:</label>
    <input type="text" name="jenis_buku" id="jenis_buku" required>
    <br>
    <label for="tahun_terbit">Tahun Terbit:</label>
    <input type="number" name="tahun_terbit" id="tahun_terbit" required>
    <br>
    <label for="sampul">Sampul:</label>
    <input type="file" name="sampul" id="sampul">
    <br>
    <button type="submit">Simpan</button>
</form>