@section('meta_description')
    <!-- meta_description  -->
@stop

@section('meta_keywords')
    <!-- meta_keywords  -->
@stop

@section('styles')
    <!-- styles  -->
    {{ HTML::style("assets/public/exception/design/css/design.css") }}
    {{ HTML::style("assets/backend/default/plugins/data-tables/DT_bootstrap.css") }}
@stop

@section('scripts')
    <!-- scripts  -->
@stop

@section('heading')
<!-- BEGIN PAGE HEADING -->
<div class="page-title title-1">
    <div class="container">
        <div class="row">
            <div class="cell-12">
                <?php
                $menu = Menu::published()
                        ->where(function($query) {
                            $query->where('link', '=', Request::path())
                            ->orWhere('link_manual', '=', Request::path());
                        })
                        ->first();
                if ($menu) {
                    $type = $menu->title;
                } else {
                    $type = 'Cart';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('shop/cart') }}">cart</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content') 
    <!-- content  -->
    <?php // print_r( $cart ); ?>
    <div class="padd-vertical-20">
        <div class="container">
            <div class="row">
                @if( count( $cart ) > 0 )
                    <form class="form-design" action="{{url('/shop/updatecart')}}" method="post">
                        {{ Form::token() }} 
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="right">Price</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $cart as $cart_item )
                                <?php 
                                    // echo '<pre>'; print_r( $cart_item ); echo '</pre>'; 
                                    $url_remove_product = '/shop/cart/remove/' . $cart_item->rowid;
                                ?>
                                <tr>
                                    <td class="center"><a href="{{ url( $url_remove_product ) }}" class="cart-remove-item"><i class="fa fa-times"></i></a></td>
                                    <td class="center"><img src="{{ url( $cart_item->options->thumb ) }}" title="thumb" style="height: 40px;"/></td>
                                    <td class="right">{{$cart_item->price}}</td>
                                    <td class="center"><input min="1" style="padding: 5px; text-align: center; width: 64px;" type="number" name="cart[qty][{{ $cart_item->rowid }}]" value="{{$cart_item->qty}}" required></td>
                                    <td class="right"><?php echo number_format( $cart_item->price * $cart_item->qty, 2 ); ?></td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td class="actions" colspan="5">
                                        <button class="btn btn-primary">Update Cart</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                    <div class="cart-total">
                        <h4 class="title">Cart Totals</h4>
                        <table class="table-cart">
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>{{ number_format( Cart::total(), 2 ) }}</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>{{ number_format( Cart::total(), 2 ) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <a href="{{ url( 'shop/checkout' ) }}" class="btn btn-primary">Checkout</a>
                    </div>
                @else
                    Not item.
                @endif
            </div>
        </div>
    </div>
@stop