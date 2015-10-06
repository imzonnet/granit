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
                {{ region_render('feature_first') }}
            </div>
            <div class="cell-6">
                {{ region_render('feature_second') }}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="padd-bottom-30 clearfix"></div>
        <div class="row">
            {{ region_render('feature_third') }}
        </div>
    </div>

</section>
<div class="block-bg-4 our-plan">
    <div class="container">
        {{ region_render('portfolio') }}
    </div>
</div>

<div class="sectionWrapper gry-pattern">
    <div class="container team-boxes">
        {{ region_render('team') }}
        @foreach($users as $team)
        <div class="cell-4 fx" data-animate="bounceIn">
            <div class="team-box">
                <div class="team-img">
                    <img alt="" src="{{URL::to($team->photo)}}">
                    <h3>{{$team->first_name}} {{$team->last_name}}</h3>
                    <span class="position">{{$team->position}}</span>
                    <span class="email"><a href="mailto:{{ $team->email }}" title="envelope"><span class="fa fa-envelope"></span> {{ $team->email }}</a></span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop

@section('scripts')

@stop
