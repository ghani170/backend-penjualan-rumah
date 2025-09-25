@extends('layoutadmin.index')
@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <button command="show-modal" commandfor="dialog" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 ease-in-out shadow-md">
            + Tambah Data
        </button>

        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title" 
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent">
                
                <el-dialog-backdrop 
                    class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in">
                </el-dialog-backdrop>

                <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                    <el-dialog-panel 
                        class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">

                        <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <form action="{{ route('admin.tambahproduk.store') }}" method="POST" class="w-full" id="formTambah" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="nama" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Nama Rumah
                                            </label>
                                            <input type="text" id="nama" name="nama_rumah" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                        <div>
                                            <label for="harga" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Harga
                                            </label>
                                            <input type="text" id="harga" name="harga" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="luas_bangunan" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Luas bangunan (m²)
                                            </label>
                                            <input type="text" id="luas_bangunan" name="luas_bangunan" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                        <div>
                                            <label for="luas_tanah" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Luas tanah (m²)
                                            </label>
                                            <input type="text" id="luas_tanah" name="luas_tanah" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="listrik" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Listrik (Watt)
                                            </label>
                                            <input type="text" id="listrik" name="listrik" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                        <div>
                                            <label for="listrik" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                                Sertifikat
                                            </label>
                                            <input type="text" id="sertifikat" name="sertifikat" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="lokasi" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                        Lokasi
                                        </label>
                                        <input type="text" id="lokasi" name="lokasi" 
                                            class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                            required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea 
                                            id="deskripsi" name="deskripsi" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm" required></textarea>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="gambar1" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                            Gambar 1
                                            </label>
                                            <input type="file" id="gambar1" name="gambar1" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                        <div>
                                            <label for="gambar2" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                            Gambar 2
                                            </label>
                                            <input type="file" id="gambar2" name="gambar2" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="gambar3" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                            Gambar 3
                                            </label>
                                            <input type="file" id="gambar3" name="gambar3" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                        <div>
                                            <label for="gambar4" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                            Gambar 4
                                            </label>
                                            <input type="file" id="gambar4" name="gambar4" 
                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" 
                                                required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="gambar5" class="block text-left text-sm font-medium text-gray-700 mb-2">
                                        Gambar 5
                                        </label>
                                        <input type="file" id="gambar5" name="gambar5" 
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
                                </div>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
        
    </div>

    {{-- Pesan sukses --}}
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

    {{-- Tabel Produk --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rumah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $item)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->nama_rumah }}</td>
                        <td class="px-6 py-4">{{ $item->harga }}</td>
                        <td class="px-6 py-4">{{ $item->deskripsi }}</td>
                        <td class="px-6 py-4">{{ $item->lokasi }}</td>
                        <td class="px-6 py-4 flex">
                            <button 
                            command="show-modal" 
                            commandfor="editDialog-{{ $item->id }}" 
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-lg shadow-md">
                            Edit
                        </button>

                        <el-dialog>
                            <dialog id="editDialog-{{ $item->id }}" aria-labelledby="dialog-title" 
                                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent z-50">
                                
                                <el-dialog-backdrop 
                                    class="fixed inset-0 bg-gray-900/50 transition-opacity 
                                    data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out 
                                    data-leave:duration-200 data-leave:ease-in">
                                </el-dialog-backdrop>

                                <div tabindex="0" 
                                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">

                                    <el-dialog-panel 
                                        class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all 
                                        data-closed:translate-y-4 data-closed:opacity-0 
                                        data-enter:duration-300 data-enter:ease-out 
                                        data-leave:duration-200 data-leave:ease-in 
                                        sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">

                                        <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <form action="{{ route('admin.tambahproduk.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="w-full" id="formEdit-{{ $item->id }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Nama Rumah</label>
                                                            <input type="text" name="nama_rumah" value="{{ $item->nama_rumah }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Harga</label>
                                                            <input type="text" name="harga" value="{{ $item->harga }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Luas Bangunan (m²)</label>
                                                            <input type="text" name="luas_bangunan" value="{{ $item->luas_bangunan }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Luas Tanah (m²)</label>
                                                            <input type="text" name="luas_tanah" value="{{ $item->luas_tanah }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Listrik (Watt)</label>
                                                            <input type="text" name="listrik" value="{{ $item->listrik }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="block text-sm font-medium text-gray-700">Sertifikat</label>
                                                            <input type="text" name="sertifikat" value="{{ $item->sertifikat }}" 
                                                                class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                                                        <input type="text" name="lokasi" value="{{ $item->lokasi }}" 
                                                            class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                        <textarea name="deskripsi" 
                                                            class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">{{ $item->deskripsi }}</textarea>
                                                    </div>
                                                    
                                                    {{-- Gambar 1–4 (grid 2 kolom) --}}
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        @for($i=1; $i<=4; $i++)
                                                            <div class="mb-3">
                                                                <label class="block text-sm font-medium text-gray-700">Gambar {{ $i }}</label>
                                                                <input type="file" name="gambar{{ $i }}" 
                                                                    class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">

                                                                @php $gambar = "gambar".$i; @endphp
                                                                @if($item->$gambar)
                                                                    <img src="{{ asset('storage/'.$item->$gambar) }}" alt="gambar{{ $i }}" class="w-20 mt-2 rounded shadow-md">
                                                                @endif
                                                            </div>
                                                        @endfor
                                                    </div>

                                                    {{-- Gambar 5 (full width, normal) --}}
                                                    <div class="mt-2">
                                                        <label class="block text-sm font-medium text-gray-700">Gambar 5</label>
                                                        <input type="file" name="gambar5" 
                                                            class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 p-3 shadow-sm">

                                                        @if($item->gambar5)
                                                            <img src="{{ asset('storage/'.$item->gambar5) }}" alt="gambar5" class="w-32 mt-2 rounded shadow-md">
                                                        @endif
                                                    </div>


                                                    

                                                    <div class="flex justify-end space-x-3 mt-4 pt-5 border-t border-gray-200">
                                                        <button type="button" command="close" commandfor="editDialog-{{ $item->id }}" 
                                                            class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-md">
                                                            Batal
                                                        </button>
                                                        <button type="submit" 
                                                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </el-dialog-panel>
                                </div>
                            </dialog>
                        </el-dialog>


                            <form action="{{ route('admin.destroy', $item->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus produk ini?')" 
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-lg shadow-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection