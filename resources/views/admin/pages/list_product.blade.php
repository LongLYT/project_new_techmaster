@extends('admin.layouts.master')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Quản lý sản phẩm</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Danh sách sản phẩm</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0 c_list">
                                    <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="20%">Tên sản phẩm</th>
                                        <th width="30%">Ảnh đại diện</th>
                                        <th width="30%">Mô tả</th>
                                        <th width="15%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->id}}
                                        </td>
                                        <td>
                                            {{$product->name}}
                                        </td>
                                        <td>
                                            <img width="250px" src="/upload/product/{{$product->image}}" alt="">
                                        </td>
                                        <td>
                                            @php echo substr($product->description, 0, 100); @endphp
                                        </td>
                                        <td>
                                            <a href="">
                                                <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="{{route('admin.delete_product', ['id' => $product->id])}}">
                                                <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('admin.add_product')}}"> <button type="button" class="btn btn-warning"><i class="fa fa-plus-square"></i> <span>Thêm sản phẩm mới</span></button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
