@section('styles')
<!-- Flexslider -->
{{ HTML::style("assets/public/default/css/flexslider.css") }}
@stop

@section('scripts')
<!-- Flexslider -->
{{ HTML::script("assets/public/default/js/jquery.flexslider.js") }}

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

</script>
@stop

@section('slider')
@if ($slides->count() > 0)
<!-- BEGIN SLIDER -->
<section id="slider" class="loading">

    <div class="container-fluid">

        <div class="flexslider">
            <ul class="slides">
                <!-- Begin Single Slide -->
                @foreach ($slides as $slide)
                <li>
                    <img src="{{ URL::to($slide->image) }}" />
                    <div class="slide-caption">
                        {{ $slide->caption }}
                    </div>
                </li>
                @endforeach
                <!-- End Single Slide -->
            </ul>
        </div>

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
            <h3 class="center block-head"><span class="main-color">Welcome to our website</span></h3>
            <p class="margin-bottom-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut.</p>
        </div>
    </div>
    <!-- Welcome Box end -->

    <!-- Services boxes style 1 start -->
    <div class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="cell-3 service-box-1 fx" data-animate="fadeInUp" data-animation-delay="200">
                    <div class="box-top">
                        <i class="fa">{{HTML::image(asset('uploads/images/icons/aa.png'))}}</i>
                        <h3><span>Over 100 years durability</span><br>Permanent text</h3>
                        <p>Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.</p>
                        <a class="more-btn" href="#">Read More</a>
                    </div>
                </div>
                <div class="cell-3 service-box-1 fx" data-animate="fadeInUp" data-animation-delay="400">
                    <div class="box-top">
                        <i class="fa">{{HTML::image(asset('uploads/images/icons/ad.png'))}}</i>
                        <h3><span>Design a headstone at home</span><br>Design a Stone</h3>
                        <p>Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.</p>
                        <a class="more-btn" href="#">Read More</a>
                    </div>
                </div>
                <div class="cell-3 service-box-1 fx" data-animate="fadeInUp" data-animation-delay="600">
                    <div class="box-top">
                        <i class="fa">{{HTML::image(asset('uploads/images/icons/acces.png'))}}</i>
                        <h3><span>Find all kinds of</span><br>Accessories</h3>
                        <p>Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.</p>
                        <a class="more-btn" href="#">Read More</a>
                    </div>
                </div>
                <div class="cell-3 service-box-1 fx" data-animate="fadeInUp" data-animation-delay="800">
                    <div class="box-top">
                        <i class="fa">{{HTML::image(asset('uploads/images/icons/about.png'))}}</i>
                        <h3><span>Always remeber you</span><br>Momorial site</h3>
                        <p>Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.Proin gravida nibh vel velit auctor enean sollicitud lorem quis bibendum auctor, nisi elit consequipsum.</p>
                        <a class="more-btn" href="#">Read More</a>
                    </div>
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
                    <h3 class="block-head side-heading">Recent <span>projects</span></h3>
                    <p class="portfolio-lft-txt">Browse our recent projects and you will see how we work and what are the technologies we use to build websites with a high quality and profissional ways to present you all what you need, All we aim is to make our customers satisfied and happy with all of our services.</p>
                    <div class="viewAll">
                        <a class="btn" href="#">Browse All Projects</a>
                    </div>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                                    <a href="#" class="project-name">Project Title</a>
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
                        <h3 class="block-head">What They Said About Us</h3>

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

                        <p class="padd-top-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit.</p>

                    </div>
                    <!-- testimonials end -->

                </div>
                <!-- about us left block end -->

                <!-- our skills right block -->
                <div class="cell-4 fx" data-animate="fadeInRight">
                    <div class="catalogue main-bg padd-vertical-10 center">
                        <h1>Catalogue</h1>
                        {{HTML::image(asset('uploads/images/news.png'))}}
                        <p><a href="#" class="btn more-btn btn-large">Read</a></p>
                    </div>
                </div>
                <!-- our skills right block end -->							
            </div>
        </div>
    </div>
    <!-- About us and Features container end -->

</div>
<!-- Content End -->
@stop
