@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah data Buku</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk menambah data buku</p>

    <form action="{{ route('book.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
    @csrf
    <!-- Judul Buku -->
    <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Deskripsi Buku -->
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Buku</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required></textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tahun Terbit -->
    <div class="mb-3">
        <label for="year" class="form-label">Tahun Terbit</label>
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" required>
        @error('year')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama Penulis -->
    <div class="mb-3">
        <label for="author" class="form-label">Nama Penulis</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required>
        @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama Penerbit -->
    <div class="mb-3">
        <label for="publisher" class="form-label">Nama Penerbit</label>
        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" required>
        @error('publisher')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Stok -->
    <div class="mb-3">
        <label for="stock" class="form-label">Stok Buku</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required>
        @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Simpan Buku</button>
    <a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</div>

<!-- Script Interaktif -->
<script>
    // Fungsi untuk memformat angka menjadi format mata uang
    function formatCurrency(value) {
        return value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Input untuk Harga Mobil
    document.getElementById('harga_mobil').addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9.]/g, '');
        e.target.value = formatCurrency(value);
    });

    // Menampilkan input tambahan jika mencuci karpet dipilih
    document.getElementById('cuci_karpet').addEventListener('change', function() {
        const karpetDetails = document.getElementById('karpet_details');
        const hargaKarpet = document.getElementById('harga_karpet');
        if (this.value === 'ya') {
            karpetDetails.style.display = 'block';
            hargaKarpet.style.display = 'block';
        } else {
            karpetDetails.style.display = 'none';
            hargaKarpet.style.display = 'none';
            document.getElementById('jumlah_karpet').value = 0;
            document.getElementById('harga_cuci_karpet').value = '';
        }
    });

    // Input untuk Harga Cuci Karpet
    document.getElementById('harga_cuci_karpet').addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9.]/g, '');
        e.target.value = formatCurrency(value);
    });
</script>
@endsection