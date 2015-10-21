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
                    $type = 'Checkout';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
                    <a href="{{ url('shop/checkout') }}">{{ trans('Shop::cms.checkout') }}</a><span class="line-separate"></span>
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
            @if( count( $cart ) > 0 )
            <br />
            <form class="form-design" action="{{url('/shop/edit-checkout')}}" method="post">
                {{ Form::token() }} 
                <div class="row">
                    <div class="cell-6 cart-billing-details">
                        <h3 class="title">{{ trans('Shop::cms.billing_details') }}</h3>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.first_name') }} <span class="field-required">*</span></label>
                            <input type="text" name="user[first_name]" required>
                        </div>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.last_name') }} <span class="field-required">*</span></label>
                            <input type="text" name="user[last_name]" required>
                        </div>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.email') }} <span class="field-required">*</span></label>
                            <input type="email" name="user[email]" required>
                        </div>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.phone') }} <span class="field-required">*</span></label>
                            <input type="text" name="user[phone]" required>
                        </div>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.address') }} <span class="field-required">*</span></label>
                            <input type="text" name="user[address]" required>
                        </div>
                        <div class="group-field">
                            <label>{{ trans('Shop::cms.order_notes') }}</label>
                            <textarea name="customer_message"></textarea>
                        </div>
                    </div>
                    <div class="cell-6 cart-billing-details">
                        <div class="order-review">
                            <h3 class="title">{{ trans('Shop::cms.your_order') }}</h3>
                            <table class="custom-table" style="width: 100%; margin: auto;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="right">{{ trans('Shop::cms.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $cart as $cart_item )
                                        <tr>
                                            <td class="center"><img src="{{ url( $cart_item->options->thumb ) }}" style="height: 80px;"/> x {{ $cart_item->qty }}</td>
                                            <td class="right">{{ number_format( $cart_item->price * $cart_item->qty, 2 ) }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td>Total</td>
                                            <td class="right">{{ number_format( Cart::total(), 2 ) }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <br />
                <br />
                <hr />
                <div class="row">
                    <div class="cell-12" style="text-align: right;">
                        <button class="btn btn-primary btn-payment">{{ trans('Shop::cms.proceed_to_payment') }}</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
@stop