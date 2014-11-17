@section('styles')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ URL::to('assets/backend/default/plugins/data-tables/DT_bootstrap.css') }}" />
    <!-- END PAGE LEVEL STYLES -->
@stop

@section('content')
    <div class="row-fluid">
        <div class="span12">
            Hello MyTraining...
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
