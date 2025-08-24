@extends('layoutadmin.index')

@section('content')
<h1>Tambah Tag</h1>
<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <label for="nama">Nama Tag:</label>
    <input type="text" name="nama" class="form-control" required>
    <button type="submit" class="btn btn-success mt-2">Simpan</button>
</form>
@endsection
