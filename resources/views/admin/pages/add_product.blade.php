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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm sản phẩm</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate="" action="{{route('admin.add_product_post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" required="" name="name" value="{{old('name')}}">
                                    <span class="error">
                                        @if ($errors->get('name'))
                                            @foreach($errors->get('name') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input type="email" class="form-control" required="" name="price" value="{{old('price')}}">
                                    <span class="error">
                                        @if ($errors->get('price'))
                                            @foreach($errors->get('price') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Giá giảm</label>
                                    <input type="email" class="form-control" required="" name="sale-price">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value=""></option>
                                        @foreach($cats as $cat)
                                            @if ($cat->id == old('category'))
                                                <option selected="selected" value="{{$cat->id}}">{{$cat->name}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="error">
                                        @if ($errors->get('category'))
                                            @foreach($errors->get('category') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="text" class="form-control" name="stock" value="{{old('stock')}}">
                                    <span class="error">
                                        @if ($errors->get('stock'))
                                            @foreach($errors->get('stock') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu</label>
                                    <input type="text" class="form-control" name="brand-name" value="{{old('brand-name')}}">
                                    <span class="error">
                                        @if ($errors->get('brand-name'))
                                            @foreach($errors->get('brand-name') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Kích cỡ</label>
                                    <input type="text" class="form-control" name="size" value="{{old('size')}}">
                                    <span class="error">
                                        @if ($errors->get('size'))
                                            @foreach($errors->get('size') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <div class="body">
                                        <input type="file" class="dropify" name="feature-image">
                                    </div>
                                    <span class="error">
                                        @if ($errors->get('feature-image'))
                                            @foreach($errors->get('feature-image') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm (4 ảnh)</label>
                                    <input type="file" class="form-control" id="product-image" name="photos[]" multiple onchange="preview_images()"/>
                                    <span class="error">
                                        @if ($errors->get('photos'))
                                            @foreach($errors->get('photos') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                    <div class="row" id="image_preview"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sơ lược</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="description">{{old('description')}}</textarea>
                                    <span class="error">
                                        @if ($errors->get('description'))
                                            @foreach($errors->get('description') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Thông tin sản phẩm chi tiết</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" id="ckeditor" name="properties">{{old('properties')}}</textarea>
                                    <span class="error">
                                        @if ($errors->get('properties'))
                                            @foreach($errors->get('properties') as $error)
                                                <div class="ui pointing red basic label">
                                                  {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function preview_images()
        {
            var total_file=document.getElementById("product-image").files.length;

            for(var i=0;i<total_file;i++)
            {
                $('#image_preview').append("<div class='col-md-3'><img width='300px' height='300px' class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
            }
        }
    </script>
@endsection
