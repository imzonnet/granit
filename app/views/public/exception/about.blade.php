{{-- Update the Meta Description --}}
@section('meta_description')
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@stop

@section('heading')
<!-- BEGIN PAGE HEADING -->
<section id="heading">
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 data-animate="fadeInLeft" class="fx animated fadeInLeft" style="">About <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PAGE HEADING -->
@stop

@section('content')
<section class="sectionWrapper">

    <div class="container">
        <div class="row">
            <div class="cell-6">
                <h2>About <span class="main-color"><i>Graníthöllin</i></span></h2>
                <p>Graníthöllin ehf. var opnuð árið 2012 en eigandi Graníthallarinnar, Heiðar Steinsson, á að baki 22 ára reynslu af  meðhöndlun náttúrusteins og margra ára reynslu af vinnu við legsteina.<br />
                    Graníthöllin er til húsa að Bæjarhrauni 26 í Hafnarfirði, á móti Fjarðarkaupum, en fyrirtækið þjónustar allt landið. Fyrirtækið er í rúmgóðu og fallegu húsnæði með góðu aðgengi og vel er tekið á móti öllum, alltaf er heitt á könnunni og bakkelsi í boði.
                </p>
            </div>
            <div class="cell-6">
                <div class="portfolio-img-slick">
                    <div>
                        <a href="{{asset('uploads/slideshow/1.jpg')}}" class="zoom" data-gal="prettyPhoto" title="Project image 1"><img alt="" src="{{asset('uploads/slideshow/1.jpg')}}"></a>
                    </div>
                    <div>
                        <a href="{{asset('uploads/slideshow/2.jpg')}}" class="zoom" data-gal="prettyPhoto" title="Project image 2"><img alt="" src="{{asset('uploads/slideshow/2.jpg')}}"></a>
                    </div>
                    <div>
                        <a href="{{asset('uploads/slideshow/3.jpg')}}" class="zoom" data-gal="prettyPhoto" title="Project image 3"><img alt="" src="{{asset('uploads/slideshow/3.jpg')}}"></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>            
            <div class="clearfix"></div>
        </div>
        <div class="padd-bottom-30 clearfix"></div>
        <div class="row">
            <div class="tabs" id="tabs">
                <ul>
                    <li class="active"><a href="#"> Markmið Graníthallarinnar</a></li>
                    <li><a href="#">Lagfæringar á eldri legsteinum</a></li>
                    <li><a href="#">Uppsetningar legsteina allt árið</a></li>
                    <li><a href="#">Fylgihlutir með legstein</a></li>
                </ul>
                <div class="tabs-pane">
                    <div class="tab-panel active">
                        <p>Markmið Graníthallarinnar er að bjóða fallega og vandaða legsteina og fyrsta flokks þjónustu á samkeppnishæfu verði. Graníthöllin býður upp á fjölbreytt úrval legsteina úr graníti, allt frá einföldum og klassískum legsteinum, upp í skrautlega steina með miklum útskurði. Í verslun okkar að Bæjarhrauni 26 erum við með yfir hundrað gerðir af legsteinum í fjölmörgum litum en steinarnir eru uppstilltir í rúmgóðum sýningarsal. Ef þú finnur ekki það sem þú leitar að er hægt að sérpanta legsteina eftir óskum hvers og eins og er það ekkert dýrara. Það ættu því allir að geta fundið eitthvað við sitt hæfi.   Granít hentar sérstaklega vel í legsteina þar sem það þolir hvað best íslenska veðrun.</p>
                        <p class="right"><a href="#">Lagfæringar á eldri legsteinum >></a></p>
                    </div>
                    <div class="tab-panel"> Dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                    <div class="tab-panel"> Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                    <div class="tab-panel"> Fallega og vandaða legsteina og fyrsta flokks fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="block-bg-4 our-plan">
    <div class="container">
        <div class="cell-5 plan-block lft-plan">
            <div class="block fx" data-animate="fadeInRight">
                <h3>OUR STARTUP YEAR</h3>
                <p>Fusce mollis massa vel leo imperdiet ultrices. Cras ut tristique tellus. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
                    Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi facilisis, ligula a faucibus pellentesque, orci justo consequat massa, sit amet dapibus dolor diam viverra mi.</p>
                <div class="plan-year"><span>2012</span></div>
            </div>
            <div class="block fx" data-animate="fadeInRight">
                <h3>PERMANENT ENGRAVED FONTS</h3>
                <p>Fusce mollis massa vel leo imperdiet ultrices. Cras ut tristique tellus. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
                    Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi facilisis, ligula a faucibus pellentesque, orci justo consequat massa, sit amet dapibus dolor diam viverra mi.</p>
                <div class="plan-year"><span>2014</span></div>
            </div>
        </div>
        <div class="cell-2 plan-title">
            <div class="main-color extraBold">
                Our <br>
                <span>Plan</span>
            </div>
        </div>
        <div class="cell-5 plan-block rit-plan">
            <div class="block fx" data-animate="fadeInLeft">
                <h3>WE HIRE MORE PEOPLE</h3>
                <p>Fusce mollis massa vel leo imperdiet ultrices. Cras ut tristique tellus. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
                    Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi facilisis, ligula a faucibus pellentesque, orci justo consequat massa, sit amet dapibus dolor diam viverra mi.</p>
                <div class="plan-year"><span>2013</span></div>
            </div>
            <div class="block fx" data-animate="fadeInLeft">
                <h3>NEW WEBSITE AND MEMORIAL</h3>
                <p>Fusce mollis massa vel leo imperdiet ultrices. Cras ut tristique tellus. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
                    Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi facilisis, ligula a faucibus pellentesque, orci justo consequat massa, sit amet dapibus dolor diam viverra mi.</p>
                <div class="plan-year"><span>2015</span></div>
            </div>
        </div>
    </div>
</div>

<div class="sectionWrapper gry-pattern">
    <div class="container team-boxes">
        <h3 class="block-head">Meet Our Team</h3>
        @foreach($users as $team)
        <div class="cell-4 fx" data-animate="bounceIn">
            <div class="team-box">
                <div class="team-img">
                    <img alt="" src="{{URL::to($team->photo)}}">
                    <h3>{{$team->first_name}} {{$team->last_name}}</h3>
                </div>
                <div class="team-details">
                    <h3 class="gry-bg">{{$team->first_name}} {{$team->last_name}}</h3>
                    <div class="t-position">...</div>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolre eu feugiat nula faciisis at vero eros.</p>
                    <div class="team-socials">
                        <ul>
                            <li><a href="#" title="facebook"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#" title="linkedin"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#" title="skype"><span class="fa fa-skype"></span></a></li>
                            <li><a href="#" title="twitter"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#" title="vimeo"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop

@section('scripts')

@stop
