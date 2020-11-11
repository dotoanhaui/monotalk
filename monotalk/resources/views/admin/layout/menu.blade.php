<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li >
                <a class="color-fix"><i class="fa fa-bar-chart-o fa-fw"></i>Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="color-fix" href="{{route('category.index')}}">List</a>
                    </li>
                    <li>
                        <a class="color-fix" href="{{route('category.create')}}">Add</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a class="color-fix"><i class="fa fa-sliders"></i> Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="color-fix" href="admin/slide/danhsach">List</a>
                    </li>
                    <li>
                        <a class="color-fix" href="admin/slide/them">Add</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a class="color-fix"><i class="fa fa-sliders"></i>Brand<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="color-fix" href="{{route('brand.index')}}">List</a>
                    </li>
                    <li>
                        <a class="color-fix" href="{{route('brand.create')}}">Add</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a class="color-fix"><i class="fa fa-newspaper-o"></i>Product<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="color-fix" href="{{route('product.index')}}">List</a>
                    </li>
                    <li>
                        <a class="color-fix" href="{{route('product.create')}}">Add</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a class="color-fix" href="admin/user/danhsach"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="color-fix" href="admin/user/danhsach">Danh sách</a>
                    </li>
                    <li>
                        <a class="color-fix" href="admin/user/them">Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<style>
    .color-fix{
        color: #ff8100 !important;
    }
</style>
