@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brand
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $b)
                        <tr class="odd gradeX" align="center">
                            <td>{{$b->id}}</td>
                            <td>{{$b->name}}</td>
                            <td>{{$b->category->name}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('brand.edit', ['id' => $b->id])}}">Edit</a></td>
                            <td class="center delete"><i class="fa fa-trash-o  fa-fw"></i>
                                <form action="{{route('brand.destroy', ['id' => $b->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" onclick="return window.confirm('Do you want to delete?')" class="btn btn-danger" value="Delete">
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
