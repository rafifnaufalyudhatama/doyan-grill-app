@extends('layouts.app')

@section('content')

    <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-800 reveal" data-animation="animate-blur-in">
        Proses <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-yellow-500">Checkout</span>
    </h2>

    <div class="flex flex-col lg:flex-row gap-8 reveal" data-animation="animate-fade-in-up">
        
        <!-- Form Section -->
        <div class="flex-[2] bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-100 flex items-center gap-2">
                <i class="fa-solid fa-map-location-dot text-orange-500"></i> Alamat Pengiriman
            </h3>
            <form id="checkout-form" action="{{ route('cart.process') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="name" class="block font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all" required placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label for="phone" class="block font-bold text-gray-700 mb-2">Nomor Telepon / WhatsApp</label>
                        <input type="text" id="phone" name="phone" class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all" required placeholder="Contoh: 081234567890">
                    </div>
                    <div>
                        <label for="address" class="block font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea id="address" name="address" class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all" rows="4" required placeholder="Masukkan alamat pengiriman secara detail"></textarea>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mt-8 mb-6 pb-4 border-b border-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-wallet text-orange-500"></i> Metode Pembayaran
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="payment_method" value="Transfer Bank" class="peer sr-only" required>
                            <div class="p-4 rounded-xl border-2 border-gray-100 peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:bg-gray-50 transition-all text-center">
                                <i class="fa-solid fa-building-columns text-2xl mb-2 text-gray-600 peer-checked:text-orange-600"></i>
                                <div class="font-bold text-gray-800">Transfer Bank</div>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="payment_method" value="E-Wallet" class="peer sr-only" required>
                            <div class="p-4 rounded-xl border-2 border-gray-100 peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:bg-gray-50 transition-all text-center">
                                <i class="fa-solid fa-mobile-screen-button text-2xl mb-2 text-gray-600 peer-checked:text-orange-600"></i>
                                <div class="font-bold text-gray-800">E-Wallet</div>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="payment_method" value="COD" class="peer sr-only" required>
                            <div class="p-4 rounded-xl border-2 border-gray-100 peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:bg-gray-50 transition-all text-center">
                                <i class="fa-solid fa-hand-holding-dollar text-2xl mb-2 text-gray-600 peer-checked:text-orange-600"></i>
                                <div class="font-bold text-gray-800">COD</div>
                            </div>
                        </label>
                    </div>
                </div>
            </form>
        </div>

        <!-- Order Summary Section -->
        <div class="flex-1 bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 h-max">
            <h3 class="text-xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-100 flex items-center gap-2">
                <i class="fa-solid fa-receipt text-orange-500"></i> Ringkasan Pesanan
            </h3>
            
            <div class="space-y-4 mb-6">
                @php $totalAmount = 0; @endphp
                @foreach($cart->items as $item)
                    @php 
                        $itemTotal = $item->product->price * $item->quantity; 
                        $totalAmount += $itemTotal;
                    @endphp
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">{{ $item->product->name }} <span class="font-bold text-gray-400 ml-1">x{{ $item->quantity }}</span></span>
                        <span class="font-bold text-gray-800">Rp {{ number_format($itemTotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="border-t-2 border-dashed border-gray-200 pt-6 mb-8">
                <div class="flex justify-between items-center text-lg font-black text-orange-600">
                    <span>Total Pembayaran</span>
                    <span>Rp {{ number_format($totalAmount, 0, ',', '.') }}</span>
                </div>
            </div>

            <button type="submit" form="checkout-form" class="w-full py-4 rounded-xl bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold text-lg shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 hover:-translate-y-0.5 active:scale-95 transition-all duration-300 flex items-center justify-center gap-2">
                <i class="fa-solid fa-check-circle"></i> Buat Pesanan
            </button>
        </div>

    </div>

@endsection
