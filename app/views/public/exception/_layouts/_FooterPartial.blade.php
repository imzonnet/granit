 <footer id="footWrapper">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- main menu footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Main Menu</h3>
                    {{Services\MenuManager::generate('public-bottom-menu', 'footer-menu')}}
                </div>
                <!-- main menu footer cell start -->

                <!-- Our Friends footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Our Friends</h3>
                    {{Services\MenuManager::generate('public-ourfriends-menu', 'footer-menu')}}
                </div>
                <!-- Our Friends footer cell start -->

                <!-- Useful Links footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Useful Links</h3>
                    {{Services\MenuManager::generate('public-useful-menu', 'footer-menu')}}
                </div>
                <!-- Useful Links footer cell start -->

                <!-- Tags Cloud footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Tag Cloud</h3>
                    <div class="tags">
                        <a href="#">Design</a>
                        <a href="#">User interface</a>
                        <a href="#">Performance</a>
                        <a href="#">Development</a>
                        <a href="#">WordPress</a>
                        <a href="#">SEO</a>
                        <a href="#">Joomla</a>
                        <a href="#">ASP.Net</a>
                        <a href="#">SharePoint</a>
                        <a href="#">Bootstrap</a>
                    </div>
                </div>
                <!-- Tags Cloud footer cell start -->

                <div class="clearfix"></div>
                <hr class="hr-style5">
                <div class="clearfix"></div>

                <!-- contact us footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Keep in Touch</h3>
                    <ul>
                        <li class="footer-contact"><i class="fa fa-home"></i><span>123, Second Street name, Address.</span></li>
                        <li class="footer-contact"><i class="fa fa-globe"></i><span><a href="#">info@it-rays.com</a></span></li>
                        <li class="footer-contact"><i class="fa fa-phone"></i><span>+1 (000) 000-0000</span></li>
                        <li class="footer-contact"><i class="fa fa-map-marker"></i><span><a href="contact.html#map_canvas">View our map</a></span></li>
                    </ul>
                </div>
                <!-- contact us footer cell end -->

                <!-- Newsletters footer cell start -->
                <div class="cell-3">
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
                <div class="cell-3">
                    <h3 class="block-head">Latest Tweets</h3>
                    <div class="tweet">
                        <p><span class="fa fa-twitter"></span>Check our portfolio at <a href="#">EXCEPTION</a> to get more information about us.</p>
                        <p><a href="https://twitter.com/">https://twitter.com/</a></p>
                        <p>30 Jan. 2014</p>
                    </div>
                </div>
                <!-- latest tweets footer cell start -->

                <!-- flickr stream footer cell start -->
                <div class="cell-3 flickr-stream-w">
                    <h3 class="block-head">Flickr Stream</h3>
                    <ul>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                        <li>
                            <a class="flickr" href="http://www.flickr.com" title="">
                                <img src="{{URL::to('assets/public/exception/images/people/1.jpg')}}" alt=""><span class="img-overlay"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- flickr stream footer cell start -->

            </div>
        </div>
    </div>

    <!-- footer bottom bar start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- footer copyrights left cell -->
                <div class="copyrights cell-5">&copy; {{Setting::value('footer_text')}}</div>

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