<!-- resources/views/home/index.blade.php -->

@extends('layouts.main')

@section('konten')
    <div class="container">
        <!-- ... (elemen formulir HTML lainnya) ... -->

        <form action="/tambahData" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="number" name="category" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="number" name="product_code" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Tambah Data" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
