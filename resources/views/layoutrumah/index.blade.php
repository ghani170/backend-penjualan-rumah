<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
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
                    <a href="{{ route('rumah.index') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">Home</a>
                    <a href="{{ route('rumah.shop') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">Shop</a>
                    <a href="{{ route('rumah.about') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 font-bold">About</a>
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
                <a href="{{ route('rumah.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">Home</a>
                <a href="{{ route('rumah.shop') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-blue-600 hover:bg-gray-50">Shop</a>
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

   
        @yield('content')

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
    
</body>
</html>