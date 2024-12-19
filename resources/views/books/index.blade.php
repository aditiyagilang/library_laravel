@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mb-4 text-center">Pengelolaan Buku</h1>
<p class="text-center">Menyimpan dan mengelola informasi buku, termasuk judul, pengarang, harga, dan kategori buku.</p>

    <div class="text-end mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-success">Tambah Buku</a>
    </div>

    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Judul Buku</th>
                <th>Deskripsi</th>
                <th>Tahun Terbit</th>
                <th>Nama Penulis</th>
                <th>Nama Penerbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data buku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
@endsection