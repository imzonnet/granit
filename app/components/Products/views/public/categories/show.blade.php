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
                    $type = 'Category';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('categories') }}">Categories</a><span class="line-separate"></span>
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

            </div>
            <div class="cell-9">
                <div class="toolsBar">
                    <div class="cell-10 left products-filter-top">
                        <div class="left">
                            <span>Sort by: </span>
                            <select name="is-sort" id="is-sort">
                                <option value="data" selected="selected">Date</option>
                                <option value="price">Price</option>
                                <option>All</option>
                            </select>
                        </div>
                        <div class="left">
                            <span>Pages: </span>
                            <select>
                                <option selected="selected">20</option>
                                <option>30</option>
                                <option>50</option>
                                <option>All</option>
                            </select>
                        </div>
                        <div class="left order-asc">
                            <a href="#"><i class="fa fa-sort-amount-asc"></i></a>
                        </div>
                    </div>
                    <div class="right cell-2 list-grid">
                        <a class="list-btn" href="#" data-title="List view" data-tooltip="true"><i class="fa fa-list"></i></a>
                        <a class="grid-btn selected" href="#" data-title="Grid view" data-tooltip="true"><i class="fa fa-th"></i></a>
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="products-wrap">
                    <h2 class="block-head">Gravestones</h2>
                    <div class="product-items grid-list">
                        @foreach( $products as $product )
                        <div class="product-item cell-4 fx"  data-animate="fadeInUp">
                            <div class="product-box">
                                <h3 class="product-title"><a href="{{url('product/'.$product->alias)}}">{{$product->product_code}} {{$product->name}}</a></h3>
                                <div class="product-sale">
                                    @if($product->productColor->first()->sale > 0)
                                    <span class="discount">{{$product->productColor->first()->sale}}% </span>
                                    @endif
                                </div>
                                <div class="product-image">
                                    <a href="{{url('product/'.$product->alias)}}"><img alt="" src="{{url($product->productColor->first()->image)}}"></a>
                                </div>
                                <ul class="product-colors">
                                    @foreach($product->productColor as $index => $product_color)
                                    <li class="{{$index == 0 ? 'active' : ''}}"><a class="change-color" data-image="{{url($product_color->image)}}" data-price='{{$product_color->getPrice()}}' data-url="{{url('/design/'.$product->id.'/'.$product_color->color_id)}}" data-sale="{{$product_color->sale}}"><img src="{{url($product_color->color->icon)}}" alt="" /></a></li>
                                    @endforeach
                                </ul>
                                <div class="price-box">
                                    {{$product->productColor->first()->getPrice()}}
                                </div>
                                <div class="btn-design">
                                    <h3 class="btn btn-lg"><a href="{{url('design/'.$product->id .'/'.$product->productColor->first()->color_id)}}">Design & Order</a></h3>
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
