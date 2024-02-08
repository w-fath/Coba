@extends('layouts.base')
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li> 
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        @if ($items->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image}}"
                                        class=" blur-up lazyload" alt="">
                                </a> 
                            </td>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}" class="font-light">{{$item->model->name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>In Stock</p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-bold">{{$item->model->regular_price}}</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon" href="javascript:void(0)" class="icon" onclick="removeProductWishlist('{{$item->rowId}}')">
                                                <i class='far fa-trash-alt' style='font-size:13px; padding:6px; margin-left:1px; margin-righ:1px'></i>
                                            </a>
                                        </h2>
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon" onclick="moveToCart('{{$item->rowId}}')">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold">Rp{{$item->model->regular_price}}</p>
                            </td>
                            <td>
                                @if ($item->model->stock_status == "instock")
                                    <p>In Stock</p>
                                @else
                                    <p>Shock Out</p>
                                @endif
                            </td>
                            <td>
                                @if ($item->model->stock_status == 'instock')
                                    <a href="javascript:void(0)" class="icon" onclick="moveToCart('{{$item->rowId}}')">
                                        <i data-feather="shopping-cart" style='padding:5%; margin:4.3px; margin-top: 10px;'></i>
                                    </a> 
                                @else
                                    <a href="javascript:void(0)" class="icon disabled">
                                        <i data-feather="shopping-cart" style='padding:5%; margin:4.3px; margin-top: 10px;'></i>
                                    </a>
                                @endif
                                
                                <a href="javascript:void(0)" class="icon" onclick="removeProductWishlist('{{$item->rowId}}')">
                                    <i class='far fa-trash-alt' style='font-size:14px; padding:10.3px; margin-bottom: 4px'></i>
                                </a>
                            </td>
                        </tr> 
                        @endforeach                          
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end d-flex d-block justify-content-end">
                <a href="javascript:void(0)" onclick="clearWishlist()">Hapus Semua</a>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Daftar Suka Anda Kosong !</h2>
                    <h5 class="mt-3">Tambahkan item ke dalamnya sekarang</h5>
                    <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">
                        <i class="fas fa-arrow-left"></i> Lanjut Belanja
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>


<form action="{{route('wishlist.remove')}}" id="deleteFormWishlist" method="POST">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId" name="rowId"/>
</form>

<form action="{{route('wishlist.clear')}}" id="clearWishlist" method="POST">
    @csrf
    @method('delete')
</form>

<form id="moveToCart" action="{{route('wishlist.move.to.cart')}}" method="POST">
    @csrf
    <input type="hidden" id="mrowId" name="rowId"/>
</form>

@endsection

@push('scripts')
    <script>
        function removeProductWishlist(rowId)
        {
            $("#rowId").val(rowId);
            $("#deleteFormWishlist").submit();
        }
        function clearWishlist()
        {
            $("#clearWishlist").submit();
        }
        function moveToCart(rowId)
        {
            $("#mrowId").val(rowId);
            $("#moveToCart").submit();
        }
    </script>
@endpush








































<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>