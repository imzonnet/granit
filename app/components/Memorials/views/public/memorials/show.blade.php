@section('styles')
{{HTML::style('assets/public/exception/memorials/css/style.css')}}
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
                        <div id="guestbook" class="tab-panel" style="display: none;">
                            <div class="content">
                                @if( $has_access == 'true' )
                                    @include('Memorials::public.guestbooks.create')
                                @endif
                                <ul class="accordion" id="guestbook-content">
                                    @foreach($memorial->guestbook as $index => $guestbook)
                                    <li>
                                        <h3><a href="#"><span><i class="fa fa-book"></i>{{ $guestbook->title }}</span></a></h3>
                                        <div class="accordion-panel">
                                            {{ $guestbook->content }}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="media" class="tab-panel" style="display: none;">
                            <div class="content">
                                @if( $has_access == 'true' )
                                    @include('Memorials::public.media.create')
                                @endif
                                <div class="row" id="media-content">
                                    @foreach($memorial->media as $item)
                                    <div class="cell-3 media-item">
                                        <a class="zoom" href="{{ URL::asset($item->url) }}" title="{{ $item->title }}"><img src="{{ URL::asset($item->image) }}" alt="" title="{{ $item->title }}"/>
                                        <span class="{{$item->media_type}}"></span></a>
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

@section('scripts')
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modalmanager.js') }}
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modal.js') }}
<script>
    !(function ($) {
        $(function ($) {
            $('#btn-guestbook').click(function (e) {
                e.preventDefault();
                $('.modal-body', '#form-guestbook').addClass('loading-animate');
                var mid = $('input[name="memorial_id"]', '#form-guestbook').val();
                var title = $('input[name="title"]', '#form-guestbook').val();
                var content = $('#content', '#form-guestbook').val();
                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    url: '{{URL::route("memorial.ajax")}}',
                    type: 'post',
                    data: {type: 'guestbook', title: title, content: content, memorial_id: mid, status: 'published'},
                    success: function (data) {
                        $('#guestbook-content').find('u').each(function () {
                            $(this).remove()
                        })
                        var html = "";
                        html += '<li><h3><a href="#"><span><i class="fa fa-book"></i> ' + title + '</span></a></h3>';
                        html += '<div class="accordion-panel">' + content + '</div></li>';
                        html += $('#guestbook-content').html();
                        
                        $('#guestbook-content').html(html).accordion();
                        $('input[name="title"]', '#form-guestbook').val('');
                        $('#content', '#form-guestbook').val('');
                        $('.modal-body', '#form-guestbook').removeClass('loading-animate');
                        $('#form-guestbook').modal('hide');
                    },
                    error: function (data) {
                        $('.modal-body').removeClass('loading-animate');
                        $('.error-box').html('Your input don\'t validate').show();
                    }
                })
            });

            $('#btn-media').click(function (e) {
                e.preventDefault();
                $('.modal-body', '#form-media').addClass('loading-animate');
                var formData = new FormData();
                formData.append('type', 'media');
                formData.append('memorial_id', $('input[name="memorial_id"]', '#form-media').val());
                formData.append('title', $('input[name="title"]', '#form-media').val());
                formData.append('media_type', $('select[name="media_type"]', '#form-media').val());
                formData.append('url', $('input[name="url"]', '#form-media').val());
                formData.append('image', $('#image').get(0).files[0]);
                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    type: 'post',
                    url: '{{URL::route("memorial.ajax")}}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var html = '<div class="cell-3 media-item"><a class="zoom" href="' + data.url + '" title="'+data.title+'"><img src="' + data.image + '" alt="" /><span class="'+data.media_type+'" title="'+data.title+'"></span></a></div>';
                        $('#media-content').prepend(html);
                        $('a.zoom').prettyPhoto({social_tools: false});
                        $('.modal-body', '#form-media').removeClass('loading-animate');
                        $('input[name="title"]', '#form-media').val('');
                        $('input[name="url"]', '#form-media').val('');
                        $('#form-media').modal('hide');
                    },
                    error: function () {
                        $('.modal-body', '#form-media').removeClass('loading-animate');
                        $('.error-box').html('Your input don\'t validate').show();
                    }
                });
            });
            $('select[name="media_type"]', '#form-media').change(function(){
                var $type = $(this).val();
                if( $type == "image" ) {
                    $('.media-image').show();
                    $('.media-video').hide();
                } else {
                    $('.media-image').hide();
                    $('.media-video').show();
                }
            }).trigger('change');
        })
    })(jQuery)
</script>
@stop
