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
                    $type = $product->name;
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('products') }}">Products</a><span class="line-separate">/</span>
                    <a href="#">{{$product->name}}</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
<div class="sectionWrapper">
    <div class="container">
        @if( $current_user->hasAccess('products.destroy') )
        <div class="row">
            <div class="clearfix padd-bottom-15">
                <div class="left">Edit</div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="cell-12">
                <div class="row">
                    <div class="cell-4">
                        <div class="product-img">
                            <img alt="" id="img_01" src="{{url($product->image)}}" />
                        </div>
                    </div>
                    <div class="cell-8">
                        <div class="product-specs price-block list-item">
                            <div class="price-box"><span class="product-price">${{$product->price}}</span></div>
                        </div>
                        
                        <div class="list-item product-block item-add">
                            <a href="#" class="btn btn-medium add-cart main-bg"><i class="fa fa-cut"></i>Order and Design</a>
                        </div>
                        <div class="list-item last-list">
                            <label class="control-label"><i class="fa fa-align-justify"></i>Quick Overview:</label>
                            <p>Pellentesque tincidunt purus ac condimentum adipiscing. Nulla interdum lacus erat, at pellentesque quam eleifend id. Fusce aliquet, ante cursus gravida sagittis, justo erat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="padd-top-20"></div>
            <hr class="hr-style5">
            <div class="clearfix padd-bottom-20"></div>
            <div class="cell-12">
                <div class="">
                    <div id="tabs" class="tabs">
                        <ul>
                            <li class="skew-25 active"><a href="#" class="skew25">Description</a></li>
                            <li class="skew-25"><a href="#" class="skew25">Shipping the product</a></li>
                        </ul>
                        <div class="tabs-pane">
                            <div class="tab-panel active">
                                {{$product->description}}
                            </div>
                            <div class="tab-panel">
                                Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

