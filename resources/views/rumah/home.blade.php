@extends('layoutrumah.index')
@section('title', 'Home')

@section('content')
<section class="bg-gray-100 bg-custom-cover bg-no-repeat bg-bottom mt-17">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7 mb-5" data-aos="fade-right" data-aos-delay="100">
                <img src="{{ asset('images/rumah4.png') }}" alt="Desain rumah modern" class="">
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

     <!-- popup item -->
             <div id="product-modal" class="fixed inset-0 z-50 hidden bg-gray-900/80 backdrop-blur-md overflow-y-auto h-full w-full transition-opacity duration-300">
    <div class="relative top-5 mx-auto p-5 w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 shadow-xl rounded-xl bg-white  border border-gray-200 transform transition-transform duration-300">
        <!-- Close button (X) -->
        <button id="modal-close" class="absolute top-4 right-4 z-10 bg-red-400 rounded-full p-2 shadow-md hover:bg-red-200 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="mt-2">
            <h3 class="text-2xl font-bold text-gray-900 text-center mb-6" id="modal-title"></h3>
            
            <!-- Image Gallery -->
            <div class="relative w-full h-72 md:h-80 overflow-hidden rounded-xl shadow-lg mb-6">
                <div id="modal-images-container" class="flex transition-transform duration-500 ease-in-out">
                    <!-- Gambar akan dimasukkan lewat JS -->
                </div>

                <!-- Navigation buttons -->
                <button id="prev-btn" class="absolute top-1/2 left-3 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="next-btn" class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                
                <!-- Image indicators -->
                <div id="image-indicators" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <!-- Indicators will be added by JS -->
                </div>

                <!-- Thumbnail Preview -->
                <div id="thumbnail-container" class="flex justify-center space-x-2 mt-3"></div>

                    

            </div>
            
            <!-- Product Details -->
            <div class="px-2 py-4 ">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                    <p class="text-gray-900 text-lg font-semibold flex items-center" id="modal-location">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span id="location-text"></span>
                    </p>
                    <p class="text-blue-600 text-2xl font-bold mt-2 md:mt-0" id="modal-price"></p>
                </div>
                
                <div class="bg-gray-100 rounded-lg p-4">
                    <h2 class="text-xl font-bold p-1 text-gray-900">Detail Properti:</h2>
                    <div class="grid grid-cols-[200px_auto] gap-y-2 p-3">
                    <p class="font-semibold">Luas Bangunan</p>
                    <p id="modal-luasbangunan"></p>

                    <p class="font-semibold">Luas Tanah</p>
                    <p id="modal-luastanah"></p>

                    <p class="font-semibold">Listrik</p>
                    <p id="modal-listrik"></p>

                    <p class="font-semibold">Sertifikat</p>
                    <p id="modal-sertifikat"></p>
                </div>

                </div>


                <div class="mb-5 mt-6">
                    <h2 class="text-xl font-bold ml-3 mb-2">Deskripsi:</h2>
                    <p class="text-gray-500 text-sm mt-2 leading-relaxed ml-5" id="modal-description"></p>
                </div>
                
            </div>

             <!-- Action Button -->
            <div class="flex items-center px-2 py-4 mt-2">
                <a id="waButton" target="_blank" class="px-6 py-3 bg-gradient-to-r text-center from-green-500 to-green-600 text-white text-base font-medium rounded-lg w-full shadow-md hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-0.5">
                  <i class="fa-brands fa-whatsapp fa-xl"></i>  Hubungi WhatsApp
                </a>
            </div>
            
            
        </div>
    </div>
</div>

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
                                   
                                        {{ $item->nama_rumah }}
                                    
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $item->lokasi }}</p>
                                <p class="text-lg font-semibold text-blue-800 mt-2">Rp. {{ $item->harga }}</p>
                            </div>
                           
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            
                            <button 
                            class="view-details-btn p-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 text-sm font-medium"
                            data-nama="{{ $item->nama_rumah }}"
                            data-lokasi="{{ $item->lokasi }}"
                            data-harga="{{ $item->harga }}"
                            data-luas_bangunan="{{ $item->luas_bangunan }}"
                            data-luas_tanah="{{ $item->luas_tanah }}"
                            data-listrik="{{ $item->listrik }}"
                            data-sertifikat="{{ $item->sertifikat }}"
                            data-deskripsi="{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}"
                            data-gambar="{{ $item->images->pluck('path')->toJson() }}"
                            >
                            View Details <span aria-hidden="true">&rarr;</span>
                        </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

           



            <div class="mt-12 text-center" data-aos="zoom-in" data-aos-delay="100">
                <a href="{{ route('rumah.shop') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
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

    <script src="{{ asset('js/index.js') }}"></script>
    @endsection