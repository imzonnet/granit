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
                    <a href="{{ url('/categories') }}">Categories</a><span class="line-separate"></span>
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
            <div class="cell-9 product-detail product-item">
                <div class="cell-4">
                    <div class="product-image">
                        <img alt="" id="img_01" src="{{url($productColor->first()->image)}}" />
                    </div>
                </div>
                <div class="cell-8">
                    <h2 class="main-color">{{$product->name}}</h2>
                    <div class="product-specs product-block list-item">
                        <label class="control-label">Color:</label>
                        <div class="thumbs">
                            <ul id="gal1" class="product-colors">
                                @foreach( $product->productColor as $index => $color )
                                @if(count($productColor) > 1)
                                    <li class="{{$index == 0 ? 'active' : ''}}">
                                @else
                                    <li class="{{$productColor->first()->color_id == $color->color_id ? 'active' : ''}}">
                                @endif
                                    <a href="#" data-url="{{url('/design/'.$product->id.'/'.$color->color_id)}}" data-price='{{$color->getPrice()}}' data-image="{{url($color->image)}}" class="change-color">
                                        <img alt="" src="{{url($color->color->icon)}}">
                                    </a><br /> 
                                    <span>{{$color->color->name}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="product-specs product-block list-item">
                        <label class="control-label">Measurements:</label>
                        <ul class="product-size">
                            <li><i class="fa fa-arrows-v"></i> Height: {{$product->height}} cm</li>
                            <li><i class="fa fa-arrows-h"></i> Width: {{$product->width}} cm</li>
                        </ul>
                    </div>
                    <div class="list-item product-block item-add">
                        <form class="form-design" action="{{url('/ldesign/'.$product->id.'/'.$productColor->first()->color_id)}}" method="get">
                            <div class="left add-items"><a href="#"><i class="fa fa-minus"></i></a></div>
                            <div class="left"><input id="items-num" value="1"></div>
                            <div class="left add-items"><a href="#"><i class="fa fa-plus"></i></a></div>
                            <div class="left"><input type="submit" value="Design & Order" class="btn btn-medium add-cart main-bg"></div>
                            <div class="left" style="margin-left: 10px;"><input type="submit" value="Design" class="btn btn-medium main-bg"></div>
                        </form>
                    </div>
                    <div class="product-specs product-block list-item">
                        <ul class="product-social product-size">
                            <li>SHARE:</li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text={{ $product->name }}&url={{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/cws/share?url={{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://plus.google.com/share?url={{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <!--
                    <div class="product-block list-item">
                        <label class="control-label">Quick Overview:</label>
                        <p>{{$product->description}}</p>
                    </div>
                    -->
                    <div class="product-specs price-block list-item last-list">
                        <label class="control-label">Price:</label>
                        <div class="price-box">
                            {{$productColor->first()->getPrice()}}
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Product Relateds -->
        <div class="row">
            <div class="product-relateds">
                <h2 class="block-head">Simular Gravestones</h2>
                <div class="product-items grid-list">
                    <div class="row">
                        @foreach( $product_relateds as $product )
                        <div class="product-item cell-3 fx"  data-animate="fadeInUp">
                            <div class="product-box">
                                <h3 class="product-title"><a class="product-url" href="{{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}">{{$product->product_code}} {{$product->name}}</a></h3>
                                <div class="product-sale">
                                    @if($product->productColor->first()->sale > 0)
                                    <span class="discount">{{$product->productColor->first()->sale}}% </span>
                                    @endif
                                </div>
                                <div class="product-image">
                                    <a class="product-url" href="{{url('product/'.$product->alias.'/'.$product->productColor->first()->color_id)}}"><img alt="" src="{{url($product->productColor->first()->image)}}"></a>
                                </div>
                                <ul class="product-colors">
                                    @foreach($product->productColor as $index => $product_color)
                                    <li class="{{$index == 0 ? 'active' : ''}}"> <a class="change-color" data-image="{{url($product_color->image)}}" data-price='{{$product_color->getPrice()}}' data-url="{{url('/design/'.$product->id.'/'.$product_color->color_id)}}" data-sale="{{$product_color->sale}}"><img src="{{url($product_color->color->icon)}}" alt="" /></a></li>
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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
<script>
    jQuery(document).ready(function ($) {
        $('.change-color').click(function (e) {
            var $this = $(this),
                    $parent = $this.parents('.product-item'),
                    url = $this.data('url');
            $('.form-design', $parent).attr('action', url);
        });
    });
</script>
@stop