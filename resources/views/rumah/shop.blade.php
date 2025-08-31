@extends('layoutrumah.index')
@section('title', 'Shop')

@section('content')
<div id="produk" data-aos="fade-up" data-aos-delay="100"  class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                 @foreach($rumah as $item)
                <div class="group relative bg-gray-100 border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <div class="aspect-w-3 aspect-h-2 bg-gray-200 group-hover:opacity-75 overflow-hidden">
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->path) }}" alt="Car model" class="w-full h-64 object-cover">
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
                                <p class="text-lg font-semibold text-blue-600 mt-2">Rp. {{ $item->harga }}</p>
                            </div>
                            
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex space-x-2">
                                 @foreach($item->tags as $tag)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-300 text-gray-800">{{ $tag->nama }}</span>
                                @endforeach
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View Details <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

                

            </div>
        </div>
    </div>

    <script src="{{ asset('js/shop.js') }}"></script>
@endsection