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
                <a href="{{ route('admin.tags') }}" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-users mr-3"></i>
                    <span>Kelola Tag</span>
                </a>
                
                <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-chart-bar mr-3"></i>
                    <span>Laporan</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Pengaturan</span>
                </a>
                
                <div class="px-6 py-2 mt-6 text-xs text-gray-500 uppercase">Lainnya</div>
                <a href="#" class="flex items-center px-6 py-3 mt-1 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-question-circle mr-3"></i>
                    <span>Bantuan</span>
                </a>
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
                    <button class="p-2 mr-4 text-gray-600 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 bg-danger text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">3</span>
                    </button>
                    <div class="relative">
                        <button class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-700"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                
                

                @yield('content')

                <!-- Table -->
                <!-- <div class="bg-white rounded-lg shadow mb-5">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Pengguna Terbaru</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Bergabung</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Jane Cooper</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">jane.cooper@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-15</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-primary hover:text-secondary">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">john.doe@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-10</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-primary hover:text-secondary">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/24.jpg" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Alice Johnson</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">alice.johnson@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Tertunda</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-05-05</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-primary hover:text-secondary">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div> -->
    
    
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