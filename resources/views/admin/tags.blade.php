@extends('layoutadmin.index')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Tag</h1>
        <a href="{{ route('tags.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 ease-in-out shadow-md">+ Tambah Tag</a>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            html: "{{ session('success') }}",
            confirmButtonColor: '#3085d6'
        });
    </script>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tag</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($tags as $tag)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tag->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{-- Tombol Edit pakai modal --}}
                            <button 
                                class="text-blue-600 hover:text-blue-900 editBtn"
                                data-id="{{ $tag->id }}"
                                data-nama="{{ $tag->nama }}">
                                Edit
                            </button>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus tag ini?')" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-96 shadow-lg">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Edit Tag</h2>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Tag:</label>
                <input type="text" id="nama_tag" name="nama" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>
            <div class="flex justify-end space-x-2 p-4 border-t">
                <button type="button" id="closeModal" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection


<script>
document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".editBtn");
    const editForm = document.getElementById("editForm");
    const namaInput = document.getElementById("nama_tag");
    const modal = document.getElementById("editModal");
    const closeModalBtn = document.getElementById("closeModal");

    editButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            let id = this.getAttribute("data-id");
            let nama = this.getAttribute("data-nama");

            // isi form
            namaInput.value = nama;

            // ubah action form
            editForm.action = "/tags/" + id;

            // tampilkan modal
            modal.classList.remove("hidden");
        });
    });

    // tombol close
    closeModalBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // klik di luar modal untuk close
    modal.addEventListener("click", function(e) {
        if(e.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
</script>

