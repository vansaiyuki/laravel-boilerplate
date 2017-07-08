@extends('backend.body')

@section('title', trans('labels.backend.redirections.titles.index'))

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="box-title">@lang('labels.backend.redirections.import.title')</h3>
                </div>
                <div class="card-block">
                    {{ Form::open(['route' => 'admin.redirection.import', 'class' => 'form-inline', 'method' => 'POST', 'files' => true]) }}

                    {{ Form::bsFile('import', [
                        'required' => true,
                        'title' => trans('labels.backend.redirections.import.title'),
                        'form_group' => false,
                        'tooltip' => [
                            'position' => 'bottom',
                            'title' => trans('labels.backend.redirections.import.description'),
                        ],
                        'label_class' => 'mr-1',
                        'field_class' => 'mr-1'
                    ]) }}

                    {{ Form::submit(trans('buttons.redirections.import'), ['class' => 'btn btn-warning btn-md']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="pull-right">
                <a href="{{ route('admin.redirection.create') }}" class="btn btn-success btn-sm">@lang('buttons.redirections.create')</a>
            </div>
            <h3 class="box-title">@lang('labels.backend.redirections.titles.index')</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-block">
            <table id="dataTableBuilder" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"></table>
            {!! form_batch_action('admin.redirection.batch-action', 'dataTableBuilder', [
                'destroy' => trans('labels.backend.redirections.actions.destroy'),
                'enable' => trans('labels.backend.redirections.actions.enable'),
                'disable' => trans('labels.backend.redirections.actions.disable')
            ]) !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#dataTableBuilder').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('admin.redirection.search') }}',
                type: 'post'
            },
            columns: [{
                defaultContent: '',
                title: '',
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false,
                width: 15,
                className: 'select-checkbox'
            }, {
                title: '{{ trans('validation.attributes.source_path') }}',
                data: 'source',
                name: 'source',
            }, {
                title: '{{ trans('validation.attributes.active') }}',
                data: 'active',
                name: 'active',
                orderable: false,
                width: 50,
                className: 'text-center'
            }, {
                title: '{{ trans('validation.attributes.target_path') }}',
                data: 'target',
                name: 'target',
            }, {
                title: '{{ trans('validation.attributes.redirect_type') }}',
                data: 'type',
                name: 'type',
                width: 150,
            }, {
                title: '{{ trans('labels.created_at') }}',
                data: 'created_at',
                name: 'created_at',
                width: 100,
                className: 'text-center'
            }, {
                title: '{{ trans('labels.updated_at') }}',
                data: 'updated_at',
                name: 'updated_at',
                width: 100,
                className: 'text-center'
            }, {
                title: '{{ trans('labels.actions') }}',
                data: 'actions',
                name: 'actions',
                orderable: false,
                width: 75,
            }],
            select: {style: 'os'},
            order: [[1, 'asc']],
            rowId: 'id',
        });
    </script>
@endsection