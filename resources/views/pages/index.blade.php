@extends('layouts.main')

@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Produk</h3>
                        <a href="/products/tambah" class="btn btn-primary float-right">+ Tambah Produk Baru</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Category</th>
                                    <th>Product code</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $p)
                                    <tr>
                                        <td>{{ $p->product_name }}</td>
                                        <td>{{ $p->category_id }}</td>
                                        <td>{{ $p->product_code }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->stock }}</td>
                                        <td>
                                            <a href="/products/edit/{{ $p->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/products/hapus/{{ $p->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
@endsection
