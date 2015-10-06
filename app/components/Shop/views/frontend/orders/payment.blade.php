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
                    $type = 'Payment';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('shop/payment') }}">payment</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content') 
    <!-- content  -->
    <div class="padd-vertical-20">
        <div class="container">
            <div class="row">
                <?php 
                    $user_info = json_decode( $order->user_info ); 
                    $products_info = json_decode( $order->products );
                ?>
                <div class="user-info-content cell-6" >
                    <h4 class="title">User Info</h4>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.first_name') }}: </label>
                        <span>{{ $user_info->first_name }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.last_name') }}: </label>
                        <span>{{ $user_info->last_name }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.email') }}: </label>
                        <span>{{ $user_info->email }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.phone') }}: </label>
                        <span>{{ $user_info->phone }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.address') }}: </label>
                        <span>{{ $user_info->address }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.note') }}: </label>
                        <span>{{ $order->customer_message }}</span>
                    </div>
                    <div class="user-group">
                        <label>{{ trans('Shop::cms.shop.create_date') }}: </label>
                        <span>{{ $order->created_at }}</span>
                    </div>
                </div>
                <div class="cell-6 product-info-content">
                    <h4 class="title">Products Thumb</h4>
                    @if( count( $products_info ) > 0 )
                        @foreach( $products_info as $pitem )
                            <div class="product-payment-item">
                                <img src="{{ url( $pitem->thumb ) }}"/>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="clear"></div>
            </div>

            <div class="checkout-content-footer">
                <form action="{{ url( 'shop/do-checkout' ) }}" method="POST">
                    {{ Form::token() }}
                    <input value="{{ $order->id }}" type="hidden" name="order_id">
                    <input value="paypal_express" type="hidden" name="paymentMethod">
                    <?php 
                        $currency = isset( $settings->pp_currencyCodeType ) ? $settings->pp_currencyCodeType : 'USD';
                    ?>
                    <input type="hidden" class="form-control" name="currencyCodeType" readonly="" value="<?php echo $currency; ?>">
                    <input type="hidden" class="form-control" readonly="" value="1" name="L_PAYMENTREQUEST_0_QTY0">
                    <input type="hidden" class="form-control" readonly="" name="PAYMENTREQUEST_0_AMT" value="{{ $order->total_price }}"></input> 
                    <button id="placeOrderBtn" class="btn btn-primary btn-checkout">{{ trans('Shop::cms.shop.checkout') }} ({{ $order->total_price }} {{ $currency }})</button>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        window.paypalCheckoutReady = function () {
            paypal.checkout.setup('<?php echo $paypal->merchantID; ?>', {
                button: 'placeOrderBtn',
                environment: '<?php echo $paypal->env; ?>',
            });
        };
    </script>
    <script src="//www.paypalobjects.com/api/checkout.js" async></script>
@stop 