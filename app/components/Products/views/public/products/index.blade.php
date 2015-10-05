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
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('products') }}">Products</a><span class="line-separate"></span>
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
                <div class="widget menu-categories fx animated fadeInLeft undefined" style="">
                    <div class="catalogue gry-bg padd-horizontal-10 center">
                        <h1 class="main-color">SPECIAL <br />OFFER</h1>
                        <img src="{{url('assets/granit/product.png')}}" alt="" />                      
                        <p><a class="btn more-btn" href="#">Read</a></p>
                    </div>
                </div>
                <div class="widget menu-categories fx animated fadeInLeft undefined" style="">
                    <div class="catalogue main-bg padd-vertical-10 center">
                        <h1>Catalogue</h1>
                        <img src="{{url('uploads/images/news.png')}}">                        
                        <p><a class="btn more-btn" href="#">Read</a></p>
                    </div>
                </div>
            </div>
            <div class="cell-9">
                <div class="slideshow padd-bottom-30">
                    <div class="cell-6">
                        <h1 class="main-color">SPECIAL <br />OFFER</h1>
                        <h3>All included!</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                        <a class="btn btn-large main-bg" href="#">Read More</a>
                    </div>
                    <div class="cell-6">
                        <img src="{{url('assets/granit/product.png')}}" alt="" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="products-wrap">
                    <h2 class="block-head">Gravestones</h2>
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

