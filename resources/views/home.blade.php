<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
@if (!session()->has('users_id'))
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Selamat Datang Di Web, Eka Dharma Satria</h2>
                        <p class="mb-4">SI503, Pemrograman Berbasis Web</p>
                        <p><strong>Email:</strong> ekadhrm212@gmail.com</p>
                        <p><strong>Nomor HP:</strong> ‪+62 878‑6676‑9601</p>
                        <p>Berikut adalah pintasan ke fitur utama aplikasi perpustakaan:</p>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('students.index') }}" class="btn btn-primary">Siswa</a></li>
                            <li><a href="{{ route('books.index') }}" class="btn btn-success">Buku</a></li>
                            <li><a href="{{ route('borrowings.index') }}" class="btn btn-warning">Peminjaman</a></li>
                            <li><a href="{{ route('returns.index') }}" class="btn btn-info">Pengembalian</a></li>
                        </ul>
                    </div>
                </div>

                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-5" style="margin-bottom:20%;">
                            <!-- Foto default user -->
                            <img
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png"
                                height="200"
                                alt="Foto Pengguna"
                                class="rounded-circle"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
    <!-- Menampilkan Jumlah Siswa -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Jumlah Siswa</h5>
            </div>
            <div class="card-body pb-4">
                <p class="fs-3 fw-bold">Total Siswa:<span class="fs-3">{{ $jumlahSiswa }}</span></p>
            </div>
        </div>
    </div>

    <!-- Menampilkan Jumlah Buku -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5>Jumlah Buku</h5>
            </div>
            <div class="card-body pb-4">
                <p class="fs-3 fw-bold">Total Buku: <span class="fs-3">{{ $jumlahBuku }}</span></p>
            </div>

        </div>
    </div>

    <!-- Tombol untuk Download Laporan -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h5>Laporan</h5>
            </div>
            <div class="card-body text-center">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('report.student.download') }}" class="btn btn-primary me-2">Download Laporan Siswa</a>
                    <a href="{{ route('report.borrowing.download') }}" class="btn btn-secondary">Download Laporan Peminjaman</a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="mt-4">
    <h4>Informasi Kontak</h4>
    <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di:</p>
    <p>Email: <a href="mailto:ekadhrm212@gmail.com">ekadhrm212@gmail.com</a></p>
    <p>Telepon: <strong>‪+62 878‑6676‑9601</strong></p>
</div>

</div>
@endsection
