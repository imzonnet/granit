{{-- Update the Meta Description --}}
@section('meta_description')

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

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
                    $type = 'Products';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
                    <a href="{{ url('products') }}">{{ trans('Products::home.products') }}</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
<section class="sectionWrapper">
    <div class="container">
        <div class="row">
            <div class="cell-3">
                @include('Products::public._layouts.sidebar')

            </div>
            <div class="cell-9">
                {{ region_render('introduce') }}
                <div class="products-wrap">
                    <h2 class="block-head">{{trans('Products::home.gravestones')}}</h2>
                    <div class="product-items">
                        @foreach( $products as $product )
                        <div class="cell-4 fx product-item shop-item" data-animate="fadeInUp">
                            <div class="item-box">
                                <h3 class="item-title"><a href="{{url('products/'.$product->alias)}}">{{get_trans($product, 'name')}}</a></h3>
                                <div class="item-img">
                                    <a href="{{url('products/'.$product->alias)}}"><img alt="" src="{{url($product->thumbnail)}}"></a>
                                </div>
                                <div class="item-details">
                                    <p> {{ get_trans($product, 'description') }} </p>
                                    <div class="left">
                                        <div class="item-price">${{$product->price}}</div>
                                    </div>
                                    <div class="right">
                                        <a href="{{url('/design')}}"><div class="item-price"><i class="fa fa-shopping-cart"></i> {{ trans('cms.design') }}</div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="pager skew-25">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop

