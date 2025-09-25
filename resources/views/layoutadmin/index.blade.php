<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.4/dist/sweetalert2.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-xl font-bold text-primary">
                    <i class="fas fa-rocket mr-2"></i>AdminPanel
                </h1>
            </div>
            <nav class="mt-6">
                <div class="px-6 py-2 text-xs text-gray-500 uppercase">Menu Utama</div>
                <a href="{{ route('admin.index') }}" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span>Kelola Produk</span>
                </a>
                <!-- <a href="" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-users mr-3"></i>
                    <span>Laporan</span>
                </a> -->
                
                <!-- <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-chart-bar mr-3"></i>
                    <span>Laporan</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Pengaturan</span>
                </a> -->
                
                <div class="px-6 py-2 mt-6 text-xs text-gray-500 uppercase">Lainnya</div>
                <!-- <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-question-circle mr-3"></i>
                    <span>Bantuan</span>
                </a> -->
                <form method="POST" action="{{ route('logout') }}" class="flex px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <div></div>
                    <button type="submit" class="flex items-center w-full">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </button>
                    @csrf
                </form>

                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="flex items-center justify-between p-4 bg-white shadow">
                <div class="flex items-center">
                    <button class="p-1 mr-4 text-gray-600 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex items-center">
                    <!-- Notifikasi -->
                    <button class="p-2 mr-4 text-gray-600 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">3</span>
                    </button>

                    <!-- Profile -->
                    <div class="relative">
                        <button id="profileMenuBtn" class="flex items-center focus:outline-none">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" 
                                alt="Profile" 
                                class="w-10 h-10 rounded-full">
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-700"></i>
                        </button>

                        <!-- Dropdown -->
                        <div id="profileDropdown" 
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden transition-all duration-200 ease-in-out">
                            <button command="show-modal" commandfor="dialogg"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</button>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                    class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </header>
            <el-dialog>
        <dialog id="dialogg" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
            <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

            <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <form action="" method="post" enctype="multipart/form-data" class="px-8 py-6">
                            @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-5">
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-tag text-primary-500 mr-2"></i>Nama Item
                                </label>
                                <input type="text" id="nama" name="nama" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" placeholder="Masukkan nama item" required>
                            </div>
                            
                            <div class="mb-5">
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-hashtag text-primary-500 mr-2"></i>Jumlah
                                </label>
                                <input type="number" id="jumlah" name="jumlah" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" placeholder="Masukkan jumlah" required>
                            </div>
                        </div>
                        
                        <div class="mb-5">
                            <label for="tipe" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-list-alt text-primary-500 mr-2"></i>Tipe
                            </label>
                            <input type="text" id="jumlah" name="tipe" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" placeholder="Masukkan jumlah" required>
                            <!-- <select id="tipe" name="tipe" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm" required>
                                <option value="">Pilih tipe item</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="pakaian">Pakaian</option>
                                <option value="makanan">Makanan</option>
                                <option value="lainnya">Lainnya</option>
                            </select> -->
                        </div>
                        
                        <div class="mb-6">
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-image text-primary-500 mr-2"></i>Gambar
                            </label>
                            <div class="flex items-center justify-center w-full">
                                    <input type="file" id="gambar" name="gambar" class="w-full rounded-lg border-gray-300 border focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300 p-3 shadow-sm">
                                </div> 
                        </div>
                        
                        <div class="flex justify-end space-x-3 mt-8 pt-5 border-t border-gray-200">
                            <button type="button" command="close" commandfor="dialogg" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Batal
                            </button>
                            <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300">
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

            <!-- Content -->
            @yield('content') 
                
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("profileMenuBtn");
        const menu = document.getElementById("profileDropdown");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        // Klik luar untuk menutup menu
        document.addEventListener("click", (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });
    });
    </script>
    <script>
        // Script sederhana untuk interaktivitas
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar pada tampilan mobile
            const sidebarToggle = document.querySelector('.lg\\:hidden');
            const sidebar = document.querySelector('div.w-64');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                    sidebar.classList.toggle('absolute');
                    sidebar.classList.toggle('z-50');
                });
            }
        });
    </script>
</body>
</html>