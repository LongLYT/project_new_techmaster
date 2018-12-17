<!-- Popup: Shopping cart items -->
<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    @php 
                    $total = 0;
                    @endphp
                    @if($cart)
                    @foreach($cart as $vl)
                    <div class="media">
                        <a class="pull-left" href="#"><img class="media-object item-image" src="/upload/product/{{$vl['photo']}}" alt=""></a>
                        <p class="pull-right item-price">{{$vl['price']}} $</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title"><a href="#">{{$vl['name']}}</a></h4>
                            <p class="item-desc">Số Lượng : {{$vl['quantity']}}</p>
                        </div>
                    </div>
                    @php 
                       $total += $vl['price'] * $vl['quantity'];
                    @endphp
                    @endforeach
                    @endif
                    <div class="media">
                        <p class="pull-right item-price">{{number_format($total)}} $</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">Subtotal</h4>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a>
                                <a href="{{ route('store.cart') }}" class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Popup: Shopping cart items -->