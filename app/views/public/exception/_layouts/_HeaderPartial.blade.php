<!-- Header Start -->
<div id="headWrapper" class="clearfix">
    <!-- top bar start -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="cell-5">
                    <ul> 
                        <li><a href="#"><i class="fa fa-envelope"></i> granithollin@granithollin.is</a></li> 
                        <li><span><i class="fa fa-phone"></i> 555-3888</span></li> 
                    </ul>
                </div>
                <div class="cell-7 right-bar">
                    {{Services\MenuManager::generate('public-small-menu-right', 'right')}}
                    <ul class="right"> 
                        <li><a href="{{ URL::route('language.switch', 'en') }}">{{HTML::image(asset('uploads/images/en.png'), 'English',['width' => '30px', 'class' => 'left', 'style' => 'padding:0 5px; margin-top: 8px;'])}} EN</a></li>
                        <li><a href="{{ URL::route('language.switch', 'icl') }}">{{HTML::image(asset('uploads/images/icl.png'), 'IceLand',['width' => '30px', 'class' => 'left', 'style' => 'padding: 0 5px; margin-top: 8px;'])}} ICL</a></li>
                        <?php 
                            use Components\Shop\Models\ShopSetting; 
                            $getModel = new ShopSetting;
                            $shopSettings = $getModel->get_settings();
                            $currency_symbols = $getModel->currency_symbols();
                            $symbols = $currency_symbols[$shopSettings->pp_currencyCodeType];
                        ?>
                        <!-- <li><a href="cart.html"><i class="fa fa-shopping-cart"></i>0 item(s) - $0.00</a></li> -->
                        <li><a href="{{ url( 'shop/cart' ) }}"><i class="fa fa-shopping-cart"></i>{{ Cart::count() }} item(s) - {{ $symbols }}{{ number_format( Cart::total(), 2 ) }}</a></li>
                        
                        <li><a href="#"><i class="fa fa-sitemap"></i> {{ trans('cms.site_map') }}</a></li>
                        @if( !\Sentry::check() )
                        <li><a href="{{url('register')}}"><i class="fa fa-user"></i>{{ trans('cms.register') }}</a></li>
                        <li><a href="{{url('login/public')}}"><b class="tri hidden"></b><i class="fa fa-unlock-alt"></i> {{ trans('cms.login') }}</a></li>
                        @else
                        <li><a href="#"><i class="fa fa-user"></i>{{ trans('cms.hello') }} {{ $current_user->username }}</a></li>
                        <li><a href="{{url('logout')}}"><b class="tri hidden"></b><i class="fa fa-unlock"></i> {{ trans('cms.logout') }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- top bar end -->

    <!-- Logo, global navigation menu and search start -->
    <header class="top-head">
        <div class="container">
            <div class="row">
                <div class="logo cell-3">
                    <a href="{{URL::to('')}}"></a>
                </div>
                <div class="cell-9 top-menu">

                    <!-- top navigation menu start -->
                    @include('public.exception._layouts._TopMenuPartial')
                    <!-- top navigation menu end -->

                    <!-- top search start -->
                    <!-- top navigation menu end -->

                    <!-- top search start -->
                    <div class="top-search">
                        <a href="#"><span class="fa fa-search"></span></a>
                        <div class="search-box">
                            <div class="input-box left">
                                <input type="text" name="t" id="t-search" class="txt-box" placeHolder="Enter search keyword here..." />
                            </div>
                            <div class="left">
                                <input type="submit" id="b-search" class="btn main-bg" value="GO" />
                            </div>
                        </div>
                    </div>
                    <!-- top search end -->

                    <!-- top search end -->
                </div>
            </div>
        </div>
    </header>
    <!-- Logo, Global navigation menu and search end -->

</div>
<!-- Header End -->