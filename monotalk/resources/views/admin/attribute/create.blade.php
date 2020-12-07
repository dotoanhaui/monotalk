@extends('admin.layout.index')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Attribute
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
                    <form action="{{route('attribute.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="nhập tên attribute" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" placeholder="nhập mã code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="categories[]" class="form-control select2" multiple>
                                @foreach ($categories as $c)
                                    @if (is_array(old('categories')))
                                        <option value="{{ $c->id }}" {{ in_array($c->id, old('categories')) ? 'selected' : '' }}>{{ $c->name }}</option>
                                    @else
                                        <option value="{{ $c->id }}" {{ old('categories') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                    @endif
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

