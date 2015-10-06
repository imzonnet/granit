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
                    <a href="{{ url('shop/payment') }}">cancel</a><span class="line-separate"></span>
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
                Cancel
            </div>
        </div>
    </div>
@stop 