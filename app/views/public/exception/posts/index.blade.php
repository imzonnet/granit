{{-- Update the Meta Description --}}
@section('meta_description')

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@stop

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
                                $type = 'Blog';
                            }
                        ?>
                        <h1 class="fx" style="">{{ $type }}</h1>
                        <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                            <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                                <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
                                @if (Request::is('pages/*'))
                                    <a href="{{ url('pages') }}">pages</a><span class="line-separate">/</span>
                                @else
                                    <a href="{{ url('posts') }}">{{ $type }}</a><span class="line-separate">/</span>
                                @endif
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

            <div id="content" class="cell-8">

                <div class="blog-posts">
                @foreach( $posts as $post )
                    <div class="post-item fx" data-animate="fadeInLeft">
                        <div class="post-image">
                            <a href="posts/{{$post->permalink}}">
                                <div class="mask"></div>
                                <div class="post-lft-info">
                                <?php $created = strtotime($post->created_at); ?>
                                    <div class="main-bg"><br>{{date('m', $created)}}<br>{{date('Y', $created)}}<span class="tri-col"></span></div>
                                </div>
                                @if( isset($post->image))
                                    <img src="{{url($post->image)}}" alt="{{$post->title}}" height="250px">
                                @endif
                            </a>
                        </div>
                        <article class="post-content">
                            <div class="post-info-container">
                                <div class="post-info">
                                    <h2><a class="main-color" href="posts/{{$post->permalink}}">{{$post->title}}</a></h2>
                                    <ul class="post-meta">
                                        <?php $user = User::find($post->created_by); ?>
                                        <li class="meta-user"><i class="fa fa-user"></i>By: <a href="#">{{$user->first_name}} {{$user->last_name}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>{{Str::limit($post->content,600)}}</p>
                            <p><a class="read-more" href="posts/{{$post->permalink}}">Read more</a> </p>
                        </article>
                    </div>
                @endforeach
                </div>
                
                <div class="clearfix"></div>
                <div class="pager skew-25">
                    {{$posts->links()}}
                </div>
            </div>

            @include('public.exception.posts.sidebar')
        </div>

    </section>
@stop

