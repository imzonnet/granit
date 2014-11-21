@section('heading')
<!-- BEGIN PAGE HEADING -->
<div class="page-title title-1">
    <div class="container">
        <div class="row">
            <div class="cell-12">
                <?php
                $menu = Menu::published()
                        ->where(function($query) {
                            $query->where('link', '=', Request::path())
                            ->orWhere('link_manual', '=', Request::path());
                        })
                        ->first();
                if ($menu) {
                    $type = $menu->title;
                } else {
                    $type = 'Memorial';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('Memorial') }}">Memorial</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
<section class="sectionWrapper">
    <div class="container">
        <div class="memorial nobar">
            <div class="blog-posts row">
                @foreach( $memorials as $memorial )
                <div class="cell-6 post-item fx" data-animate="fadeInLeft">
                    <div class="post-image cell-4">
                        <div class="row">
                        <a href="{{URL::to('/memorial/' . $memorial->id)}}">
                            <div class="mask"></div>
                            <img src="{{$memorial->avatar}}" alt="{{$memorial->name}}">
                        </a>
                        </div>
                    </div>
                    <article class="post-content cell-8">
                        <div class="post-info-container">
                            <div class="post-info">
                                <h2><a class="main-color" href="{{URL::to('/memorial/' . $memorial->id)}}">{{$memorial->name}}</a></h2>
                                <ul class="post-meta">
                                    <li><i class="fa fa-clock-o"></i><span>Birthday:</span> {{$memorial->birthday}}</li>
                                    <li><i class="fa fa-clock-o"></i><span>Death:</span> {{$memorial->birthday}}</li>
                                </ul>
                            </div>
                        </div>
                        <p>{{Str::words($memorial->biography, $words = 100, $end = '...')}}</p>
                        <p><a href="/memorial/">Readmore</a></p>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop

