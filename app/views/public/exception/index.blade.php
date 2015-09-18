@section('styles')
<!-- Flexslider -->
{{ HTML::style("assets/public/default/css/flexslider.css") }}
<!-- Exp Slider -->
<!-- Theme CSS -->
{{ HTML::style("assets/shared/slider/css/slider.css") }}
{{ HTML::style("assets/shared/slider/css/slider-animate.css") }}
{{ HTML::style("assets/shared/slider/vendor/rs-plugin/css/settings.css") }}
{{ HTML::style("assets/shared/slider/css/slider-responsive.css") }}

@stop

@section('scripts')
<!-- Flexslider -->
{{ HTML::script("assets/public/default/js/jquery.flexslider.js") }}
<!-- Exp Slider -->
{{ HTML::script("assets/shared/slider/vendor/rs-plugin/js/jquery.themepunch.plugins.min.js") }}
{{ HTML::script("assets/shared/slider/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js") }}

<!-- Flexslider Init -->
<script type="text/javascript">

$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: false,
        // Callback API
        before: function () {
        },
        after: function () {
        },
        start: function (slider) {
            $('#slider').removeClass('loading');
        }
    });
});

/*
 Extraction
 */
(function () {
    "use strict";
    var Home = {
        initialized: false,
        initialize: function () {
            if (this.initialized)
                return;
            this.initialized = true;
            this.build();
            this.events();

        },
        build: function (options) {
            // Revolution Slider Initialize
            $("#revolutionSlider").each(function () {
                var slider = $(this);
                var defaults = {
                    delay: 9000,
                    startheight: 525,
                    startwidth: 960,
                    hideThumbs: 10,
                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 5,
                    navigationType: "both",
                    navigationArrows: "verticalcentered",
                    navigationStyle: "round",
                    touchenabled: "on",
                    onHoverStop: "on",
                    navOffsetHorizontal: 0,
                    navOffsetVertical: 20,
                    stopAtSlide: 0,
                    stopAfterLoops: -1,
                    shadow: 0,
                    fullWidth: "on",
                }
                var config = $.extend({}, defaults, options, slider.data("plugin-options"));

                // Initialize Slider
                var sliderApi = slider.revolution(config).addClass("slider-init");

                // Set Play Button to Visible
                sliderApi.bind("revolution.slide.onloaded ", function (e, data) {
                    $(".home-player").addClass("visible");
                });
            });
        },
        events: function () {
        }

    };

    Home.initialize();

})();

</script>
@stop

@section('slider')
@if ($slides->count() > 0)
<!-- BEGIN SLIDER -->
<section id="slider" class="loading">

    <div class="container-fluid">
        <!--
                <div class="flexslider">
                    <ul class="slides">
        
                        @foreach ($slides as $slide)
                        <li>
                            <img src="{{ URL::to($slide->image) }}" />
                            <div class="slide-caption">
                                {{ $slide->caption }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
        -->
        <div class="slider-container">
            {{ region_render('slideshow') }}
        </div> <!--SLIDER-->
    </div>

</section>
<!-- END SLIDER -->
@endif
@stop

@section('content')
<!-- Content Start -->
<div id="contentWrapper">
    <!-- Welcome Box start -->
    <div class="welcome">
        <div class="container">
            {{ region_render('introduce') }}
        </div>
    </div>
    <!-- Welcome Box end -->

    <!-- Services boxes style 1 start -->
    <div class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="cell-6 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_first') }}
                </div>
                <div class="cell-6 fx" data-animate="fadeInUp" data-animation-delay="200">
                    {{ region_render('feature_second') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Services boxes style 1 start -->

    <!-- Portfolio start -->
    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <div class="cell-3">
                    {{ region_render('portfolio') }}
                </div>
                <div class="cell-9">
                    <div class="homeGallery portfolio">
                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div>
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{URL::to('assets/public/exception/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">{{ trans('Project Title') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- staff item end -->

                    </div><!-- .portfolioGallery end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio end -->

    <!-- About us and Features container start -->
    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <!-- about us left block -->
                <div class="cell-8">								

                    <!-- testimonials start -->
                    <div class="fx" data-animate="fadeInLeft">

                        {{ region_render('testimonials') }}

                        <div class="testimonials-1 slick-button-hor">
                            @foreach($testimonials as $testimonial)
                            <!-- testimonials item start -->
                            <div>
                                <div class="testimonials-bg">
                                    <h3>{{$testimonial->title}}</h3>
                                    <span>{{$testimonial->description}}</span>
                                    <div class="rating">
                                        {{$testimonial->rate()}}
                                    </div>
                                </div>
                                <div class="testimonials-name"><strong>{{$testimonial->name}}</strong></div>
                            </div>
                            <!-- testimonials item end -->
                            @endforeach
                        </div>



                    </div>
                    <!-- testimonials end -->

                </div>
                <!-- about us left block end -->

                <!-- our skills right block -->
                <div class="cell-4 fx" data-animate="fadeInRight">
                    {{ region_render('advertisement') }}
                </div>
                <!-- our skills right block end -->							
            </div>
        </div>
    </div>
    <!-- About us and Features container end -->

</div>
<!-- Content End -->
@stop
