
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
            <button id="register">Register</button>
        </div>
    </div>
</div>

@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function($){
            $('#register').click(function(){
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    url: '{{url('register')}}',
                    type: 'post',
                    data: {username : 'hihi', email: 'hihi@hihi.com', password: '123123', password_confirmation: '123123'},
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        })

    </script>
@stop