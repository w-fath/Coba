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
                                        All Product
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('product.create')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">+ Tambah Product</a>
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
                                            <th>Stoct</th>
                                            <th>Harga</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id}} </td>
                                            <td>{{ $product->name}} </td>
                                            <td>{{ $product->slug}} </td>
                                            <td>{{ $product->stock_status}} </td>
                                            <td>{{ $product->regular_price}}</td>
                                            <td>{{ $product->quantity}}</td>
                                            <td >
                                                <a href="" class="btn btn-danger float-end">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                                <a href="" class="btn btn-warning jarak float-end">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
