<!-- resources/views/pages/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <form action="/products/{{ $product->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $product->nama }}" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $product->kategori }}" required>
            </div>

            <div class="form-group">
                <label for="kode_produk">Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control" value="{{ $product->kode_produk }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ $product->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $product->stok }}" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Update Product" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection