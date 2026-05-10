@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
    <h1>Edit Produk: {{ $product->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Update Produk</h3>
                </div>
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $product->name) }}" required>
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $product->description) }}</textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Harga (Rp)</label>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price', $product->price) }}" required>
                                    @error('price') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stok</label>
                                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" value="{{ old('stock', $product->stock) }}" required>
                                    @error('stock') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror" id="category" required>
                                <option value="frozen" {{ old('category', $product->category) == 'frozen' ? 'selected' : '' }}>Frozen Food</option>
                                <option value="grill" {{ old('category', $product->category) == 'grill' ? 'selected' : '' }}>Grill / BBQ</option>
                                <option value="drink" {{ old('category', $product->category) == 'drink' ? 'selected' : '' }}>Minuman</option>
                                <option value="other" {{ old('category', $product->category) == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Ganti Gambar Produk (Opsional)</label>
                            @if($product->image)
                                <div class="mb-2">
                                    <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/'.$product->image) }}" alt="Current Image" class="img-thumbnail" style="height: 100px;">
                                </div>
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                                    <label class="custom-file-label" for="image">Pilih file baru...</label>
                                </div>
                            </div>
                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-info ml-2">Update Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop
