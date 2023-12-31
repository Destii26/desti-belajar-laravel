@extends('layout.main')

@section('konten')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">DATA PRODUK</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if($role == 'admin')
                        <a href="{{ route('products.create') }}" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah produk</a>
                        @endif
                        <div class="float-right">
                            <form id="search" method="get" action="{{ url('products') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Produk" value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari...</button>
                                    </div>
                                    <div class="input-group-append">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Kode produk</th>
                                    <th>deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    @if($role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Product as $row)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    
                                    <td><?php
                                    // Mengambil path gambar dari database
                                    $imagePathFromDatabase = $row->image;
                    

                                    // Menghapus tanda "[" dan "]" dari string
                                    $imagePathFromDatabase = trim($imagePathFromDatabase, '[]');
                                    $imagePathFromDatabase = str_replace('"', '', $imagePathFromDatabase);


                                    // Mecah string berdasarkan tanda "/" 
                                    $explodedPaths = explode('/', $imagePathFromDatabase);

                                    // Ambil bagian terakhir dari array hasil pecahan sebagai nama file gambar
                                    $fileName = end($explodedPaths);
    
                                  
                                    ?>
                                        <img src="{{ asset('storage/uploads/'.$fileName) }}" alt="gambar" class="rounded" style="width: 150px;">

                                      
                                    </td>
                                    <td>{{ $row['product_name'] }}</td>
                                    <td>{{ $row->category->category_name }}</td>
                                    <td>{{ $row['product_code'] }}</td>
                                    <td>{{ $row['description'] }}</td>
                                    <td>{{ $row['price'] }}</td>
                                    <td>{{ $row['stock'] }}</td>
                                
                                    <td>
                                        @if($role == 'admin')
                                        <a href="{{ route('products.edit', $row['id']) }}" class="btn btn-success">edit</a>
                                        <form action="{{ route('products.delete', $row['id']) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data produk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                           
                            </tfoot>
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $Product->links() }}
                            </ul>
                        </div>
                    </div>
                    <!--card body-->
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection