@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Data Siswa</h1>

    <form method="POST" action="{{ route('student.update', $student->id) }}">
    @csrf
    @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT -->

    <!-- Nama Siswa -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Alamat -->
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $student->address) }}</textarea>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nomor Telepon -->
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Kelas -->
    <div class="mb-3">
        <label for="class" class="form-label">Kelas</label>
        <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" value="{{ old('class', $student->class) }}" required>
        @error('class')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Kode Siswa -->
    <div class="mb-3">
        <label for="student_code" class="form-label">Kode Siswa</label>
        <input type="text" class="form-control @error('student_code') is-invalid @enderror" id="student_code" name="student_code" value="{{ old('student_code', $student->student_code) }}" required>
        @error('student_code')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Update Siswa</button>
    <a href="{{ route('student.index') }}" class="btn btn-secondary">Kembali</a>
</form>


</div>
@endsection