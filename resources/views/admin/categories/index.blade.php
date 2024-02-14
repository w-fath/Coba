@extends('layouts.base')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e87316;">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
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
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Category
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('category.create')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">+ Tambah Kategori</a>
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
                                            $i = ($categories->currentPage()-1)*$categories->perPage();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger float-end" onclick="event.preventDefault(); confirmDelete('{{ $category->id }}')">
                                                        <i class="fa fa-edit"></i> Hapus
                                                    </a> 
                                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning jarak float-end">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>                                                   
                                                    
                                                    <script>
                                                        function confirmDelete(categoryId) {
                                                            var result = confirm("Apakah Anda yakin ingin menghapus kategori ini?");
                                                            if (result) {
                                                                document.getElementById('delete-form-' + categoryId).submit();
                                                            }
                                                        }
                                                    </script>

                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
