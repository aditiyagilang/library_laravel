@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit Data Pengembalian</h1>
    <p class="text-center">Silakan masukkan informasi berikut untuk mengedit data pengembalian.</p>

    <form action="{{ route('returns.update', $return->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Menambahkan method PUT untuk update -->

    <!-- Dropdown untuk memilih peminjaman -->
    <div class="mb-3">
        <label for="borrowing_id" class="form-label">Pilih Peminjaman</label>
        <select class="form-control @error('borrowing_id') is-invalid @enderror" id="borrowing_id" name="borrowing_id" required>
            <option value="">Pilih Peminjaman</option>
            @foreach($borrowings as $borrowing)
                <option value="{{ $borrowing->id }}" 
                        @if($borrowing->id == $return->borrowing_id) selected @endif>
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
        <input type="number" class="form-control @error('qty_returned') is-invalid @enderror" id="qty_returned" name="qty_returned" value="{{ old('qty_returned', $return->qty_returned) }}" required>
        @error('qty_returned')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Total Keterlambatan -->
    <div class="mb-3">
        <label for="total_late" class="form-label">Total Keterlambatan (hari)</label>
        <input type="number" class="form-control @error('total_late') is-invalid @enderror" id="total_late" name="total_late" value="{{ old('total_late', $return->total_late) }}" required readonly>
        @error('total_late')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Jumlah Kurang -->
    <div class="mb-3">
        <label for="qty_less" class="form-label">Jumlah Kurang</label>
        <input type="number" class="form-control @error('qty_less') is-invalid @enderror" id="qty_less" name="qty_less" value="{{ old('qty_less', $return->qty_less) }}" required readonly>
        @error('qty_less')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Perbarui Pengembalian</button>
    <a href="{{ route('returns.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</div>



@endsection