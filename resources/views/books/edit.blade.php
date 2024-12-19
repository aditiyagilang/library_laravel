@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Data Buku</h1>

    <form method="POST" action="{{ route('book.update', $book->id) }}">
    @csrf
    @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT -->

    <!-- Judul Buku -->
    <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Deskripsi Buku -->
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Buku</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tahun Terbit -->
    <div class="mb-3">
        <label for="year" class="form-label">Tahun Terbit</label>
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $book->year) }}" required>
        @error('year')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama Penulis -->
    <div class="mb-3">
        <label for="author" class="form-label">Nama Penulis</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $book->author) }}" required>
        @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama Penerbit -->
    <div class="mb-3">
        <label for="publisher" class="form-label">Nama Penerbit</label>
        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
        @error('publisher')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Stok Buku -->
    <div class="mb-3">
        <label for="stock" class="form-label">Stok Buku</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" required>
        @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Update Buku</button>
    <a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection