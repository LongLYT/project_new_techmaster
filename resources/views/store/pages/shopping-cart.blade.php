@extends('store.layouts.master')
@section('content')
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Shopping Cart</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section color">
            <div class="container">
                <h3 class="block-title alt"><i class="fa fa-angle-down color"></i>1. Account</h3>
                <form action="{{route('store.place_order')}}" method="POST" id="order-form">
                    @csrf
                        <div class="row ">
                            <div class="col-md-6">
                                <a class="btn btn-theme btn-block btn-icon-left facebook" href="#"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-theme btn-block btn-icon-left twitter" href="#"><i class="fa fa-twitter"></i>Sign in with Twitter</a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="User name or email"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="password" placeholder="Your password"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right-md">
                                <a class="forgot-password" href="#">Forgot your password ?</a>
                            </div>
                            <div class="col-md-12">
                                <p class="btn-row"><a class="btn btn-theme btn-theme-dark" href="#">Login</a> <span class="text"> or </span> <a class="btn btn-theme btn-theme-dark" href="#">Create account</a></p>
                            </div>
                        </div>
                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>2. Orders</h3>
                    <div class="row orders">
                        <div class="col-md-8">
                            <form action="{{route('store.update_cart_post')}}" method="POST">
                                @csrf
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="25%">Image</th>
                                        <th width="5%">Quantity</th>
                                        <th width="50%">Product Name</th>
                                        <th width="20%">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $totalPrice = 0; @endphp
                                    @if ($cart)
                                        @foreach($cart as $id => $product)
                                            <tr>
                                                <td class="image"><a class="media-link" href="#"><i class="fa fa-plus"></i><img width="130px" src="/upload/product/{{$product['photo']}}" alt=""></a></td>
                                                <td class="quantity"><input size="3" type="text" value="{{$product['quantity']}}" name="{{$id}}" /></td>
                                                <td class="description">
                                                    <h4><a href="{{route('store.detail_product', ['id' => $id])}}">{{$product['name']}}</a></h4>
                                                </td>
                                                <td class="total">{{number_format($product['price'] * $product['quantity'])}}
                                                    <a href="{{route('store.delete_from_cart', ['product_id' => $id])}}"><i class="fa fa-close"></i></a></td>
                                            </tr>
                                            @php $totalPrice += $product['price'] * $product['quantity'] @endphp
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <button class="btn btn-theme btn-theme-dark btn-block">Cập Nhật Đơn Hàng</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <h3 class="block-title"><span>Shopping cart</span></h3>
                            <div class="shopping-cart">
                                <table>
                                    <tbody><tr>
                                        <td>Thành tiền:</td>
                                        <td>{{number_format($totalPrice)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping:</td>
                                        <td>30,000</td>
                                    </tr>
                                    </tbody><tfoot>
                                    <tr>
                                        <td>Total:</td>
                                        <td>{{number_format($totalPrice + 30000)}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Send a Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter your coupon code">
                                </div>
                                <button class="btn btn-theme btn-theme-dark btn-block">Apply Coupon</button>
                            </div>
                        </div>
                    </div>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>3. Thông tin người đặt hàng</h3>
                    <form action="#" class="form-delivery">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Họ và tên" name="fullname"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Địa chỉ" name="address"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Email" name="email"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Điện thoại" name="phone"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><textarea class="form-control" placeholder="Ghi chú" name="note" id="id" cols="30" rows="10"></textarea></div>
                            </div>
                        </div>
                    </form>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>4. Phương thức thanh toán</h3>
                    <div class="panel-group payments-options" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4>
                                    <input type="radio" name="payment-method" value="cod"><label for="payment-method">  COD</label>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4>
                                    <input type="radio" name="payment-method" value="credit"><label for="payment-method">  Credit Card</label>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3"></div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading4">
                                <h4>
                                    <input type="radio" name="payment-method" value="credit"><label for="payment-method">  ATM</label>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4"></div>
                        </div>
                    </div>
                    <div class="overflowed">
                        <a class="btn btn-theme btn-theme-dark" href="#">Home Page</a>
                        <button type="submit" class="btn btn-theme pull-right" id="place-order">Đặt Hàng</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">
                <div class="row blocks shop-info-banners">
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-gift"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Buy 1 Get 1</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-comments"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Call to Free</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-trophy"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Money Back!</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE -->
    </div>
@endsection
