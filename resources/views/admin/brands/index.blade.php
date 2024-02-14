@extends('layouts.base')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e87316;">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-center text-light px-3" href='{{route('admin.index')}}'>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="{{route('admin.category')}}">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="{{route('admin.product')}}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="{{route('admin.brand')}}">Brand</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="#">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center text-light px-3" href="#">Message</a>
            </li>
        </ul>
    </div>
</nav>
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        .jarak {
            margin-right: 15px;
        }
    </style>
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        .jarak {
            margin-right: 15px;
        }
    </style>
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Brands
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('brand.create')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">+ Tambah Brand</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Slug</th>
                                            <th style="margin-right: 50px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($brands->currentPage() - 1) * $brands->perPage();
                                        @endphp                                    
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->id }}</td>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->slug }}</td>
                                                <td>
                                                    <a href="{{ route('brand.destroy', $brand->id) }}" class="btn btn-danger float-end" onclick="event.preventDefault(); confirmDelete('{{ $brand->id }}')">
                                                        <i class="fa fa-edit"></i> Hapus
                                                    </a> 
                                                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning jarak float-end">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>                                                   
                                                    
                                                    <script>
                                                        function confirmDelete(brandId) {
                                                            var result = confirm("Apakah Anda yakin ingin menghapus kategori ini?");
                                                            if (result) {
                                                                document.getElementById('delete-form-' + brandId).submit();
                                                            }
                                                        }
                                                    </script>

                                                    <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$brands->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</div>
@endsection
