@extends('layoutrumah.index')
@section('title', 'About')

@section('content')
<div class="bg-white transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Bagian Hero -->
        <div class="text-center mb-16 mt-17" data-aos="fade-up" data-aos-delay="80">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Mengenal OC Company Website Penjualan Rumah </h1>
            <p class="text-xl text-gray-900  max-w-3xl mx-auto">Selamat datang di website kami, tempat terbaik untuk menemukan rumah impian Anda. Kami menyediakan berbagai pilihan rumah dengan informasi lengkap dan akurat.</p>
        </div>

        <!-- Bagian Tentang Kami -->
        <div data-aos="fade-up" data-aos-delay="80" class="bg-gray-100 rounded-2xl shadow-lg overflow-hidden mb-16">
            <div class="md:flex">
                <div class="md:w-1/2 p-8 md:p-12 lg:p-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Kami</h2>
                    <p class="text-gray-900 mb-6">OC Company adalah solusi terdepan untuk Anda yang ingin menjual properti dengan mudah, cepat, dan menguntungkan. Kami memahami bahwa pasar properti dapat terasa rumit, dan itulah mengapa tim ahli kami hadir untuk menyederhanakannya.

                    Dengan fokus pada transparansi, efisiensi, dan hasil terbaik, kami mengurus seluruh proses penjualan, mulai dari penentuan harga yang strategis hingga penutupan transaksi. Kami menggunakan teknologi canggih dan strategi pemasaran digital yang inovatif untuk memastikan properti Anda menjangkau calon pembeli yang paling potensial.

                    Di Penjualan Rumah, kami tidak sekadar membantu Anda menjual, kami adalah mitra yang siap mewujudkan kesuksesan finansial Anda.
                    </p>
                </div>
                <div class="md:w-1/2 bg-blue-100 flex items-center justify-center p-8">
                    <img src="{{ asset('images/rumah2.jpg') }}" alt="rumah" class="rounded-lg shadow-md w-full h-auto max-h-96 object-cover">
                </div>
            </div>
        </div>

       

        <!-- Bagian Keterbatasan -->
        <div data-aos="fade-up" data-aos-delay="80" class="bg-gray-100 rounded-2xl shadow-lg overflow-hidden mb-16">
            <div class="md:flex flex-row-reverse">
                <div class="md:w-1/2 p-8 md:p-12 lg:p-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Mengapa Harus OC Company?</h2>
                    <!-- <p class="text-gray-600 mb-4">fsf</p> -->
                    <ul class="space-y-3 text-gray-900">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            <span>Penilaian Properti yang Akurat: Kami menggunakan data pasar terkini dan keahlian lokal untuk menentukan harga jual yang optimal.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            <span>Strategi Pemasaran Inovatif: Kami memanfaatkan teknologi terbaru dan jaringan luas untuk menjangkau audiens yang lebih besar.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            <span>Bimbingan Profesional: Dari persiapan rumah, negosiasi, hingga proses legal, tim kami akan memandu Anda dengan profesionalisme dan transparansi.</span>
                        </li>
                        <!-- <li class="flex items-start">
                            <svg class="h-5 w-5 text-gray-500 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            <span>Mungkin tidak sesuai untuk beberapa kelompok etnis</span>
                        </li> -->
                    </ul>
                </div>
                <div class="md:w-1/2 bg-blue-100 flex items-center justify-center p-8">
                    <img src="{{ asset('images/rumah3.jpg') }}" alt="rumah" class="rounded-lg shadow-md w-full h-auto max-h-96 object-cover">
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/about.js') }}"></script>
@endsection