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
                    $type = 'Categories';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
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
            </div>
            <div class="cell-9">
                {{ region_render('introduce') }}

                <div class="block-wrap">
                    <h2 class="block-head">{{ trans('Products::cms.gravestones') }}</h2>
                    <div class="categories-items">
                        <div class="category-item">
                            <div class="item-box">
                                <h3 class="item-title"><a href="{{url('category/all')}}">{{trans('Products::cms.product.all-gravestones')}}</a></h3>
                                <div class="item-img">
                                    <a href="{{url('category/all')}}"><img src="{{url('assets/granit/cat.png')}}" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            @foreach( $categories as $category)
                            <div class="cell-4 fx product-category category-item shop-item" data-animate="fadeInUp">
                                <div class="item-box">
                                    <h3 class="item-title"><a href="{{url('category/'.$category->alias)}}">{{get_trans($category, 'name')}}</a></h3>
                                    <div class="item-img {{ \Str::slug(strtolower(get_trans($category, 'name'))) }}">
                                        <a href="{{url('category/'.$category->alias)}}"><img alt="" src="{{url(get_trans($category, 'image'))}}"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="block-wrap">
                    <h2 class="block-head">Accessories</h2>
                    <div class="categories-items">
                        @foreach( $icon_categories as $category)
                        <div class="cell-3 fx accessories category-item shop-item" data-animate="fadeInUp">
                            <div class="item-box">
                                <h3 class="item-title"><a href="{{url('icon-category/'.$category->alias)}}">{{ get_trans($category, 'name') }}</a></h3>
                                <div class="item-img {{ \Str::slug(strtolower(get_trans($category, 'name'))) }}">
                                    <a href="{{url('icon-category/'.$category->alias)}}"><img alt="" src="{{url(get_trans($category, 'image'))}}"></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
        </div>
    </div>
</section>
@stop

