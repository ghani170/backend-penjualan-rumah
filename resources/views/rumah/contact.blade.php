@extends('layoutrumah.index')
@section('title', 'Contact')

@section('content')
<div class="bg-gradient-to-b from-blue-10 mt-15">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mr-20" data-aos="fade-down" data-aos-delay="100">Hubungi Kami</h1>
        <p class="text-lg text-gray-900 mb-8" data-aos="fade-right" data-aos-delay="130">Kami siap membantu Anda dengan pertanyaan atau permintaan informasi lebih lanjut. Silakan isi formulir di bawah ini untuk menghubungi kami.</p>
        <div data-aos="fade-up" data-aos-delay="130" class="bg-white rounded-2xl shadow-lg overflow-hidden mb-16">
            <div class="p-8 md:p-12 lg:p-16">
                <form action="">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-900">Pesan</label>
                        <textarea id="message" name="message" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="w-32 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-200">Kirim Pesan</button>
                </form>
            </div>
            <div class="mx-auto p-8 md:p-12 lg:p-16 mt-[-3rem]">
                <span class="flex items-center">
                    <span class="h-px flex-1 bg-gray-300"></span>

                    <span class="shrink-0 px-4 text-gray-900">Contact US</span>

                    <span class="h-px flex-1 bg-gray-300"></span>
                </span>
                <div class="flex justify-center ...">
                    <div class="p-7"><a href="" class="hover:shadow-xl"><i class="fa-brands fa-square-whatsapp fa-3x"></i></a></div>
                    <div class="p-7"><a href="" class="hover:shadow-xl"><i class="fa-brands fa-telegram fa-3x"></i></a></div>
                    <div class="p-7"><a href="" class="hover:shadow-xl"><i class="fa-brands fa-square-instagram fa-3x"></i></a></div>
                </div>
            </div>
        </div>
        
       
    </div>
    </div>

    <script src="{{ asset('js/contact.js') }}"></script>
@endsection
