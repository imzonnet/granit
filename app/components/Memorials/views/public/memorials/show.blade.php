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
                    $type = $memorial->name;
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('Memorial') }}">Memorial</a><span class="line-separate">/</span>
                    <span>Memorial</span><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
<section class="sectionWrapper" id="memorial">
    <div class="container">
        <div class="row">
            <div class="cell-9">
                <h3 class="block-head"> {{ $memorial->name }} <br /> <small>{{ $memorial->birthday() }} - {{ $memorial->death() }}</small></h3>
                <div class="tabs" id="tabs">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-male"></i> Biography</a></li>
                        <li class=""><a href="#"><i class="fa fa-moon-o"></i> Obituary</a></li>
                        <li class=""><a href="#"><i class="fa fa-book"></i> Guest Book</a></li>
                        <li class=""><a href="#"><i class="fa fa-music"></i> Media</a></li>
                        <li class=""><a href="#"><i class="fa fa-link"></i> Special Links</a></li>
                    </ul>
                    <div class="tabs-pane">
                        <div id="biography" class="tab-panel active" style="display: block;">
                            <div class="content">
                                {{ $memorial->biography }}
                            </div>
                        </div>
                        <div id="obituary" class="tab-panel" style="display: none;">
                            <div class="content">
                                {{ $memorial->obituary }}
                            </div>
                        </div>
                        <div id="guest-book" class="tab-panel" style="display: none;">
                            <div class="content">
                                <p><a href="#" class="btn main-bg">Sign Guest Book</a></p>
                                <ul class="accordion" id="accordion">
                                    @foreach($guestbooks as $index => $guestbook)
                                    <li class="">
                                        <h3><a href="#"><span><i class="fa fa-book"></i>{{ $guestbook->title }}</span></a></h3>
                                        <div class="accordion-panel {{$index==0 ? 'active' : ''}}" style="display: none;">
                                            {{ $guestbook->content }}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="media" class="tab-panel" style="display: none;">
                            <div class="content">
                                <p><a href="#" class="btn main-bg">Submit Media</a></p>
                                <div class="row">
                                    @foreach($media as $item)
                                    <div class="cell-3 media-item">
                                        {{ $item->media() }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="special-links" class="tab-panel" style="display: none;">
                            <div class="content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell-3">
                <img src="{{$memorial->avatar}}" alt="{{$memorial->name}}" />
            </div>
        </div>
    </div>
</section>
@stop

