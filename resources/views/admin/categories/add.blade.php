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
                                        <a href="{{route('admin.category')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">Semua Kategori</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{$message}}
                                    </div>    
                                @endif
                                <form  action="{{ route('category.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Category name" required>
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Category slug" required>
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">Submit</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
