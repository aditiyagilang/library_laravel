@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Data Pengembalian</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk menambah data pengembalian.</p>

    <form action="{{ route('returns.store') }}" method="POST">
    @csrf

    <!-- Dropdown untuk memilih peminjaman -->
    <div class="mb-3">
        <label for="borrowing_id" class="form-label">Pilih Peminjaman</label>
        <select class="form-control @error('borrowing_id') is-invalid @enderror" id="borrowing_id" name="borrowing_id" required>
            <option value="">Pilih Peminjaman</option>
            @foreach($borrowings as $borrowing)
                <option value="{{ $borrowing->id }}" 
                        @if(old('borrowing_id') == $borrowing->id) selected @endif>
                    {{ $borrowing->student->name }} - {{ $borrowing->book->title }}
                </option>
            @endforeach
        </select>
        @error('borrowing_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    <!-- Jumlah Dikembalikan -->
    <div class="mb-3">
        <label for="qty_returned" class="form-label">Jumlah Dikembalikan</label>
        <input type="number" class="form-control @error('qty_returned') is-invalid @enderror" id="qty_returned" name="qty_returned" value="{{ old('qty_returned') }}" required>
        @error('qty_returned')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Simpan Pengembalian</button>
    <a href="{{ route('returns.index') }}" class="btn btn-secondary">Kembali</a>
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