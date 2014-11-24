@section('styles')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="{{ URL::to('assets/backend/default/plugins/data-tables/DT_bootstrap.css') }}" />
<!-- END PAGE LEVEL STYLES -->
@stop

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div id="errors-div">
            @if ($errors->has('memorial_id') || $errors->has('user_id') )
                <div class="alert alert-error hide" style="display: block;">
                  <button data-dismiss="alert" class="close">×</button>
                  <p>{{ $errors->first("memorial_id", "<span class=\'help-inline\'>:message</span>") }}
                      {{ $errors->first("user_id", "<span class=\'help-inline\'>:message</span>") }}</p>
               </div>
           @endif
       </div>
        <!-- BEGIN EXAMPLE TABLE widget-->
        <div class="widget light-gray box">
            <div class="blue widget-title">
                <h4><i class="icon-th-list"></i> All Entries</h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#widget-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="widget-body">
                
                <table class="table table-striped table-hover table-bordered" id="sample_1">
                    <thead>
                        <tr>
                            <th class="span1"><input type="checkbox" class="select_all" /></th>
                            <th>Username</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th class="span3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user )
                        <tr>
                            <td>{{ Form::checkbox($user->id, 'checked', false) }}</td>

                            <td>{{ $user->username }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($current_user->hasAccess("memorial-users.create"))
                                {{ Form::open(array('route' => array($link_type . '.memorial.users.store',$memorial->id), 'method' => 'POST', 'class' => 'inline')) }}
                                {{Form::hidden('memorial_id', $memorial->id)}}
                                {{ Form::hidden('user_id', $user->id) }}
                                <button type="submit" class="btn btn-success btn-mini"><i class="icon-add"></i> Add user</button>
                                {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE widget-->
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
jQuery(document).ready(function () {
    TableManaged.init();
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $(function () {
        $('#selected_ids').val('');

        $('.select_all').change(function () {
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
        if (type === undefined)
            type = 'record';

        doDelete = confirm("Are you sure you want to delete the selected " + type + "s ?");
        if (!doDelete) {
            // If cancel is selected, do nothing
            return false;
        }

        $('#sample_1 tbody').find('input:checked').each(function () {
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
