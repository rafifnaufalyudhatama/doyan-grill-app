@extends('layouts.app')

@section('content')

    <div class="bg-orange-50 border border-orange-200 text-orange-800 px-6 py-4 rounded-2xl mb-8 flex items-center justify-center gap-3 text-sm font-medium shadow-sm reveal" data-animation="animate-fade-in-up">
        <i class="fa-solid fa-motorcycle text-lg"></i>
        <span>Pemberitahuan: Layanan antar (Delivery) saat ini hanya tersedia untuk wilayah <strong>Magelang - Jogja</strong>.</span>
    </div>

    <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-800 reveal" data-animation="animate-blur-in">
        Menu <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-yellow-500">Pilihan Kami</span>
    </h2>
 
     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
         @foreach($products as $product)
             <div class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)] reveal" data-animation="animate-pop-in" style="transition-delay: {{ $loop->index * 75 }}ms;">
                 <div class="relative h-56 overflow-hidden">
                     <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-orange-600 z-10 shadow-sm">
                         {{ strtoupper($product->category) }}
                     </span>
                     @if($product->image)
                         <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)]">
                     @else
                         <div class="w-full h-full bg-gray-50 flex items-center justify-center group-hover:bg-gray-100 transition-colors duration-500">
                             <i class="fa-solid fa-image text-4xl text-gray-300"></i>
                         </div>
                     @endif
                 </div>
                 <div class="p-6">
                     <h3 class="text-xl font-bold text-gray-800 mb-1 line-clamp-1">{{ $product->name }}</h3>
                     <div class="text-2xl font-black text-orange-600 mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                     <div class="flex gap-3">
                         <a href="{{ route('product.show', $product->id) }}" class="flex-1 text-center py-2.5 rounded-xl border-2 border-gray-100 text-gray-700 font-bold hover:border-orange-500 hover:text-orange-500 hover:bg-orange-50 active:scale-95 transition-all duration-300">Detail</a>
                         <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                             <input type="hidden" name="quantity" value="1">
                             <button type="submit" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 hover:-translate-y-0.5 active:scale-95 transition-all duration-300 flex justify-center items-center">
                                 <i class="fa-solid fa-cart-plus"></i>
                             </button>
                         </form>
                     </div>

                 </div>
             </div>
         @endforeach
     </div>

@endsection
