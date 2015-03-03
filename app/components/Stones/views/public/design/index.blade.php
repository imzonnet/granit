{{-- Update the Meta Description --}}
@section('meta_description')

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@stop

@section('styles')
    {{ HTML::style("http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css") }}
    {{ HTML::style("assets/public/exception/design/css/jquery.minicolors.css") }}
    {{ HTML::style("assets/public/exception/design/css/jquery.nouislider.min.css") }}
    {{ HTML::style("assets/public/exception/design/css/rotate.css") }}
    {{ HTML::style("assets/public/exception/design/css/dialog.css") }}
    {{ HTML::style("assets/public/exception/design/css/design.css") }}
    @if(count($fonts_include) > 0)
        @foreach($fonts_include as $item)
            {{ HTML::style($item->url) }}
        @endforeach
    @endif
@stop

@section('scripts')
    {{ HTML::script("http://code.jquery.com/ui/1.11.2/jquery-ui.js") }}
    {{ HTML::script("assets/public/exception/design/js/jquery.minicolors.min.js") }}  
    {{ HTML::script("assets/public/exception/design/js/jquery.nouislider.all.min.js") }}  
    {{ HTML::script("assets/public/exception/design/js/rotate.js") }}  
    {{ HTML::script("assets/public/exception/design/js/dialog.js") }}  
    {{ HTML::script("assets/public/exception/design/js/design.js") }}  
    <script type="text/javascript">
        var root_url = "<?php echo Request::root().'/'; ?>";
        <?php if(isset($designed)){
            echo "var data_designed = JSON.parse('{$designed->data}');";
        }else{
            echo "var data_designed = ''";
        } ?>
    </script>
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
                    $type = 'Design';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('design') }}">Design</a><span class="line-separate"></span>
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
            <div class="cell-12">
                <div id="design-container" class="design-container">
                    <div class="design-area left">
                        @include('Stones::public.design.areatool', array("product_cat" => $productCategories, "icon_cat" => $iconcategories, "fonts" => $fonts))
                    </div>
                    <div class="design-area right">
                        @include('Stones::public.design.areadesign')
                    </div>
                </div>
                <div class="design-area footer">
                    @include('Stones::public.design.areafooter')
                </div>
            </div>
        </div>
    </section>
@stop