@extends('page.layout.layout')
@section('meta')
    <title>MonoTalk - Trang chủ</title>
@endsection
@section('body')
    <main class="main-wrapper">
        <div class="owl-trend owl-theme owl-carousel">
            <?php for ($i = 1; $i <= 3; $i++) { ?>
            <div class="item">
                <div class="text-banner-home">
                    <h3>forever on trend</h3>
                    <h1>BASIC COLLECTION</h1>
                    <button class="buy-now-top">MUA NGAY</button>
                </div>
                <img src="{{ asset('./image/banner-home.jpg') }}" alt="">
            </div>
            <?php } ?>
        </div>
        <div class="container banner-wrapper">
            <div class="row">
                <div class="col-md-8 left-banner">
                    <div class="banner-text">
                        <h1>Chủ đề nổi bật</h1>
                        <h3>Meet the trends of the season</h3>
                    </div>
                    <a href="">
                        <h5>CLEAN.MINIMAL STYLE</h5>
                        <img src="{{ asset('image/banner-1-of-3.jpg') }}" alt="banner-1">
                    </a>
                    <div class="text-bottom">
                        <h1>All White</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, unde?</p>
                    </div>
                </div>
                <div class="col-md-4 right-banner">
                    <a href="">
                        <h5>CLEAN.MINIMAL STYLE</h5>
                        <img src="{{ asset('/image/banner-2-of-3.jpg') }}" alt="banner-2">
                    </a>
                    <div class="text-bottom">
                        <h1>All White</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, unde?</p>
                    </div>
                    <a href="">
                        <h5>CLEAN.MINIMAL STYLE</h5>
                        <img src="{{ asset('/image/banner-2-of-3.jpg') }}" alt="banner-2">
                    </a>
                    <div class="text-bottom">
                        <h1>All White</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, unde?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-sale-time">
            <img src="{{ asset('/image/banner-home.jpg') }}}" alt="">
        </div>
        <div class="new-product container">
            <div class="text-intro">
                <h1>Mới có ở cửa hàng</h1>
                <p>It All Arrived This Week</p>
            </div>
            <div class="row product-row product">
                <div class="owl-new all-product owl-theme owl-carousel">
                    @foreach($products as $p)
                        <div class="product-item">
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
                    <div class="animateBanner">
                        <a href="">
                            <img src="{{ asset('image/banner-last-product.jpg') }}" alt="">
                            <span class="text-info">
                            <h3>Forever on Trend</h3>
                            <button class="btn btn-link">Xem thêm</button>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="best-seller">
            <div class="text-intro">
                <h1>Sản phẩm bán chạy</h1>
                <div class="container">
                    <div class="menu-best-seller">
                        <ul class="col-xs-12 col-sm-8 col-md-6 col-lg-6 menu-wrapper">
                            <li class="menu-item"><a href="">Tất cả</a></li>
                            <li class="menu-item"><a href="">Áo sơ mi</a></li>
                            <li class="menu-item"><a href="">Áo khoác</a></li>
                            <li class="menu-item"><a href="">Quần dài</a></li>
                            <li class="menu-item"><a href="">Áo len</a></li>
                            <li class="menu-item"><a href="">Váy liền</a></li>
                            <li class="menu-item"><a href="">Phụ kiện</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container product">
                <div class="row product-row all-product">
                    @foreach($bestSeller as $p)
                        <div class="product-item col-xs-6 col-sm-6 col-md-3 col-lg-3">
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
            </div>
        </div>
        <div class="mono-girl">
            <div class="text-intro">
                <h1>#MonoTalkGirls</h1>
                <p>Meet the trends of the season</p>
            </div>
            <div class="container">
                <div class="row product-row">
                    <div class="owl-girl owl-carousel owl-theme">
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <div class="item">
                            <div class="product-item">
                                <img class="img-product" src="{{ asset('image/mono-girl.jpg') }}" alt="new-product">
                                <p>@minhlan</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

