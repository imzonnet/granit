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
                    $type = 'Testimonial';
                }
                ?>
                <h1 class="fx" style="">{{ $type }}</h1>
                <div data-animate="fadeInUp" class="breadcrumbs main-bg fx animated fadeInUp" style="">
                    <span class="bold">You Are In:</span>
                    <a href="{{ url('/') }}">Home</a><span class="line-separate">/</span>
                    <a href="{{ url('products') }}">Products</a><span class="line-separate"></span>
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
        @if (Session::has('success_message'))
        <div class="box success-box"> 
            <a href="#" class="close-box"><i class="fa fa-times"></i></a>
            <strong>Success!</strong> {{ Session::get('success_message') }}
        </div>
        @endif
        @if ($errors->has())
        <div class="box warning-box"> 
            <a href="#" class="close-box"><i class="fa fa-times"></i></a>
            You have some form errors. Please check below.
        </div>
        @endif

        <div class="row">
            <div class="cell-1"></div>
            <div class="cell-5">
                <div class="gry-bg padd-horizontal-30">
                    <div class="contact-form padd-vertical-30">
                        <h3 class="main-color">Write Review</h3>
                        {{Form::open(['route' => 'testimonial.store', 'method' => 'post', 'id'=>'form-review'])}}
                        <div class="form-input {{ $errors->has('name') ? 'error' : '' }}">
                            {{Form::label('name', 'Name:')}}
                            {{Form::text('name', Input::old('name'), ['class'=>"form-control"]) }}
                            {{ $errors->first('name', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input {{ $errors->has('title') ? 'error' : '' }}">
                            {{Form::label('title', 'Title:')}}
                            {{Form::text('title', Input::old('title'), ['class'=>"form-control"]) }}
                            {{ $errors->first('title', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input {{ $errors->has('description') ? 'error' : '' }}">
                            {{ Form::label('description', 'Description:')}}
                            {{ Form::textarea('description', Input::old('description'), ['class'=>"form-control"]) }}
                            {{ $errors->first('description', '<span class="red">:message</span>') }}
                        </div>
                        <div class="form-input">
                            {{Form::hidden('rate', 1, ['id' => 'exp-rate', 'class'=>"form-control", 'data-type'=>"exp-rating", 'data-min'=>"1", 'data-max'=>"5"]) }}
                        </div>
                        <div class="form-input">
                            <button type="submit" class="btn btn-default" name="form_close">Close</button>
                            <button type="submit" class="btn main-bg" name="form_save">Save</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <div class="cell-1"></div>
            <div class="cell-5">
                <div class="gry-bg padd-horizontal-20">
                    <div id="form-preview" class="testimonials-list padd-vertical-20">
                        <h3 class="main-color">Preview</h3>
                        <div class="testimonials-bg"> 
                            <h4><strong class="text-title">Your Title</strong></h4>
                            <span class="text-description">This is description</span> 
                            <div class="rating"> 
                                <span class="fa fa-star"></span><span class="fa fa-star"></span>
                                <span class="fa fa-star"></span><span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> 
                            </div> 
                        </div>
                        <div class="testimonials-name"><strong class="text-name">Your Name</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')

<script type="text/javascript">
    (function ($) {
        /*
         * Star Rating
         */
        $('[data-type="exp-rating"]').each(function () {
            var $this = $(this),
                    $min = $this.data('min'),
                    $max = $this.data('max');
            build($this, $min, $max);
        });

        function build($el, $min, $max) {
            var form_id = $el.attr('name');
            $el.after('<div id="' + form_id + '" class="exp-rate"></div>');
            for ($min; $min <= $max; $min++) {
                $('#' + form_id).append('<span class="exp-rate-star exp-rate-star-' + $min + '" data-value="' + $min + '"><i class="fa fa-star"></i></span>');
            }
            handler($el, form_id);
        }

        function handler($el, form_id) {
            $('.exp-rate-star', $('#' + form_id)).hover(function () {
                $(this).prevAll().andSelf().addClass('hover');
                $(this).nextAll().removeClass('hover');
                if ($(this).hasClass('active')) {
                    $(this).prevAll().andSelf().removeClass('hover-active');
                    $(this).nextAll().addClass('hover-active');
                }
            }, function () {
                $(this).prevAll().andSelf().removeClass('hover hover-active');
                $(this).nextAll().removeClass('hover-active');
            });
            $('.exp-rate-star', $('#' + form_id)).on('click', function (e) {
                $(this).prevAll().andSelf().addClass('active');
                $(this).nextAll().removeClass('active');
                set_votes($el, $(this).parent(), $(this).data('value'));
            });
        }
        function set_votes($el, widget, id) {
            $el.val(id);
            $(widget).find('.exp-rate-star-' + id).prevAll().andSelf().addClass('hover');
            $(widget).find('.exp-rate-star-' + id).nextAll().removeClass('hover');
        }

        /**
         * Upate Preview
         */
        var form = $('#form-review'), form_prev = $('#form-preview');

        $('.form-control', form).keyup(function () {
            var $this = $(this), id = $this.attr('id');

            if ($(this).val() != "") {
                $('.text-' + id, form_prev).text($(this).val());
            } else {
                $('.text-' + id, form_prev).text('...');
            }
        });
        $('.exp-rate-star').click(function () {
            var $this = $(this),
                    $val = $this.data('value');
            console.log($val);
            $('.rating', form_prev).html('');
            for (i = 0; i < $val; i++) {
                $('.rating', form_prev).append('<span class="fa fa-star"></span>');
            }
            for (i = 0; i < 5 - $val; i++) {
                $('.rating', form_prev).append('<span class="fa fa-star-o"></span>');
            }
        });

    }(jQuery));

</script>

@stop