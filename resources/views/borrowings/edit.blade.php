@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Data Peminjaman</h1>

    <form method="POST" action="{{ route('borrowings.update', $borrowing->id) }}">
    @csrf
    @method('PUT') <!-- Menyatakan bahwa ini adalah request PUT untuk update -->
    
    <div class="mb-3">
        <label for="student_id" class="form-label">Nama Siswa</label>
        <select class="form-control" id="student_id" name="student_id" required>
            <option value="">Pilih Siswa</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $student->id == $borrowing->student_id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="book_id" class="form-label">Judul Buku</label>
        <select class="form-control" id="book_id" name="book_id" required>
            <option value="">Pilih Buku</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $book->id == $borrowing->book_id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
        <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', $borrowing->borrow_date) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="return_date" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="return_date" name="return_date" value="{{ old('return_date', $borrowing->return_date) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="qty" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty', $borrowing->qty) }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Kembali</a>
</form>


</div>
@endsection