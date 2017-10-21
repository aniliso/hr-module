@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('hr::positions.title.positions') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('hr::positions.title.positions') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.hr.position.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('hr::positions.button.create position') }}
                    </a>
                </div>
            </div>
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
                            <th>{{ trans('hr::positions.form.reference_no') }}</th>
                            <th>Başvuru Sayısı</th>
                            <th>{{ trans('hr::positions.form.name') }}</th>
                            <th>{{ trans('hr::positions.form.start_at') }}</th>
                            <th>{{ trans('hr::positions.form.end_at') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($positions)): ?>
                        <?php foreach ($positions as $position): ?>
                        <tr>
                            <td>
                                {{ $position->id }}
                            </td>
                            <td>
                                <a href="{{ route('admin.hr.position.edit', [$position->id]) }}">
                                    {{ $position->reference_no }}
                                </a>
                            </td>
                            <td>
                                {{ $position->applications()->count() }}
                            </td>
                            <td>
                                <a href="{{ route('admin.hr.position.edit', [$position->id]) }}">
                                    {{ $position->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.hr.position.edit', [$position->id]) }}">
                                    {{ $position->start_at->format('d.m.Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.hr.position.edit', [$position->id]) }}">
                                    {{ $position->end_at->format('d.m.Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.hr.position.edit', [$position->id]) }}">
                                    {{ $position->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.hr.position.edit', [$position->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.hr.position.destroy', [$position->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
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
        <dd>{{ trans('hr::positions.title.create position') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.hr.position.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
