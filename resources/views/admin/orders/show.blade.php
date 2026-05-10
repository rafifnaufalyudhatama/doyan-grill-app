@extends('adminlte::page')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content_header')
    <h1>Detail Pesanan #{{ $order->id }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Customer Info -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Informasi Pelanggan</h3>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-user mr-1"></i> Nama</strong>
                    <p class="text-muted">{{ $order->customer_name }}</p>
                    <hr>
                    <strong><i class="fas fa-phone mr-1"></i> No. Telepon</strong>
                    <p class="text-muted">{{ $order->customer_phone }}</p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Pengiriman</strong>
                    <p class="text-muted">{{ $order->customer_address }}</p>
                </div>
            </div>

            <!-- Order Status -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Status Pesanan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>PROCESSING</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>COMPLETED</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>CANCELLED</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Status</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Order Items -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->product->image ? (str_starts_with($item->product->image, 'http') ? $item->product->image : asset('storage/'.$item->product->image)) : 'https://via.placeholder.com/150' }}" alt="" class="img-thumbnail mr-2" style="width: 40px;">
                                        {{ $item->product->name }}
                                    </div>
                                </td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-right">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">TOTAL</th>
                                <th class="text-right">Rp {{ number_format($order->total_price, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-default">Kembali</a>
                    <a href="{{ route('order.invoice', $order->id) }}" target="_blank" class="btn btn-info float-right">
                        <i class="fas fa-print"></i> Cetak Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
