@extends('backend.body')

@section('title', trans('labels.backend.roles.titles.edit'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('labels.backend.roles.titles.edit')</h3>
                </div>
                {{ Form::model($role, ['route' => ['admin.role.update', $role], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}
                    @include('backend.role.form')

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{ route('admin.role.index') }}"
                               class="btn btn-danger btn-sm">@lang('buttons.back')</a>
                        </div>
                        <div class="pull-right">
                            {{ Form::submit(trans('buttons.edit'), ['class' => 'btn btn-success btn-sm']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
