<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center">Edit Buku</h1>

        <!-- Notifikasi error -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Buku -->
        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <!-- Judul Buku -->
            <div class="mb-4">
                <label class="block font-semibold">Judul Buku:</label>
                <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" class="w-full p-2 border rounded text-gray-900">
            </div>

            <!-- Pengarang -->
            <div class="mb-4">
                <label class="block font-semibold">Pengarang:</label>
                <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" class="w-full p-2 border rounded text-gray-900">
            </div>

            <!-- Jenis Buku -->
            <div class="mb-4">
                <label class="block font-semibold">Jenis Buku:</label>
                <input type="text" name="jenis_buku" value="{{ old('jenis_buku', $buku->jenis_buku) }}" class="w-full p-2 border rounded text-gray-900">
            </div>

            <!-- Tahun Terbit -->
            <div class="mb-4">
                <label class="block font-semibold">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" class="w-full p-2 border rounded text-gray-900">
            </div>

            <!-- Sampul -->
            <div class="mb-4">
                <label class="block font-semibold">Sampul:</label>
                @if ($buku->sampul)
                    <img src="{{ asset('storage/sampul/' . $buku->sampul) }}" class="w-32 h-40 rounded-md mb-2">
                @endif
                <input type="file" name="sampul" class="w-full p-2 border rounded text-gray-900 bg-white">
            </div>

            <!-- Tombol Submit -->
            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                    Update Buku
                </button>
                <a href="{{ route('buku.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>
    