@extends('page.layout.layout')
@section('meta')
    <title>MonoTalk - {{ $category->name }}</title>
@endsection
@section('body')
    <main class="main-wrapper">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <ul class="breadcrumb">
                    <li><a href="">Trang chủ </a></li>
                    <li><a href="">{{ $category->name }} </a></li>
                </ul>
            </div>
            <div class="text-intro">
                <h1>{{ $category->name }}</h1>
                <p>It All Arrived This Week</p>
            </div>
            <div class="row filter-product">
                <div class="col-md-3 filter">
                    <div class="filter-list">
                        <div class="title">
                            <h5>Bộ sưu tập</h5>
                            <i class="far fa-chevron-down"></i>
                        </div>
                        <ul class="filter-content">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <li><a href="">All White</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="filter-list">
                        <div class="title">
                            <h5>Categories</h5>
                            <i class="far fa-chevron-down"></i>
                        </div>
                        <ul class="filter-content">
                            @foreach($categories as $c)
                                <li><a href="{{ route('page.category', ['id' => $c->id]) }}">{{ $c->name }} <span>({{ $c->products->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-list">
                        <div class="title">
                            <h5>Bộ lọc</h5>
                            <i class="far fa-chevron-down"></i>
                        </div>
                        <div class="filter-content">
                            <div class="range-drag">
                                <h6>Giá</h6>
                                <div id="slider-range"></div>
                            </div>
                            <input type="text" id="amount" readonly>
                            <button class="btn-filter">FILTER</button>
                        </div>

                    </div>
                    @foreach($category->attributes()->pluck('name') as $name)
                        @if($name != 'Màu sắc')
                            <div class="filter-list">
                                <div class="title">
                                    <h5>{{ $name }}</h5>
                                    <i class="far fa-chevron-down"></i>
                                </div>
                                <ul class="filter-content">
                                    @if($sizes)
                                        @foreach($sizes as $s)
                                            <li class="filter-item">
                                                @if(Request::all())
                                                    @foreach(Request::all() as $key => $value)
                                                        @if($s->attribute->code == $key && $s->value == $value)
                                                            <input type="checkbox" class="larger color-filter" value="{{ '?' . $s->attribute->code . '=' . $s->value }}" checked="">
                                                        @else
                                                            <input type="checkbox" class="larger color-filter" value="{{ '?' . $s->attribute->code . '=' . $s->value }}">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <input type="checkbox" class="larger color-filter" value="{{ '?' . $s->attribute->code . '=' . $s->value }}">
                                                @endif
                                                <p>{{ $s->name }}</p>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @endif
                    @endforeach

                    <div class="filter-list">
                        <div class="title">
                            <h5>Màu sắc</h5>
                            <i class="far fa-chevron-down"></i>
                        </div>
                        <ul class="filter-content">
                            @foreach($colors as $c)
                                <li class="filter-item">
                                    @foreach(Request::all() as $key => $value)
                                        @if($c->attribute->code == $key && $c->value == $value)
                                            <input type="checkbox" class="larger color-filter" value="{{ '?' . $c->attribute->code . '=' . $c->value }}" checked="">
                                        @else
                                            <input type="checkbox" class="larger color-filter" value="{{ '?' . $c->attribute->code . '=' . $c->value }}">
                                        @endif
                                    @endforeach
                                    <label for="" style="background: {{ '#' . $c->content }}"></label>
                                    <p>{{ $c->name }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 product">
                    <div class="row row-top">
                        <div class="col-md-6 result">
                            <p>We found <span><b>{{ $count }} </b></span> products available for you</p>
                        </div>
                        <div class="col-md-6 see-sort">
                            <div class="col-md-4 see">
                                <p>See</p>
                                <button class="btn-see btn-see-3"><i class="fas fa-th"></i></button>
                                <button class="btn-see btn-see-2"><i class="fas fa-th-large"></i></button>
                            </div>
                            <div class="col-md-8 sort">
                                <i class="far fa-sort-amount-up-alt"></i>
                                <p>Sắp xếp: <span class="sort-by"><b>Tùy chọn</b></span></p>
                                <i class="fal fa-chevron-down"></i>
                                <ul class="sort-list">
                                    <li><a href="{{ route('page.category', ['id' => $category->id]) }}">Tùy chọn</a></li>
                                    <li><a href="{{ route('page.category.sort', ['id' => $category->id, 'sort' => 'id_desc']) }}">Mới nhất</a></li>
                                    <li><a href="{{ route('page.category.sort', ['id' => $category->id, 'sort' => 'name_asc']) }}">A-Z</a></li>
                                    <li><a href="{{ route('page.category.sort', ['id' => $category->id, 'sort' => 'name_desc']) }}">Z-A</a></li>
                                    <li><a href="{{ route('page.category.sort', ['id' => $category->id, 'sort' => 'price_asc']) }}">Giá tăng dần</a></li>
                                    <li><a href="{{ route('page.category.sort', ['id' => $category->id, 'sort' => 'price_desc']) }}">Giá giảm dần</a></li>
                                </ul>
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
                                    @foreach(App\ChildProduct::where('product_id', $p->id )->get() as $child)
                                        <label for="" class="color" data-src="{{ asset($child->image) }}" style="background: {{ '#' . $child->color->content }}"></label>
                                    @endforeach
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
@endsection
@section('script')
    <script src="{{ asset('js/category.js') }}"></script>
@endsection
