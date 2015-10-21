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
                            <h1 data-animate="fadeInLeft" class="fx animated fadeInLeft" style="">{{ $post->title }}</h1>
                            <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                                <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
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
                       
                        <!-- begin post content -->
                        <div class="entry-content">
                            <!-- begin post image -->
                            @if ($type == 'post')
                            <div class="details-img">
                                <div class="post-lft-info">
                                    <div class="main-bg"> {{ $post->date() }}<span class="tri-col"></span></div>
                                </div>
                                 @if ($post->image)
                                    <img src="{{ url($post->image) }}" alt="" width="100%" height="350" border="0" />
                                @endif
                            </div>
                            @endif
                            <!-- end post image -->
                            <article class="post-content">
                            <div class="post-info-container">
                                <h1 class="main-color">{{ $post->title }}</h1>
                                
                            </div>
                            {{ $post->content }}

                            </article>
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
