@extends('layoutrumah.index')
@section('title', 'Shop')

@section('content')
<div id="produk" data-aos="fade-up" data-aos-delay="100" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($rumah as $item)
            <div class="group relative bg-gray-100 border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                <div class="aspect-w-3 aspect-h-2 bg-gray-200 group-hover:opacity-75 overflow-hidden">
                    @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->path) }}" 
                             alt="Rumah" 
                             class="w-full h-64 object-cover">
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">
                                
                                    
                                    {{ $item->nama_rumah }}
                                
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $item->lokasi }}</p>
                            <p class="text-lg font-semibold text-blue-600 mt-2">Rp. {{ $item->harga }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex space-x-2">
                            @foreach($item->tags as $tag)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-300 text-gray-800">
                                    {{ $tag->nama }}
                                </span>
                            @endforeach
                        </div>
                        <button 
                            class="view-details-btn p-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 text-sm font-medium"
                            data-nama="{{ $item->nama_rumah }}"
                            data-lokasi="{{ $item->lokasi }}"
                            data-harga="{{ $item->harga }}"
                            data-deskripsi="{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}"
                            data-gambar="{{ $item->images->pluck('path')->toJson() }}"
                            data-tags="{{ $item->tags->toJson() }}">
                            View Details <span aria-hidden="true">&rarr;</span>
                        </button>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Modal Pop Up --}}
<div id="product-modal" class="fixed inset-0 z-50 hidden bg-gray-900/80 backdrop-blur-md overflow-y-auto h-full w-full transition-opacity duration-300">
    <div class="relative top-5 mx-auto p-5 w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 shadow-xl rounded-xl bg-gradient-to-br from-white to-gray-50 border border-gray-200 transform transition-transform duration-300">
        <!-- Close button (X) -->
        <button id="modal-close" class="absolute top-4 right-4 z-10 bg-red-400 rounded-full p-2 shadow-md hover:bg-red-200 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="mt-2">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-6" id="modal-title"></h3>
            
            <!-- Image Gallery -->
            <div class="relative w-full h-72 md:h-80 overflow-hidden rounded-xl shadow-lg mb-6">
                <div id="modal-images-container" class="flex transition-transform duration-500 ease-in-out">
                    <!-- Gambar akan dimasukkan lewat JS -->
                </div>

                <!-- Navigation buttons -->
                <button id="prev-btn" class="absolute top-1/2 left-3 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="next-btn" class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                
                <!-- Image indicators -->
                <div id="image-indicators" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <!-- Indicators will be added by JS -->
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="px-2 py-4">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                    <p class="text-gray-700 text-lg font-semibold flex items-center" id="modal-location">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span id="location-text"></span>
                    </p>
                    <p class="text-blue-600 text-2xl font-bold mt-2 md:mt-0" id="modal-price"></p>
                </div>
                
                <div class="mb-5">
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed" id="modal-description"></p>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2" id="modal-tags"></div>
            </div>

             <!-- Action Button -->
            <div class="flex items-center px-2 py-4 mt-2">
                @foreach($rumah as $itemss)
                <a href="https://wa.me/+6289632840907?text=Hallo,%20saya%20ingin%20bertanya%20tentang rumah ini: {{ $itemss->nama_rumah }}..." class="px-6 py-3 bg-gradient-to-r text-center from-green-500 to-green-600 text-white text-base font-medium rounded-lg w-full shadow-md hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-0.5">
                  <i class="fa-brands fa-whatsapp fa-xl"></i>  Hubungi WhatsApp
                </a>
                @endforeach
            </div>
            
            
        </div>
    </div>
</div>

<script src="{{ asset('js/shop.js') }}"></script>
@endsection
