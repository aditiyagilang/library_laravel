@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Data Siswa</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk menambah data siswa.</p>

    <form action="{{ route('student.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
    @csrf
    <!-- Nama Siswa -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Alamat -->
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required></textarea>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nomor Telepon -->
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Kelas -->
    <div class="mb-3">
        <label for="class" class="form-label">Kelas</label>
        <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" required>
        @error('class')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Kode Siswa -->
    <div class="mb-3">
        <label for="student_code" class="form-label">Kode Siswa</label>
        <input type="text" class="form-control @error('student_code') is-invalid @enderror" id="student_code" name="student_code" required>
        @error('student_code')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Simpan Siswa</button>
    <a href="{{ route('student.index') }}" class="btn btn-secondary">Kembali</a>
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