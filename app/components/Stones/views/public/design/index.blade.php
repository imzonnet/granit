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
    {{ HTML::script("http://parall.ax/parallax/js/jspdf.js") }}  
    {{ HTML::script("assets/public/exception/design/js/design.js") }}  
    <script id="digits-sdk" src="https://cdn.digits.com/1/sdk.js" async></script>
    <script src = "https://plus.google.com/js/client:plusone.js?onload=render"></script>
    <script type="text/javascript">
        var root_url = "<?php echo Request::root().'/'; ?>";
        <?php if(isset($designed)){
            echo "var data_designed = JSON.parse('{$designed->data}');";
            echo "console.log(data_designed)";
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
    <!--
    <pre>
        <?php //print_r(json_decode($designed->data)); ?>
    </pre>
    -->
    <input type="file" id="upload-field-area" style="display: none;">
    <div class="padd-vertical-20">
        <div class="container">
            <div class="row">
                @if (Session::has('success_message'))
                <div class="box success-box center"> 
                    <a href="#" class="close-box"><i class="fa fa-times"></i></a>
                    <strong>Success!</strong> {{ Session::get('success_message') }}
                </div>
                @endif
                @if ($errors->has())
                <div class="box warning-box center"> 
                    <a href="#" class="close-box"><i class="fa fa-times"></i></a>
                    {{$errors->first()}}
                </div>
                @endif
            </div>
        </div>
    </div>
    <section class="sectionWrapper">
        <div class="container">
            <div class="">
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
    <div class="popup-wapper">
        <div class="popup-content">
            <div class="popup-content-inner">
                <span class="close-open-popup">x</span>
                <h4>{{trans('Stones::design.stones.design.share2')}}</h4>
                <div class="popup-body" style="text-align: center;">
                    <div><a class="faceook-link-share" href="#"
                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                       target="_blank" title="Share on Facebook">
                       <span class="icon-link-share"><i class="fa fa-facebook-square"></i></span> {{trans('Stones::design.stones.design.facebook')}}
                    </a></div>

                    <div><a class="twitter-link-share" href="#"
                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                       target="_blank" title="Share on Twitter">
                       <span class="icon-link-share"><i class="fa fa-twitter-square"></i></span> {{trans('Stones::design.stones.design.twitter')}}
                    </a></div> 

                    <div><a class="google-link-share" href="#"
                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;"
                       target="_blank" title="Share on Google+">
                       <span class="icon-link-share"><i class="fa fa-google-plus-square"></i></span> {{trans('Stones::design.stones.design.google+')}}
                    </a></div>
                </div>
            </div>
        </div>
    </div>
    <img style="position: absolute; opacity: 0; z-index: -10;" src="<?php echo Request::root() . '/assets/public/exception/design/images/logo-white-bg.jpg'; ?>"
@stop