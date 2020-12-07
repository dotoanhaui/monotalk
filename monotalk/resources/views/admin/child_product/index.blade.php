@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Child Product
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
                        <th>Parent Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @if(!$childProducts->isEmpty())
                        <tbody>
                        @foreach($childProducts as $p)
                            <tr class="odd gradeX" align="center">
                                <td><img src="{{asset($p->image)}}" alt="{{$p->name}}" style="width: 100px; height: 100px; object-fit: cover;"></td>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->product->name}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->quantity}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('child_product.edit', ['id' => $p->id])}}">Edit</a></td>
                                <td class="center delete"><i class="fa fa-trash-o  fa-fw"></i>
                                    <form action="{{route('child_product.destroy', ['id' => $p->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return window.confirm('Do you want to delete?')" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <p>chưa có sản phẩm</p>
                    @endif
                </table>
            </div>
            <div class="pagination">
                {{$childProducts->appends($_GET)->links()}}
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
