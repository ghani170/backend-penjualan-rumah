@extends('layoutadmin.index')
@section('title', 'Tambah Produk')


@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="formTambah" method="POST" action="{{ route('admin.tambahproduk.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama_rumah" placeholder="Nama Rumah" class="border p-2 w-full mb-2" required>
    <textarea name="deskripsi" placeholder="Deskripsi" class="border p-2 w-full mb-2" required></textarea>
    <input type="text" name="harga" placeholder="Harga" class="border p-2 w-full mb-2" required>
    <input type="text" name="lokasi" placeholder="Lokasi" class="border p-2 w-full mb-2" required>
    <input type="file" name="gambar1" class="border p-2 w-full mb-2" accept="image/*">
    <input type="file" name="gambar2" class="border p-2 w-full mb-2" accept="image/*">
    <input type="file" name="gambar3" class="border p-2 w-full mb-2" accept="image/*">
    <input type="file" name="gambar4" class="border p-2 w-full mb-2" accept="image/*">
    <input type="file" name="gambar5" class="border p-2 w-full mb-2" accept="image/*">
    <label>Pilih Tag Pertama:</label>
    <select name="tags[]" required class="border p-2 w-full mb-2">
        <option value="">-- Pilih Tag Pertama --</option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
        @endforeach
    </select>

    <label>Pilih Tag Kedua:</label>
    <select name="tags[]" required class="border p-2 w-full mb-2">
        <option value="">-- Pilih Tag Kedua --</option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
        @endforeach
    </select>

    <label>Pilih Tag Ketiga:</label>
    <select name="tags[]" required class="border p-2 w-full mb-2">
        <option value="">-- Pilih Tag Ketiga --</option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
        @endforeach
    </select>
    <!-- <select name="tags[]" multiple class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md border" required>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
        @endforeach
    </select>
    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Pilih Tag:</label>
    <select name="tags[]" id="jenis_kelamin" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md border">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
        @endforeach
    </select> -->
    <button class="bg-blue-600 text-white px-4 py-2 rounded mt-3">Simpan</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("formTambah");
    form.addEventListener("submit", function(e) {
        let selects = document.querySelectorAll("select[name='tags[]']");
        let values = Array.from(selects).map(s => s.value).filter(v => v !== "");
        let uniqueValues = [...new Set(values)];

        if (values.length !== uniqueValues.length) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tidak boleh memilih tag yang sama!',
            });
        }
    });
});
</script>


@endsection