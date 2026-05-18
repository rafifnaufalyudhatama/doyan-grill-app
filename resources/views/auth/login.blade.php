@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 reveal" data-animation="animate-fade-in-up">
    <div class="max-w-md w-full space-y-8 bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-2xl border border-orange-100 relative overflow-hidden">
        
        <!-- Decorative Glow -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-orange-400 rounded-full mix-blend-multiply filter blur-[50px] opacity-50 animate-blob"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-red-400 rounded-full mix-blend-multiply filter blur-[50px] opacity-50 animate-blob animation-delay-2000"></div>

        <div class="relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-tr from-orange-500 to-red-500 text-white text-4xl shadow-lg shadow-orange-500/40 mb-6 group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Masuk ke Akun Anda</h2>
                <p class="text-sm text-gray-500 font-medium">Selamat datang kembali! Silakan masukkan kredensial Anda.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-orange-500 transition-colors">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full pl-11 pr-4 py-3.5 bg-gray-50/50 border-2 border-gray-100 rounded-2xl text-gray-900 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all placeholder-gray-400 font-medium" placeholder="anda@contoh.com" value="{{ old('email') }}">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm font-medium" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-orange-500 transition-colors">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full pl-11 pr-4 py-3.5 bg-gray-50/50 border-2 border-gray-100 rounded-2xl text-gray-900 focus:bg-white focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all placeholder-gray-400 font-medium" placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm font-medium" />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 text-orange-500 focus:ring-orange-500 border-gray-300 rounded cursor-pointer transition-colors">
                        <label for="remember_me" class="ml-2 block text-sm font-bold text-gray-700 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-bold text-orange-600 hover:text-orange-500 transition-colors">Lupa kata sandi?</a>
                        </div>
                    @endif
                </div>

                <div class="pt-4">
                    <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-bold rounded-2xl text-white bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-orange-500/30 shadow-xl shadow-orange-500/20 transform hover:-translate-y-1 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                            <i class="fa-solid fa-arrow-right-to-bracket text-orange-200 group-hover:text-white transition-colors"></i>
                        </span>
                        Masuk Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-sm">
                <span class="text-gray-500 font-medium">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="font-bold text-orange-600 hover:text-orange-500 ml-1 transition-colors">Daftar Akun Baru</a>
            </div>
        </div>
    </div>
</div>
@endsection
