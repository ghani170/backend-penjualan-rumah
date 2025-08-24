@foreach($rumah as $item)
    <div class="border p-3 rounded shadow mb-4">
        <h2 class="text-xl font-bold">{{ $item->nama_rumah }}</h2>
        <p>{{ $item->lokasi }}</p>
        <p>Harga: Rp {{ $item->harga }}</p>

        {{-- tampilkan 1 gambar pertama --}}
        @if($item->images->isNotEmpty())
            <img src="{{ asset('storage/' . $item->images->first()->path) }}" 
                 class="w-full h-40 object-cover rounded mt-2">
        @endif

        {{-- tampilkan semua tag --}}
        <div class="mt-2">
            @foreach($item->tags as $tag)
                <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded text-sm">
                    {{ $tag->nama }}
                </span>
            @endforeach
        </div>
    </div>
@endforeach


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Penjualan Rumah</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="./output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .dark {
            color-scheme: dark;
        }

        .dark .bg-white {
            background-color: #182130;
        }

        .dark .bg-gray-100 {
            background-color: #111827;
        }

        .dark .bg-blue-700 {
            background-color: #1e40af;
        }

        .dark .text-blue-800 {
            color: #22a0e9;
        }

        .dark .text-gray-900 {
            color: #f3f4f6;
        }

        .dark .text-gray-500 {
            color: #9ca3af; 
        }

        .dark .border-gray-200 {
            border-color: #374151; 
        }

        .dark .bg-white\/30 {
            background-color: rgba(31, 41, 55, 0.3); 
        }

        .dark .bg-white\/80 {
            background-color: rgba(31, 41, 55, 0.8); 
        }

        .dark .hover\:bg-gray-50:hover {
            background-color: rgba(55, 65, 81, 0.5); 
        }

        .dark .bg-gray-900 {
            background-color: #030712; 
        }

        .dark .border-gray-800 {
            border-color: #1f2937; 
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white/30 backdrop-blur-md rounded-xl shadow-lg fixed w-full z-10 top-0 left-0 right-0 dark:text-white transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-gray-900">OC<span class="text-blue-600">COMPANY</span></span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="index.html" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">Home</a>
                    <a href="shop.html" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">Shop</a>
                    <a href="about.html" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">About</a>
                    <a href="contact.html" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">Contact</a>
                </div>
                
                <!-- CTA Button -->
                <div class="hidden md:block relative">
                    <button id="gear-dropdown-button" class="px-6 py-3 rounded-full font-medium transition duration-300 focus:outline-none">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md">
                            <i class="fa-solid fa-bars fa-2xl text-gray-900"></i>
                        </div>
                    </button>
        
                    <!-- Gear Dropdown Menu -->
                    <div id="gear-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white/80 text-gray-900 backdrop-blur-md rounded-md shadow-lg py-1 z-20">
                        <button id="dark-mode-toggle" class="w-full text-left px-4 py-2 text-sm text-gray-900 hover:text-blue-600 hover:bg-gray-50 font-bold flex items-center ">
                            <span id="dark-mode-text">Dark Mode</span>
                            <i id="dark-mode-icon" class="fas fa-moon ml-2"></i>
                        </button>
                        <!-- <div class="border-t border-gray-200 dark:border-gray-700"></div> -->
                        <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-bold dark:text-gray-300 dark:hover:bg-gray-700">Login</a> -->
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-button" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu (hidden by default) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="shop.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">Shop</a>
                <a href="about.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">About</a>
                <a href="contact.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">Contact</a>

                <!-- Services dropdown -->
                <div class="relative">
                    <button id="services-dropdown-button" class="flex justify-between items-center w-full px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">
                        <span>Setting</span>
                        <i class="fas fa-chevron-down text-xs ml-1 transition-transform duration-200"></i>
                    </button>
                    <div id="services-dropdown" class="hidden pl-4 mt-1 space-y-1">
                        <button id="mobile-dark-mode-toggle" class="flex items-center w-full px-3 py-2 rounded-md text-base font-medium hover:text-blue-600 hover:bg-gray-50 text-gray-900 dark:hover:bg-gray-100">
                            <span id="mobile-dark-mode-text">Dark Mode</span>
                            <i class="fas fa-moon ml-2"></i>
                        </button> 
                    </div>
                </div>

                <!-- <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-blue-600 hover:bg-blue-50">Schedule Consultation</a> -->
            </div>
        </div>
    </nav>

    <section class="bg-gray-100 bg-custom-cover bg-no-repeat bg-bottom mt-17">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7 mb-5" data-aos="fade-right" data-aos-delay="100">
                <img src="image/rumah4.png" alt="Desain rumah modern" class="">
            </div>
            <div class="lg:mt-0 lg:col-span-5 flex flex-col justify-center">
                <div data-aos="fade-right" data-aos-delay="200">
                    <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-gray-900">Penjualan Rumah</h1>
                    <p class="max-w-2xl mb-6 text-gray-900 lg:mb-8 md:text-lg lg:text-xl">Selamat datang di tempat di mana Anda bisa menemukan 'rumah' yang sebenarnya. Kami memahami bahwa rumah bukan hanya bangunan, tapi juga tempat di mana kenangan indah tercipta.</p>
                </div>
                
                <div data-aos="fade-right" data-aos-delay="300" class="mt-4">
                    <a href="#produk" id="scrollproduk" class="py-3 px-6 text-white rounded-md inline-flex items-center justify-center text-base font-medium text-center bg-blue-600 hover:bg-blue-700 transition duration-300">
                        Temukan
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>                
        </div>
    </section>

    <!-- Featured Vehicles -->
    <div data-aos="fade-up" data-aos-delay="100" id="produk" class="py-16 bg-white mt-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Pilihan Rumah
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Model rumah kami yang paling populer saat ini:
                </p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                 @foreach($rumah as $item)
                <div class="group relative bg-gray-100 border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-w-3 aspect-h-2 bg-gray-200 group-hover:opacity-75 overflow-hidden">
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/'. $item->images->first()->path) }}" alt="Car model" class="w-full h-64 object-cover">
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $item->nama_rumah }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $item->lokasi }}</p>
                                <p class="text-lg font-semibold text-blue-800 mt-2">Rp. {{ $item->harga }}</p>
                            </div>
                           
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            <div class="flex space-x-2">
                                @foreach($item->tags as $tag)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $tag->nama }}</span>
                                @endforeach
                            </div>
                            <button class="text-blue-800 hover:text-blue-800 text-sm font-medium">
                                View Details <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

                
                
            </div>

            <div class="mt-12 text-center" data-aos="zoom-in" data-aos-delay="100">
                <a href="shop.html" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                    View Full Inventory
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="bg-gray-100 py-16" data-aos="fade-up" data-aos-delay="100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl" data-aos="fade-up" data-aos-delay="100">
                    Kenapa harus OC Company?
                </h2>
                <!-- <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    We go beyond just selling to provide exceptional service
                </p> -->
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Service 1 -->
                <div class="bg-gray-100 backdrop-blur-md border border-gray-200 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                        <i class="fas fa-car text-xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Nikmati Lingkungan yang Nyaman dan Aman</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Lingkungan asri dengan keamanan terjamin 24 jam dilengkapi CCTV dan One Gate System.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="bg-gray-100 border border-gray-200 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-house text-xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Lebih Dari Hunian Bernilai Investasi Tinggi</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Setiap rumah yang kami tawarkan adalah investasi berharga untuk masa depan Anda.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="bg-gray-100 border border-gray-200 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Akses Kemanapun Mudah Karena Lokasi yang Strategis</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Lokasi mudah dijangkau serta dekat dengan berbagai fasilitas umum seperti sekolah, rumah sakit, pasar tradisional, pusat perbelanjaan hingga bandara.
                    </p>
                </div>

                <!-- Service 4 -->
                <div class="bg-gray-100 border border-gray-200 p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-mountain-city text-xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Perpaduan Panorama Menawan Sekaligus</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Nikmati indahnya pulang ke rumah dengan tiga panorama menawan sekaligus--laut, bukit, hamparan rumput dan perkotaan modern.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-700">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:flex lg:justify-between">
            <div class="max-w-xl" data-aos="fade-right" data-aos-delay="100">
                <h2 class="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Siap Menemukan Rumah Impian Anda?
                </h2>
                <p class="mt-5 text-xl text-blue-100">
                    Tim spesialis kami siap membantu Anda dengan pertanyaan apa pun.
                </p>
            </div>
            <div class="mt-10 flex-shrink-0 lg:mt-0 lg:ml-10 lg:flex lg:items-center">
                <div class="inline-flex rounded-md shadow" data-aos="fade-left" data-aos-delay="100">
                    <a href="contact.html" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10">
                        Contact Us
                    </a>
                </div>
                <!-- <div class="ml-4 inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 bg-opacity-60 hover:bg-opacity-70 md:py-4 md:text-lg md:px-10">
                        Call Now
                    </a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">OC Company</h3>
                    <p class="text-gray-400 text-sm">
                        Berdiri sejak 20 Tahun yang lalu,OC Company adalah perusahaan yang bergerak di bidang penjualan rumah 
                        dengan pengalaman yang luas dan reputasi yang solid. Kami berkomitmen untuk membantu anda menemukan 
                        rumah impian anda dengan layanan yang profesional dan terpercaya.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="shop.html" class="text-gray-400 hover:text-white transition">Shop</a></li>
                        <li><a href="about.html" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="contact.html" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <address class="text-gray-400 text-sm not-italic">
                        <p class="mb-2">15 kampus</p>
                        <p class="mb-2">Phone: 0888888888</p>
                        <p>Email: info@oc.com</p>
                    </address>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">
                        Subscribe to get updates on new arrivals and special offers.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 w-full rounded-l-md text-gray-200 focus:outline-none">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-md">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2025 OC Company
                </p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="index.js"></script>
</body>
</html>