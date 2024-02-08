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

@endsection