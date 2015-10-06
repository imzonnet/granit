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
                    <a href="{{ url('category') }}">Category</a><span class="line-separate"></span>
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
                <div class="block-wrap">
                    <h2 class="block-head">Accessories</h2>
                    <div class="categories-items">
                        @foreach( $icons as $category)
                        <div class="cell-3 fx accessories-item category-item" data-animate="fadeInUp">
                            <div class="item-box">
                                <h3 class="item-title"><a href="#">{{ get_trans($category, 'name') }}</a></h3>
                                <div class="item-img">
                                    <a href="#"><img alt="" src="{{url($category->image)}}"></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="pager skew-25">
                    {{$icons->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
@stop