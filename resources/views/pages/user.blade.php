@extends('layout.main')

@section('konten')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">USER PROFILE</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Your user profile content goes here -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Information</h5>
                        <!-- Display user information, such as name, email, etc. -->
                        <p class="card-text">User Name: Desti zulfayani</p>
                        <p class="card-text">Email: zulfayanidesti@gmail.com</p>
                        <!-- Add more user details as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
