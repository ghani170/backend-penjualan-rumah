@extends('layoutadmin.index')
@section('title', 'Kelola Tag')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <button command="show-modal" commandfor="dialog" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 ease-in-out shadow-md">
            + Tambah Data
        </button>

        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title" 
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                
                <el-dialog-backdrop 
                    class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in">
                </el-dialog-backdrop>

                <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                    <el-dialog-panel 
                        class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">

                        <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <!-- FORM TAMBAH TAG -->
                                <form action="{{ route('tags.store') }}" method="POST" class="w-full">
                                    @csrf
                                    
                                    <div>
                                        <label for="nama" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-hashtag text-primary-500 mr-2"></i> Nama Tag
                                        </label>
                                        <input type="text" id="nama" name="nama" 
                                            class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                            required>
                                    </div>
                                    
                                    <div class="flex justify-end space-x-3 mt-2 pt-5 border-t border-gray-200">
                                        <button type="button" command="close" commandfor="dialog" 
                                            class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                            Batal
                                        </button>
                                        <button type="submit" 
                                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                            Tambah Data
                                        </button>
                                    </div>
                                </form>
                                <!-- END FORM -->
                            </div>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>

        <!-- <a href="{{ route('tags.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 ease-in-out shadow-md">+ Tambah Tag</a> -->
        
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
                                command="show-modal" 
                                commandfor="editDialog-{{ $tag->id }}" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg shadow-md">
                                Edit
                            </button>

                            {{-- Modal Edit --}}
                            <el-dialog>
                                <dialog id="editDialog-{{ $tag->id }}" aria-labelledby="dialog-title" 
                                    class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                    
                                    <el-dialog-backdrop 
                                        class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in">
                                    </el-dialog-backdrop>

                                    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                        <el-dialog-panel 
                                            class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">

                                            <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <!-- FORM EDIT TAG -->
                                                    <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="w-full">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <div>
                                                            <label for="nama-{{ $tag->id }}" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                                <i class="fas fa-hashtag text-primary-500 mr-2"></i> Nama Tag
                                                            </label>
                                                            <input type="text" id="nama-{{ $tag->id }}" name="nama" 
                                                                value="{{ $tag->nama }}"
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                                required>
                                                        </div>
                                                        
                                                        <div class="flex justify-end space-x-3 mt-2 pt-5 border-t border-gray-200">
                                                            <button type="button" command="close" commandfor="editDialog-{{ $tag->id }}" 
                                                                class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                                Batal
                                                            </button>
                                                            <button type="submit" 
                                                                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM -->
                                                </div>
                                            </div>
                                        </el-dialog-panel>
                                    </div>
                                </dialog>
                            </el-dialog>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus tag ini?')" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg shadow-md">Hapus</button>
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
<div id="editModal" class="fixed inset-0 items-center justify-center bg-blue/70 backdrop-blur-sm bg-opacity-50 shadow-md z-50 hidden focus:outline-none">
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

