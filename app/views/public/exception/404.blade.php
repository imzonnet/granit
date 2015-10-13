@extends('public.exception._layouts._layout')

@section('heading')
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">Page <span>Not Found</span></h1>
                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">{{ trans('cms.you_are_in') }}:</span><a href="#">{{ trans('cms.home') }}</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Page Not Found</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="sectionWrapper">
        <div class="container">
            <div class="not-found">
                <p class="hint extraLarge">The Page You Are Looking for can’t Be Found</p>
                <hr class="hr-style3">
                <div class="err-404">
                    4<span class="main-color">0</span>4
                </div>
                <hr class="hr-style3">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
                <a class="btn btn-medium" href="{{URL::to('/')}}">Back To Home Page</a>
            </div>
        </div>
    </div>
@stop
