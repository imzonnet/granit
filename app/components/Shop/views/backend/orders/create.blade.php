@section('styles')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ URL::to('assets/backend/default/plugins/data-tables/DT_bootstrap.css') }}" />
    <!-- END PAGE LEVEL STYLES -->

    <style>
        .user-info{}
        .user-info .title,
        .product-info .title{
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .user-info .user-group{
            margin-bottom: 10px;
        }
        .user-group label{
            display: inline-block;
            vertical-align: top;
            width: 130px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .product-payment-item{
            padding: 10px;
            background: #FFF;
            text-align: center;
            margin-bottom: 10px;
        }
        .thumb{
            display: inline-block;
            vertical-align: top;
            max-width: 250px;
        }
        .design-info{
            text-align: left;
        }
        .design-info > ul{
            padding: 0;
            margin: 0;
            margin-top: 20px;
        }
        .design-info > ul ul{
            background: #eaeaea;
            padding: 10px;
            margin-top: 10px;
        }
        .design-info > ul li{
            list-style: none;
        }
        .design-info li{
            padding: 10px 0;
            border-bottom: 1px solid #fafafa;
        }
        .design-info li:last-child{
            border: none;
        }
        .design-info li span{
            display: inline-block;
            width: 130px;
            vertical-align: top;
            font-weight: bold;
        }
    </style>
@stop

@section('content')
	<?php 
        $user_info = json_decode( $order->user_info ); 
        $products_info = json_decode( $order->products );
    ?>
	<div class="row-fluid">
        <div class="span6">
            <div class="user-info">
                <h4 class="title">{{ trans('Shop::cms.shop.user_info') }}</h4>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.first_name') }}: </label>
                    <span>{{ $user_info->first_name }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.last_name') }}: </label>
                    <span>{{ $user_info->last_name }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.email') }}: </label>
                    <span>{{ $user_info->email }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.phone') }}: </label>
                    <span>{{ $user_info->phone }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.address') }}: </label>
                    <span>{{ $user_info->address }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.note') }}: </label>
                    <span>{{ $order->customer_message }}</span>
                </div>
                <div class="user-group">
                    <label>{{ trans('Shop::cms.shop.create_date') }}: </label>
                    <span>{{ $order->created_at }}</span>
                </div>
            </div>
            <br />
            <div class="">
                <h3>Total: {{ $order->total_price }}</h3>
                <p>status: {{ $order->status }}</p>
            </div>
        </div>
        <div class="span6">
            <div class="product-info">
                <h4 class="title">{{ trans('Shop::cms.shop.product_info') }}</h4>
                @if( count( $products_info ) > 0 )
                    @foreach( $products_info as $pitem )
                        <div class="product-payment-item">
                            <a href="{{ url( $pitem->thumb ) }}" class="thumb" target="_blank"><img src="{{ url( $pitem->thumb ) }}"/></a>
                            <?php 
                                // echo '<pre>'; print_r( $pitem ); echo '</pre>'; 
                                $info = $pitem->info;
                            ?>
                            <div class="design-info">
                                <ul>
                                    <li><span>Type</span>: {{ $info->type }}</li>
                                    <li><span>Product</span>: {{ $info->pid }}</li>
                                    <li><span>Color</span>: {{ $info->cid }}</li>
                                    <li><span>Word Number</span>: {{ $info->word_number }}</li>
                                    <li><span>First Text</span>: {{ $info->ftest->text }}</li>
                                    <!-- START Name -->
                                    <?php 
                                    $_name = $info->names;
                                    $html_name = array();
                                    if( count( $_name ) > 0 ):
                                        array_push( $html_name, '<li><span>Names</span>:' );
                                        foreach( $_name as $nameItem ) :

                                            array_push( $html_name, sprintf(
                                                '<ul>
                                                    <li><span>Name</span>: %s</li>
                                                    <li><span>Job or Place</span>: %s</li>
                                                    <li><span>Birth Day</span>: %s</li>
                                                    <li><span>Died Day</span>: %s</li>
                                                </ul>', 
                                                    $nameItem->name, 
                                                    $nameItem->add_job_or_place,
                                                    $nameItem->b_date,
                                                    $nameItem->d_date
                                                ) );

                                        endforeach;
                                        array_push( $html_name, '</li>' );

                                        echo implode( '', $html_name );
                                    endif; 
                                    ?>
                                    <!-- END Name -->

                                    <!-- START MWords -->
                                    <?php 
                                    $_mwords = $info->mwords;
                                    $html_mwords = array();
                                    if( count( $_mwords ) > 0 ) :
                                        array_push( $html_mwords, '<li><span>Memory Words</span>:' );
                                        foreach( $_mwords as $mwordItem ) :
                                            if( ! empty( $mwordItem->text ) ) :
                                                array_push( $html_mwords, sprintf( 
                                                    '<ul>
                                                        <li><span>Text</span>: %s</li>
                                                    </ul>', 
                                                    $mwordItem->text
                                                ) );
                                            endif;
                                        endforeach;
                                        array_push( $html_mwords, '</li>' );

                                        echo implode( '', $html_mwords );
                                    endif;
                                    ?>
                                    <!-- END MWords -->

                                    <!-- START Poem -->
                                    <?php 
                                    $_poem = $info->poem;
                                    $html_poem = array();
                                    if( count( $_poem ) > 0 ) :
                                        array_push( $html_poem, '<li><span>Poem</span>:' );
                                        foreach( $_poem as $poemItem ) :
                                            if( ! empty( $poemItem->text ) ) :
                                                array_push( $html_poem, sprintf(
                                                    '<ul>
                                                        <li><span>Text</span>: %s</li>
                                                    </ul>',
                                                    $poemItem->text
                                                    ) );
                                            endif;
                                        endforeach;
                                        array_push( $html_poem, '</li>' );

                                        echo implode( '', $html_poem );
                                    endif;
                                    ?>
                                    <!-- END Poem -->

                                    <!-- START accessories -->
                                    <?php 
                                    $_accessories = $info->accessories;
                                    $html_accessories = array();
                                    if( count( $_accessories ) > 0 ) :
                                        array_push( $html_accessories, '<li><span>Accessories</span>:' );
                                        foreach( $_accessories as $accessorieItem ) :

                                            $imageUpload = isset(  $accessorieItem->imageUpload ) ?  $accessorieItem->imageUpload : '';
                                            $imageRender = isset(  $accessorieItem->imageRender ) ?  $accessorieItem->imageRender : '';

                                            array_push( $html_accessories, sprintf(
                                                '<ul>
                                                    <li><span>ID</span>: %s</li>
                                                    <li><span>Type</span>: %s</li>
                                                    <li><span>Upload</span>: <a href="%s" target="_blank">%s</a></li>
                                                    <li><span>Render</span>: <img src="%s"/></li>
                                                </ul>',
                                                $accessorieItem->id,
                                                $accessorieItem->icon_type,
                                                $imageUpload,
                                                $imageUpload,
                                                $imageRender
                                                ) );
                                        endforeach;
                                        array_push( $html_accessories, '</li>' );

                                        echo implode( '', $html_accessories );
                                    endif;
                                    ?>
                                    <!-- END accessories -->
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div> 
    </div>
@stop

@section('scripts')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{ URL::to("assets/backend/default/plugins/data-tables/jquery.dataTables.js") }}"></script>
    <script type="text/javascript" src="{{ URL::to("assets/backend/default/plugins/data-tables/DT_bootstrap.js") }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @parent
    <script src="{{ URL::to("assets/backend/default/scripts/table-managed.js") }}"></script>
    <script>
       jQuery(document).ready(function() {
          TableManaged.init();
       });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(function() {
            $('#selected_ids').val('');

            $('.select_all').change(function() {
                var checkboxes = $('#sample_1 tbody').find(':checkbox');

                if ($(this).is(':checked')) {
                    checkboxes.attr('checked', 'checked');
                    restore_uniformity();
                } else {
                    checkboxes.removeAttr('checked');
                    restore_uniformity();
                }
            });
        });
        function deleteRecords(th, type) {
            if (type === undefined) type = 'record';

            doDelete = confirm("Are you sure you want to delete the selected " + type + "s ?");
            if (!doDelete) {
                // If cancel is selected, do nothing
                return false;
            }

            $('#sample_1 tbody').find('input:checked').each(function() {
                value = $('#selected_ids').val();
                $('#selected_ids').val(value + ' ' + this.name);
            });
        }
        function restore_uniformity() {
            $.uniform.restore("input[type=checkbox]");
            $('input[type=checkbox]').uniform();
        }
    </script>
@stop