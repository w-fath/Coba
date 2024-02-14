@extends('layouts.base')
@section('content')
<div>
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Edit Brand
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.brand')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">Semua Brand</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>                                    
                                @endif
                                <form  method="POST" action="{{ route('brand.update', $brand->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}" required>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" value="{{ $brand->slug }}" required>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-solid-default btn fw-bold mb-0 ms-0 float-end">Update</button>
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
