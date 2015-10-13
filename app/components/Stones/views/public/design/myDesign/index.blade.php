{{-- Update the Meta Description --}}
@section('meta_description')

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')

@stop

@section('styles')
    {{ HTML::style("http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css") }}
    {{ HTML::style("assets/public/exception/design/css/design.css") }}
@stop

@section('scripts')
    {{ HTML::script("http://code.jquery.com/ui/1.11.2/jquery-ui.js") }}
    <script type="text/javascript">
        function socialHandle( el ) {
            var self = $( el );
                data = self.data('social'),
                url = '';

            
            switch( data.type ) {
                case 'facebook':
                    url = 'http://www.facebook.com/sharer.php?u='+data.url;
                    break;
                case 'twitter':
                    url = 'http://twitter.com/share?url='+data.url;
                    break;
                case 'mailto':
                    url = 'https://plus.google.com/share?url='+data.url;
                    break;
            }

            window.open( url, '', 'left=10, top=10, width=500, height=300' );
        }

        function designDelHandle( el ) {
            var self = $( el ),
                item_el = self.parents('.stone-design-item').parent(),
                id = self.data('id');
            
            var result = confirm("Are you sure Delete this item?");
            if (result) {

                item_el.css({
                    'opacity': '0.5',
                    'pointer-events': 'none',
                });

                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                    type: "POST",
                    async: false,
                    url: '<?php echo Request::root(); ?>/design/ajax',
                    data: { handle: 'deleteDesignById', id: id },
                    success: function( result ) {
                        //console.log( result );
                        if( result == 1 ) {
                            item_el.remove();
                        }else {
                            alert('error: couldn\'t delete item');
                        }
                    }
                })
            }
        }
    </script>
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
                    $type = 'Design';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">{{ trans('cms.you_are_in') }}:</span>
                    <a href="{{ url('/') }}">{{ trans('cms.home') }}</a><span class="line-separate">/</span>
                    <a href="{{ url('design') }}">{{trans('Stones::design.stones.design.my_design')}}</a><span class="line-separate"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEADING -->
@stop

@section('content')
    <div class="padd-vertical-20">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <?php 
                    $user = \Sentry::getUser();
                    if( empty( $user->id ) || $user->id == 0 ){
                        ?>
                        {{trans('Stones::design.stones.design.you_need_login_to_show_your_design')}}. <a href="login/public">{{trans('Stones::design.stones.design.login')}}</a>
                        <?php
                    }else {
                    ?>
                        <h3 class="block-head side-heading center">{{trans('Stones::design.stones.design.my_design')}}</h3>
                        <br />
                        @if( count( $design_items ) > 0 )
                            <div class="stone-design-list">
                            @foreach( $design_items as $d_item ) 
                                <div class="cell-3">
                                    <div class="stone-design-item">
                                        <a href="design/edit/{{ $d_item->id }}">
                                            <img src="{{ $d_item->image }}"/>
                                        </a>
                                        <ul class="stone-design-social">
                                            <?php $root_url = Request::root().'/'; ?>
                                            <li><a onclick="socialHandle(this)" href="javascript:" data-social='{"type": "facebook", "url": "{{ $root_url }}design/edit/{{ $d_item->id }}"}' class="share-f"><i class="fa fa-facebook"></i></a></li>
                                            <li><a onclick="socialHandle(this)" href="javascript:" data-social='{"type": "twitter", "url": "{{ $root_url }}design/edit/{{ $d_item->id }}"}' class="share-t"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="mailto:someone@example.com?Subject=Design%20Stone&body={{ $root_url }}design/edit/{{ $d_item->id }}" data-social='{"type": "mailto", "url": "{{ $root_url }}design/edit/{{ $d_item->id }}"}' class="share-g"><i class="fa fa-envelope"></i></a></li>
                                            <li><a onclick="designDelHandle(this)" href="javascript:" class="design-del-item" data-id="{{ $d_item->id }}" title="delete"><i class="fa fa-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @else
                            {{trans('Stones::design.stones.design.not_item')}}
                        @endif
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@stop