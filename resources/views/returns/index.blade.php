@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mb-4 text-center">Pengelolaan Pengembalian</h1>
<p class="text-center">Menyimpan dan mengelola informasi pengembalian, termasuk peminjaman, jumlah yang dikembalikan, keterlambatan, dan jumlah yang kurang.</p>

<div class="text-end mb-3">
    <a href="{{ route('returns.create') }}" class="btn btn-success mb-3">Tambah Pengembalian</a>
</div>


<div class="table-responsive">
<table class="table table-striped table-bordered">
    <thead class="table-light">
    <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nama Buku</th>
            <th>Total Keterlambatan</th>
            <th>Jumlah Kurang</th>
            <th>Jumlah Dikembalikan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($returns as $return)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <!-- Nama Siswa -->
            <td>{{ $return->borrowing->student->name }}</td>
            <!-- Nama Buku -->
            <td>{{ $return->borrowing->book->title }}</td>
            <td>{{ $return->total_late }}</td>
            <td>{{ $return->qty_less }}</td>
            <td>{{ $return->qty_returned }}</td>
            <td>
                <a href="{{ route('returns.edit', $return->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('returns.destroy', $return->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>


</div>
@endsection