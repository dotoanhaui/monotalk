@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Child Product
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('child_product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Parent Product</label>
                            <select name="product" id="product" class="form-control">
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}" {{ old('product') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Color</label>
                            <select name="color" id="color" class="form-control">
                                @foreach($colors as $c)
                                    <option value="{{ $c->id }}" {{ old('color') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Size</label>
                            <select name="size" id="size" class="form-control">
                                @foreach($sizes as $s)
                                    <option value="{{ $s->id }}" {{ old('size') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Old Price</label>
                            <input type="text" name="old_price" class="form-control" placeholder="Old Price" value="{{ old('old_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input class="form-control" style="border:none" type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" class="form-control" placeholder="quantity" name="quantity">
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
