 <footer id="footWrapper">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- contact us footer cell start -->
                <div class="cell-4">
                    <h3 class="block-head">Main Menu</h3>
                    {{Services\MenuManager::generate('public-bottom-menu', 'footer-menu')}}
                </div>
                <!-- contact us footer cell end -->

                <!-- Newsletters footer cell start -->
                <div class="cell-4">
                    <div class="foot-logo"></div>
                    <p class="no-margin">Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
                    <form class="NL">
                        <div class="skew-25 input-box left">
                            <input type="text" class="txt-box skew25" placeholder="Enter Yor Email" required>
                        </div>
                        <div class="left skew-25 NL-btn">
                            <input class="btn skew25" type="submit" value="Send" />
                        </div>
                    </form>
                </div>
                <!-- Newsletters footer cell start -->

                <!-- latest tweets footer cell start -->
                <div class="cell-4">
                    <h3 class="block-head">Hafðu Samband</h3>
                    <ul class="address">
                        <li><i class="fa fa-home"></i> Bæjarhraun 26, 220 Hafnarfirði</li>
                        <li><i class="fa fa-envelope"></i> granithollin@granithollin.is</li>
                        <li><i class="fa fa-phone"></i> +354 555-3888</li>
                        <li><i class="fa fa-map-marker"></i> Sjá okkur á korti</li>
                    </ul>
                </div>
                <!-- latest tweets footer cell start -->

            </div>
        </div>
    </div>

    <!-- footer bottom bar start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- footer copyrights left cell -->
                <div class="copyrights cell-5">{{Setting::value('footer_text', '© Copyrights Granithöllin 2015. All rights reserved.')}}</div>

                <!-- footer social links right cell start -->
                <div class="cell-7">
                    <ul class="social-list right">
                        <li class="skew-25"><a href="{{Setting::value('facebook_link', '#')}}" data-title="facebook" data-tooltip="true"><span class="fa fa-facebook skew25"></span></a></li>
                        <li class="skew-25"><a href="{{Setting::value('twitter_link', '#')}}" data-title="goole plus" data-tooltip="true"><span class="fa fa-google-plus skew25"></span></a></li>
                        <li class="skew-25"><a href="{{Setting::value('gplus_link', '#')}}" data-title="twitter" data-tooltip="true"><span class="fa fa-twitter skew25"></span></a></li>
                    </ul>
                </div>
                <!-- footer social links right cell end -->

            </div>
        </div>
    </div>
    <!-- footer bottom bar end -->

</footer>