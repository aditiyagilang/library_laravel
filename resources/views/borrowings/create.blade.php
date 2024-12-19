@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Data Peminjaman</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk menambah data peminjaman.</p>

    <form method="POST" action="{{ route('borrowings.store') }}">
    @csrf
    <div class="mb-3">
        <label for="student_id" class="form-label">Nama Siswa</label>
        <select class="form-control" id="student_id" name="student_id" required>
            <option value="">Pilih Siswa</option>
            @foreach($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="book_id" class="form-label">Judul Buku</label>
        <select class="form-control" id="book_id" name="book_id" required>
            <option value="">Pilih Buku</option>
            @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
        <input type="date" class="form-control" id="borrow_date" name="borrow_date" required>
    </div>
    <div class="mb-3">
        <label for="return_date" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="return_date" name="return_date" required>
    </div>
    <div class="mb-3">
        <label for="qty" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="qty" name="qty" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Kembali</a>
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