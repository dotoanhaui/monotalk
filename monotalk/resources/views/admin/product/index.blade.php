@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Nổi bật</th>
                    <th>Số lượng</th>
                    <th>Sửa</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                        <tr class="odd gradeX" align="center">
                            <td><img src="{{$p->image}}" alt="" style="width: 100px; height: 100px; object-fit: cover;"></td>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->Brand->name}}</td>
                            <td>{{$p->Category->name}}</td>
                            <td>{{$p->noibat}}</td>
                            <td>{{$p->soluong}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('category.edit', ['id' => $c->id])}}">Sửa</a></td>
                            <td class="center delete"><i class="fa fa-trash-o  fa-fw"></i>
                                <form action="{{route('category.destroy', ['id' => $c->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" onclick="return window.confirm('Do you want to delete?')" class="btn btn-danger" value="Xóa">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<style>
    td{
        vertical-align: middle !important;
    }
</style>
<!-- /#page-wrapper -->
@endsection
