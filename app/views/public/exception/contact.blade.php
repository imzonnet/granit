@section('styles')
@stop

@section('heading')
<!-- BEGIN PAGE HEADING -->
<section id="heading">
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 data-animate="fadeInLeft" class="fx animated fadeInLeft" style="">Contact <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PAGE HEADING -->
@stop

@section('content')

<div class="padd-top-50">
    <div class="container">
        <div class="row">
            <div class="cell-7 contact-form fx" data-animate="fadeInLeft" id="contact">
                <h3 class="block-head">Hafa Samband</h3>
                <div id="errors-div">
                    @if (Session::has('error_message'))
                        <div class="box error-box">
                            <strong>Error!</strong> {{ Session::get('error_message') }}
                        </div>
                    @endif
                    @if (Session::has('success_message'))
                        <div class="box success-box">
                            <strong>Success!</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if( $errors->count() > 0 )
                        <div class="box error-box">
                            <p>The following errors have occurred:</p>
                            <ul id="form-errors">
                                {{ $errors->first('email', '<li>:message</li>') }}
                                {{ $errors->first('name', '<li>:message</li>') }}
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- BEGIN CONTACT FORM -->
                {{ Form::open(array('url'=>'contact', 'id'=>'contact-form', 'class'=>'contact-form')) }}
                        
                        <div class="form-input">
                            {{ Form::text('name', Input::old('name'), array('id'=>'name', 'placeholder'=>'your name...')) }}
                        </div>
                        <div class="form-input">
                            {{ Form::text('email', Input::old('email'), array('id'=>'email', 'placeholder'=>'your email...')) }}
                        </div>
                        <div class="form-input">
                            {{ Form::text('subject', Input::old('subject'), array('id'=>'subject', 'placeholder'=>'your subject...')) }}
                        </div>
                        <div class="form-input">
                            {{ Form::textarea('comments', Input::old('comments'), array('id'=>'comments', 'cols'=>'30', 'rows'=>'10', 'placeholder'=>'your comment...')) }}
                        </div>
                        <div class="form-input">
                            <input type="submit" id="submit" class="btn btn-large main-bg" value="send"/>
                        </div>
                
                {{ Form::close() }}
                <!-- END CONTACT FORM -->
                
            </div>
            <div class="cell-5 contact-detalis">
                <h3 class="block-head">Contact Details</h3>
                <p class="fx" data-animate="fadeInRight center">
                    {{HTML::image(asset('uploads/images/contact.png'))}}
                </p>
                <hr class="hr-style4">
                <div class="clearfix"></div>
                <div class="padding-vertical">
                    <div class="cell-5 fx" data-animate="fadeInRight">
                        <h4 class="main-color bold">Hafa Samband:</h4>
                        <p>Bæjarhraun 26,<br />220 Hafnarfjörður</p>
                        <h4 class="main-color bold">Email:</h4>
                        <p>granithollin@granithollin.is</p>
                        <h4 class="main-color bold">Phone:</h4>
                        <p>+354 555-3888</p>
                    </div>
                    <div class="cell-2"><br></div>
                    <div class="cell-5 fx" data-animate="fadeInRight">
                        <h4 class="main-color bold">Opening Hours</h4>
                        <h5>Opening Hours:</h5>
                        <p>Opening Hours</p>
                        <h5>Saturdays:</h5>
                        <p>Saturdays</p>
                        <h5>Sundays:</h5>
                        <p>Closed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="padd-top-50">
    <div class="container">
        <div class="row">
            <div id="map_canvas"></div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
{{ HTML::script('assets/public/default/js/jquery.ui.map.js') }}


<script type="text/javascript">
$(document).ready(function () {
    var zoom = $('#map_canvas').gmap('option', 'zoom');

    $('#map_canvas').gmap().bind('init', function (ev, map) {
        $('#map_canvas').gmap('addMarker', {'position': '64.079650,-21.940151', 'bounds': true}).click(function(){
            $('#map_canvas').gmap('openInfoWindow', {'content': 'Hello World!'}, this);
        });
        $('#map_canvas').gmap('option', 'zoom', 16);
    });
});
</script>

@stop
