@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mb-4 text-center">Pengelolaan Siswa</h1>
<p class="text-center">Menyimpan dan mengelola informasi siswa, termasuk nama, alamat, nomor telepon, kelas, dan kode siswa.</p>

<div class="text-end mb-3">
    <a href="{{ route('borrowings.create') }}" class="btn btn-success">Tambah Peminjaman</a>
    <a href="{{ route('report.borrowing.download') }}" class="btn btn-primary">Download Laporan Peminjaman</a>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered">
    <thead class="table-light">
    <tr>
            <th>Nama Siswa</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowings as $borrowing)
        <tr>
            <td>{{ $borrowing->student->name }}</td>
            <td>{{ $borrowing->book->title }}</td>
            <td>{{ $borrowing->borrow_date }}</td>
            <td>{{ $borrowing->return_date }}</td>
            <td>{{ $borrowing->qty }}</td>
            <td>
                <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>


</div>
@endsection