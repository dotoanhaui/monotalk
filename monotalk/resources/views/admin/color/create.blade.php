@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Color
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
                    <form action="{{route('color.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên màu">
                        </div>
                        <div class="form-group">
                            <label>Value</label>
                            <input type="text" class="form-control" name="value" placeholder="nhập value">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input type="text" class="form-control" name="content" placeholder="Nhập mã màu">
                        </div>
                        <div class="form-group">
                            <label>Attribute</label>
                            <select class="form-control" name="attribute">
                                @foreach($attributes as $a)
                                    <option value="{{$a->id}}" {{old('attribute') == $a->id ? 'selected' : ''}}>{{$a->name}}</option>
                                @endforeach
                            </select>
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
