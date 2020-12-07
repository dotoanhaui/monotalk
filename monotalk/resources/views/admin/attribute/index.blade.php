@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Attribute
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
                        <th>Code</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @if(!$attributes->isEmpty())
                        <tbody>
                        @foreach($attributes as $a)
                            <tr class="odd gradeX" align="center">
                                <td>{{$a->id}}</td>
                                <td>{{$a->name}}</td>
                                <td>{{$a->code}}</td>
                                <td>
                                    @foreach($a->categories->pluck('name') as $key => $value)
                                        <label for="" class=" pl-1 pr-1 p-1">{{ $value }}</label>
                                    @endforeach
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('attribute.edit', ['id' => $a->id])}}">Edit</a></td>
                                <td class="center delete"><i class="fa fa-trash-o  fa-fw"></i>
                                    <form action="{{route('attribute.destroy', ['id' => $a->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return window.confirm('Do you want to delete?')" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <p>chưa có attribute</p>
                    @endif
                </table>
            </div>
            <div class="pagination">
                {{$attributes->appends($_GET)->links()}}
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
