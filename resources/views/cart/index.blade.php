@extends('layouts.app')

@section('content')

    <h2 class="section-title">Keranjang Belanja</h2>

    <div style="background: white; padding: 2rem; border-radius: 15px; box-shadow: var(--shadow);">
        @if(!$cart || $cart->items->isEmpty())
            <div style="text-align: center; padding: 3rem 0;">
                <i class="fa-solid fa-cart-shopping" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
                <h3 style="color: #666;">Keranjang Anda masih kosong</h3>
                <a href="{{ route('home') }}" class="btn btn-primary" style="margin-top: 1rem;">Mulai Belanja</a>
            </div>
        @else
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solid #eee;">
                        <th style="padding: 1rem;">Produk</th>
                        <th style="padding: 1rem;">Harga Satuan</th>
                        <th style="padding: 1rem; text-align: center;">Kuantitas</th>
                        <th style="padding: 1rem; text-align: right;">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalAmount = 0; @endphp
                    @foreach($cart->items as $item)
                        @php 
                            $itemTotal = $item->product->price * $item->quantity; 
                            $totalAmount += $itemTotal;
                        @endphp
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 1rem; display: flex; align-items: center; gap: 1rem;">
                                @if($item->product->image)
                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="width: 60px; height: 60px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa-solid fa-image" style="color: #ccc;"></i>
                                    </div>
                                @endif
                                <div>
                                    <div style="font-weight: 600;">{{ $item->product->name }}</div>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="margin-top: 0.5rem;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #ff4500; font-size: 0.8rem; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Hapus</button>
                                    </form>
                                </div>
                            </td>
                            <td style="padding: 1rem;">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td style="padding: 1rem; text-align: center;">
                                <div style="display: flex; align-items: center; justify-content: center; gap: 1rem;">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" style="width: 30px; height: 30px; border: 1px solid #ddd; background: white; border-radius: 5px; cursor: pointer;">-</button>
                                    </form>
                                    
                                    <span style="font-weight: 600; min-width: 20px;">{{ $item->quantity }}</span>
                                    
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" style="width: 30px; height: 30px; border: 1px solid #ddd; background: white; border-radius: 5px; cursor: pointer;">+</button>
                                    </form>
                                </div>
                            </td>
                            <td style="padding: 1rem; text-align: right; font-weight: 600; color: var(--primary-color);">Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('home') }}" class="btn btn-outline">Lanjut Belanja</a>
                <div style="text-align: right;">
                    <div style="font-size: 1.2rem; color: #666; margin-bottom: 0.5rem;">Total Belanja:</div>
                    <div style="font-size: 2rem; font-weight: 800; color: var(--primary-color); margin-bottom: 1rem;">Rp {{ number_format($totalAmount, 0, ',', '.') }}</div>
                    <a href="{{ route('cart.checkout') }}" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.2rem;">Checkout</a>
                </div>
            </div>
        @endif
    </div>

@endsection
