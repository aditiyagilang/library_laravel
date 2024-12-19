@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mb-4 text-center">Pengelolaan Siswa</h1>
<p class="text-center">Menyimpan dan mengelola informasi siswa, termasuk nama, alamat, nomor telepon, kelas, dan kode siswa.</p>
<div class="text-end mb-3">
    <!-- Tombol untuk menambah siswa -->
    <a href="{{ route('student.create') }}" class="btn btn-success">Tambah Siswa</a>
    
    <!-- Tombol untuk mendownload laporan peminjaman -->
 

    <!-- Tombol untuk mendownload laporan data siswa -->
    <a href="{{ route('report.student.download') }}" class="btn btn-primary">Download Laporan Siswa</a>
</div>


<div class="table-responsive">
<table class="table table-striped table-bordered">
    <thead class="table-light">
        <tr>
            <th>Nama Siswa</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Kelas</th>
            <th>Kode Siswa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->class }}</td>
            <td>{{ $student->student_code }}</td>
            <td>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada data siswa.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>


</div>
@endsection