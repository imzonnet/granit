<!-- login box start -->
<div class="login-box">
    <a class="close-login" href="#"><i class="fa fa-times"></i></a>
    <form>
        <div class="container">
            <p>Hello our valued visitor, We present you the best web solutions and high quality graphic designs with a lot of features. just login to your account and enjoy ...</p>
            <div class="login-controls">
                <div class="skew-25 input-box left">
                    <input type="text" class="txt-box skew25" placeholder="User name Or Email" />
                </div>
                <div class="skew-25 input-box left">
                    <input type="password" class="txt-box skew25" placeholder="Password" />
                </div>
                <div class="left skew-25 main-bg">
                    <input type="submit" class="btn skew25" value="Login" />
                </div>
                <div class="check-box-box">
                    <input type="checkbox" class="check-box" /><label>Remember me !</label>
                    <a href="#">Forgot your password ?</a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- login box End -->

<!-- Header Start -->
<div id="headWrapper" class="clearfix">

    <!-- top bar start -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="cell-5">
                    {{Services\MenuManager::generate('public-small-menu-left')}}
                </div>
                <div class="cell-7 right-bar">
                    {{Services\MenuManager::generate('public-small-menu-right', 'right')}}
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