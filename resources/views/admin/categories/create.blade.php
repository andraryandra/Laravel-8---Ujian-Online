@extends('layouts.appAdmin')

@section('category')

@include('admin.component.navbar')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
    <div class="row">
    
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
        <p class="">Fitur pada bagian Category ini berfungsi untuk menambahkan Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK .</p>
            </div>
            <div class="m-3">
                <a href="/categories" class="btn btn-secondary">Kembali</a>
            </div>
            <form action="/categories/store" method="post">
                @csrf

            <div class="m-3">
                <label for="name_category" class="pb-2 fw-bold">{{ __('Name Category') }}</label>
                <input type="text" class="form-control" placeholder="Name Category" name="name_category" value="{{ old('name_category') }}" required>
            </div>  


        <div class="m-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-warning">RESET</button>
        </div>

    </form>
        </div>
    </div>

     </div>
    @include('admin.component.footer')
</div>    
    

@endsection


{{-- <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Posts</h4>
                </div>
                <div class="m-3">
                    <a href="/categories" class="btn btn-secondary">Kembali</a>
                    </div>
                    <form action="/categories/store" method="post">
                        @csrf

                    <div class="m-3">
                        <label for="name_category" class="pb-2 fw-bold">{{ __('Name Category') }}</label>
                        <input type="text" class="form-control" placeholder="Name Category" name="name_category" value="{{ old('name_category') }}" required>
                    </div>  
  

                <div class="m-3">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </div>

            </form>
            </div>
        </div>
    </div> --}}
