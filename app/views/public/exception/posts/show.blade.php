{{-- Update the Meta Description --}}
@section('meta_description')
    @if ($post->meta_description)
        <meta name="description" content="{{ $post->meta_description }}" />
    @endif
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
    @if ($post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}" />
    @endif
@stop

@section('heading')
    <!-- BEGIN PAGE HEADING -->

        <section id="heading">
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
                                $type = 'News';
                            }
                            ?>
                            <h1 data-animate="fadeInLeft" class="fx animated fadeInLeft" style="">{{ $type }}</h1>
                            <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                                <span class="bold">You Are In:</span>
                                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                                    @if (Request::is('pages/*'))
                                        <a href="{{ url('pages') }}">pages</a><span class="line-separate">/</span>
                                    @else
                                        <a href="{{ url('posts') }}">{{ $type }}</a><span class="line-separate">/</span>
                                    @endif
                                    <span>{{ $post->permalink }}</span>
                            </div>
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

            <div id="content" class="cell-8">

                <!-- BEGIN POST -->
                    <article class="post">
                        <!-- begin post heading -->
                        <header class="entry-header">
                            <h2 class="entry-title">
                                {{ HTML::link('posts/'.$post->permalink, $post->title) }}
                            </h2>
                        </header>
                        <!-- end post heading -->

                        <!-- begin post content -->
                        <div class="entry-content">
                            <!-- begin post image -->
                            <figure class="featured-thumbnail full-width">
                                @if ($type == 'post')
                                    <span class="meta-date">
                                        <span class="meta-date-inner">
                                            {{ $post->date() }}
                                        </span>
                                    </span>
                                @endif
                                @if ($post->image)
                                    <img src="{{ url($post->image) }}" alt="" width="636" height="179" border="0" />
                                @endif
                            </figure>
                            <!-- end post image -->

                            {{ $post->content }}
                        </div>
                        <!-- end post heading -->

                    </article>
                <!-- END POST -->

            </div>

            <!-- BEGIN SIDEBAR -->
            @include('public.exception.posts.sidebar')
            <!-- END SIDEBAR -->

        </div>

    </section>
@stop

@section('scripts')
    @if ($post->type != 'post')
    <script>
        $(function() {
            $('#sidebar').find(".sf-menu").removeClass('sf-menu');

            $header_menu = $('header .sf-menu>li');

            for (i=0; i<=($header_menu.length/2)-1; i++) {
                $header_menu[i].remove();
            }
        });
    </script>
    @endif
@stop
