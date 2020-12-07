@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Size
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
                        <th>Value</th>
                        <th>Attribute</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $s)
                        <tr class="odd gradeX" align="center">
                            <td>{{$s->id}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->value}}</td>
                            <td>{{$s->attribute->name}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('size.edit', ['id' => $s->id])}}">Edit</a></td>
                            <td class="center delete"><i class="fa fa-trash-o  fa-fw"></i>
                                <form action="{{route('size.destroy', ['id' => $s->id])}}" method="POST">
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
            <div class="pagination">
                {{$sizes->appends($_GET)->links()}}
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
