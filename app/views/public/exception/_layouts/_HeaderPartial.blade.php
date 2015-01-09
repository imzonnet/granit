<!-- Header Start -->
<div id="headWrapper" class="clearfix">
    <div class="login-box"> <a href="#" class="close-login"><i class="fa fa-times"></i></a>
        <form>
            <div class="container">
                <p>Hello our valued visitor, We present you the best web solutions and high quality graphic designs with a lot of features. just login to your account and enjoy ...</p>
                <div class="login-controls">
                    <div class="skew-25 input-box left">
                        <input type="text" placeholder="User name Or Email" class="txt-box skew25"> </div>
                    <div class="skew-25 input-box left">
                        <input type="password" placeholder="Password" class="txt-box skew25"> </div>
                    <div class="left skew-25 main-bg">
                        <input type="submit" value="Login" class="btn skew25"> </div>
                    <div class="check-box-box">
                        <input type="checkbox" class="check-box">
                        <label>Remember me !</label> <a href="#">Forgot your password ?</a> </div>
                </div>
            </div>
        </form>
    </div>
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
                        <li><a href="#">{{HTML::image(asset('uploads/images/en.png'), 'English',['width' => '30px', 'class' => 'left', 'style' => 'padding-right: 5px; margin-top: 8px;'])}} EN</a></li>
                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i>0 item(s) - $0.00</a></li> 
                        <li><a href="#"><i class="fa fa-sitemap"></i>Site Map</a></li> 
                        <li><a href="#"><i class="fa fa-user"></i>Register</a></li> 
                        <li><a class="login-btn" href="#"><b class="tri hidden"></b><i class="fa fa-unlock-alt"></i> Login</a></li> 
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