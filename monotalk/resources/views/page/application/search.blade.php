@extends('page.layout.layout')
@section('meta')
    <title>Tìm kiếm {{ $q }}</title>
@endsection
@section('body')
    <main class="main-wrapper">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <ul class="breadcrumb">
                    <li><a href="">Trang chủ </a></li>
                    <li><a href="">Tìm kiếm</a></li>
                </ul>
            </div>
            <div class="text-intro">
                <h1>Tìm kiếm - {{ $q }}</h1>
            </div>
            <div class="row filter-product">
                <div class="col-md-12 product">
                    <div class="row row-top">
                        <div class="col-md-6 result">
                            <p>We found <span><b>{{ $products->count() }} </b></span> products available for keyword <b>"{{ $q }}"</b></p>
                        </div>
                        <div class="col-md-6 see-sort">
                            <div class="col-md-4 see">
                                <p>See</p>
                                <button class="btn-see btn-see-3"><i class="fas fa-th"></i></button>
                                <button class="btn-see btn-see-2"><i class="fas fa-th-large"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row all-product">
                        @foreach($products as $p)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                <div class="wishlist">
                                    <button class="btn wishlist-btn wishlist-btn--round" type="button">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                                <a href=""><img class="img-product" src="{{ asset($p->image) }}" alt="{{ $p->name }}"></a>
                                <div class="product-info">
                                    <h3 class="product-name"><a href="">{{ $p->name }}</a></h3>
                                    <div class="product-price">
                                        <p class="">{{ number_format($p->price, 0) }}đ</p>
                                        @if ($p->old_price)
                                            <del class="old-price">{{ number_format($p->old_price, 0) }}đ</del>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-color">
                                    <label for="" class="color" style="background: gray"></label>
                                    <label for="" class="color" style="background: black"></label>
                                    <label for="" class="color" style="background: brown"></label>
                                </div>
                                <div class="product-action">
                                    <button class="btnBuyNow">MUA NGAY</button>
                                    <button class="btnDetail">XEM CHI TIẾT</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row pagination">
                        {{ $products->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .see-sort, .see {
            display: flex;
            justify-content: flex-end;
        }
    </style>
@endsection
