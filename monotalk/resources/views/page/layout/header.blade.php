<div class="{{ Route::currentRouteName() != 'page.index' ? 'category-body' : '' }}">
    <div class="filter-mobile-wrapper">
        <button class="btn-close"><i class="fal fa-times"></i></button>
        <div class="filter-list">
            <div class="title">
                <h5>Bộ lọc</h5>
            </div>
            <div class="filter-content">
                <div class="range-drag">
                    <h6>Giá</h6>
                    <div id="slider-range-mb"></div>
                </div>
                <input type="text" id="amount-mb" readonly>
                <button class="btn-filter">FILTER</button>
            </div>
        </div>
        <div class="filter-list">
            <div class="title">
                <h5>Kích cỡ</h5>
            </div>
            <ul class="filter-content size-content">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <li class="filter-item">
                    <button class="size-item">XS</button>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="filter-list">
            <div class="title">
                <h5>Màu sắc</h5>
            </div>
            <ul class="filter-content color-content d-flex">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <li class="filter-item">
                    <label for=""></label>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="filter-button">
            <button class="apply-btn">ÁP DỤNG</button>
            <button class="cancel-btn">HỦY</button>
        </div>
    </div>
    {{--<div class="container-fluid banner-top-cate" style="background-image: url({{ asset('image/banner-top-cate.jpg')}})"></div>--}}

    <div class="bg-cover">
    </div>
    <div class="nav-mobile">
        <button class="btn-close"><i class="fal fa-times"></i></button>
        <div class="search-mobile">
            <button class="btn-search-mobile"><i class="fal fa-search"></i></button>
            <input type="text" placeholder="Search...">
        </div>
        <ul class="menu-mobile">
            <li><a class="text-pale" href="{{ route('page.index') }}">Trang chủ</a></li>
            @foreach($categories as $c)
                <li class="to-mobile-lv2">
                    <a class="to-lv2 text-pale" href="{{ route('page.category', ['id' => $c->id]) }}">{{ $c->name }}</a>
                    <ul class="mobile-lv2">
                        <li><a href="">{{ $c->name }} <span>({{ $c->products()->count() }})</span></a></li>
                    </ul>
                </li>
            @endforeach
        </ul>
        <button class="btn-wish">
            <i class="fal fa-heart"></i>
            Sản phẩm ưa thích
        </button>
        <button class="btn-login" onclick="window.location.href='{{ Auth::check() ? 'javascript:void(0)' : route('login') }}'">
            <i class="fal fa-user"></i>
            {{ Auth::check() ? Auth::user()->name : 'Đăng nhập' }}
        </button>
        <div class="multi-media">
            <button><i class="fab fa-twitter"></i></button>
            <button><i class="fab fa-facebook-f"></i></button>
            <button><i class="fab fa-instagram"></i></button>
            <button><i class="fab fa-pinterest"></i></button>
            <button><i class="fab fa-youtube"></i></button>
        </div>
        <div class="info">
            <p class="phone">(+00) 123467990</p>
            <p class="email">contact@monotalk.com</p>
            <p class="copy-right"><i class="fal fa-copyright"></i> 2019 Monotalk. All Right Reserved</p>
        </div>
    </div>
    <header>
        <div class="header-top container-fluid">
            <h5>FREESHIP VỚI HÓA ĐƠN TRÊN 700.000Đ</h5>
            <span><i class="fal fa-times"></i></span>
        </div>
        <div class="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 nav-title">
                        <h3><a href="{{ route('page.index') }}">MONO TALK</a></h3>
                    </div>
                    <div class="col-md-6 nav-main">
                        <ul class="nav-wrapper">
                            @foreach($categories as $c)
                                <li class="nav-item">
                                    <a class="to-menu-lv2" href="{{ route('page.category', ['id' => $c->id]) }}">{{ $c->name }}</a>
                                    <ul class="menu-lv2">
                                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                                        <li class="nav-item-lv2">
                                            <a href="">Menu cấp 2 testtttttttt
                                                <i class="fa fa-angle-right" ></i>
                                            </a>
                                            <ul class="menu-lv3">
                                                <li class="nav-item-lv3">
                                                    <a href="">Menu cấp 3</a>
                                                </li>
                                                <li class="nav-item-lv3">
                                                    <a href="">Menu cấp 3</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3 nav-bonus">
                        <div class="col-md-3 search-form nav-bonus-item">
                            <a href="javascript:void(0)"><i style="font-size: 18px" class="fal fa-search"></i></a>
                        </div>
                        <div class="col-md-5 login-btn nav-bonus-item" style="position: relative">
                            @if(Auth::check())
                                <a class="hasLogin" href="javascript:void(0)">{{ Auth::user()->name }}
                                    <span style="margin-left: 2px"><i class="fas fa-caret-down"></i></span>
                                </a>
                                <ul class="nav-list d-none">
                                    <li class="nav-item"><a class="nav-link" href="">Tài khoản</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a></li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}">Đăng nhập</a>
                            @endif
                        </div>

                        <div class="col-md-2 cart-top nav-bonus-item" style="position:relative;">
                            <i class="fal fa-shopping-bag" style="font-size: 18px"></i>
                            <label for="">20</label>
                        </div>
                        <div class="col-md-2 wish-top nav-bonus-item"><i class="fal fa-heart" style="font-size: 18px"></i></div>
                        <div class="cart-top-content d-none">
                            <div class="col-md-4 left-side">
                                <div class="icon-cart">
                                    <i class="fal fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-md-8 right-side">
                                <b>Giỏ hàng đang trống!</b>
                                <p>Mua ngay để nhận ưu đãi</p>
                            </div>
                        </div>
                        <form action="{{ route('page.product.search') }}" class="d-none searchQ form-inline" method="GET">
                            <input type="text" name="q" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-mobile">
            <button class="toggle-mobile"><i class="fas fa-bars"></i></button>
            <h5>MONO TALK</h5>
            <button class="nav-bonus-item"><i class="fal fa-shopping-bag"></i></button>
        </div>
        <div class="filter-sort-see">
            <div class="col-xs-4 col-sm-4 filter-mobile fss-item">
                <i class="fal fa-filter"></i>
                <p>Bộ lọc</p>
            </div>
            <div class="col-xs-4 col-sm-4 sort-mobile fss-item">
                <i class="far fa-sort-amount-up-alt"></i>
                <p>Tùy chọn</p>
            </div>
            <div class="col-xs-4 col-sm-4 see-mobile fss-item">
                <button class="btn-see btn-see-2"><i class="fas fa-th-large"></i></button>
                <button class="btn-see btn-see-1"><i class="fal fa-square-full"></i></button>
            </div>
            <div class="col-xs-6 col-sm-6 sort-mobile-wrapper">
                <ul class="sort-list">
                    <li><a href="">Bán chạy nhất</a></li>
                    <li><a href="">Khuyến mãi</a></li>
                    <li><a href="">Giá tăng dần</a></li>
                    <li><a href="">Giá giảm dần</a></li>
                </ul>
            </div>
        </div>
    </header>
</div>
