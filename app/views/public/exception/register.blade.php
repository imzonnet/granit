
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
<div class="padd-vertical-20">
    <div class="container">
        <div class="row">
            @if (Session::has('success_message'))
            <div class="box success-box center"> 
                <a href="#" class="close-box"><i class="fa fa-times"></i></a>
                <strong>Success!</strong> {{ Session::get('success_message') }}
            </div>
            @endif
            @if ($errors->has())
            <div class="box warning-box center"> 
                <a href="#" class="close-box"><i class="fa fa-times"></i></a>
                {{$errors->first()}}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="padd-vertical-30">
    <div class="container">
        <div class="row">
            <div class="cell-4"></div>
            <div class="tabs cell-4 gry-bg padd-vertical-20">
                <ul>
                    <li class="skew-25"><a class="skew25" href="{{url('login/public')}}">Sign In</a></li>
                    <li class="skew-25 active"><a class="skew25" href="#">Sign Up</a></li>
                </ul>
                <div class="tabs-pane">
                    <p>{{ trans('cms.alert_signup') }}</p>
                    <div class="tab-panel contact-form">
                        {{ Form::open(array('url'=>'register', 'method'=>'POST', 'class'=>'form-signin')) }}
                        <div class="form-input">
                            {{ Form::text('username', Input::old('username'), array('class'=>'input-block-level', 'placeholder' => 'Username')) }}
                            {{ $errors->first('username', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input">
                            {{ Form::text('email', Input::old('email'), array('class'=>'input-block-level', 'placeholder' => 'Email')) }}
                            {{ $errors->first('email', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input">
                            {{ Form::password('password', array('class'=>'input-block-level', 'placeholder' => 'Password')) }}
                            {{ $errors->first('password', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input">
                            {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder' => 'Password')) }}
                            {{ $errors->first('password_confirmation', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input text-align-center">
                            <button class="btn btn-inverse btn-block main-bg" type="submit">Sign in</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <p class="center">Or sign up using</p>
                    <ul class="social-login">
                        <li class="fb"><a href="{{url('social/facebook/login')}}"><i class="fa fa-facebook"></i></a></li>
                        <li class="tw"><a href="{{url('social/twitter/login')}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="gg"><a href="{{url('social/google/login')}}"><i class="fa fa-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
