
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

﻿@section('content')
@if ($errors->any())
<div class="alert alert-error">
    <button class="close" data-dismiss="alert">×</button>
    <strong>Error!</strong><br> {{ implode('<br>', $errors->all()) }}
</div>
@endif
<div class="padd-vertical-30">
    <div class="container">
        <div class="row">
            <div class="cell-4"></div>
            <div class="tabs cell-3 gry-bg padd-vertical-20">
                <ul>
                    <li class="skew-25 active"><a class="skew25" href="{{url('login/public')}}">Sign In</a>
                    </li>
                    <li class="skew-25"><a class="skew25" href="{{url('register')}}">Sign Up</a>
                    </li>
                </ul>
                <div class="tabs-pane">
                    <p>{{ trans('cms.alert_signup') }}</p>
                    <div class="tab-panel contact-form">
                        {{ Form::open(array('url'=>'login/public', 'method'=>'POST', 'class'=>'form-signin')) }}
                        <div class="form-input">
                            {{ Form::text('username', Input::old('username'), array('class'=>'input-block-level', 'placeholder' => 'Username')) }}
                        </div>
                        <div class="form-input">
                            {{ Form::password('password', array('class'=>'input-block-level', 'placeholder' => 'Password')) }}
                        </div>
                        <div class="form-input text-align-center">
                            <button class="btn btn-inverse btn-block main-bg" type="submit">Sign in</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
