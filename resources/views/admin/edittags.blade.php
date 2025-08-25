@extends('layoutadmin.index')
@section('title', 'Edit Tags')

@section('content')

<h1>Edit Tag</h1>
<form action="{{ route('tags.update', $tag->id) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')
    <label for="nama">Nama Tag:</label>
    <input type="text" name="nama" value="{{ $tag->nama }}" class="form-control" required>
    <button type="submit" class="btn btn-success mt-2">Update</button>
</form>
<a class="bg-blue-600 text-white px-4 py-2 rounded mt-60" href="{{ route('admin.tags') }}">Kembali</a>

@endsection
