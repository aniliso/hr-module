@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('hr::applications.title.applications') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('hr::applications.title.applications') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Başvurulan Pozisyon</th>
                            <th>{{ trans('hr::applications.form.gender') }}</th>
                            <th>{{ trans('hr::applications.form.first_name') }}</th>
                            <th>{{ trans('hr::applications.form.identity.birthdate') }}</th>
                            <th>{{ trans('hr::applications.form.marital') }}</th>
                            <th>{{ trans('core::core.table.updated at') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('hr::applications.title.create application') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.hr.application.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": '{{ route('admin.hr.application.index') }}',
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'position', name: 'position'},
                    {data: 'gender', name: 'gender'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'birthdate', name: 'birthdate'},
                    {data: 'marital', name: 'marital'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: true}
                ],
                stateSave: true,
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
