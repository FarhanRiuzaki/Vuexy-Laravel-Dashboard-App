{{-- Extends layout --}}
@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

@section('content')
<style>

</style>
<div class="row">
    @php
        $class_offset = 'offset-2';
    @endphp
    {{-- @can('permission.create') --}}
        @php
            $class_offset = '';
        @endphp
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                {!! Form::model($component_edit, ['method' => 'PATCH','route' => [$route . '.update', $component_edit->id], 'id' => 'MyForm']) !!}
                {{-- Header --}}
                <div class="card-header border-bottom p-1 d-flex">
                    <div class="head-label">
                        <h4 class="mb-0">Show Component</h4>
                    </div>
                    {{ BackButton($route) }}
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('Page: ', 'page_id', $page, null, [ 'disabled']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('API name: ', 'api_name', null, null, ['placeholder' => 'API name', 'disabled']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('API type: ', 'api_type', null, null, ['placeholder' => 'API Type', 'disabled']) }}
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Type: ', 'type', null, null, ['placeholder' => 'Type', 'disabled'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Type Description: ', 'type_desc', null, null, ['placeholder' => 'Type description', 'disabled'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Header: ', 'header', null, null, ['placeholder' => 'Header', 'disabled'])}}
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Column Size: ', 'column_size', null, null, ['placeholder' => 'Column size', 'disabled'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Action: ', 'action', null, null, ['placeholder' => 'Action', 'disabled'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputNumber('Sequence: ', 'sequence', null, null, ['placeholder' => 'Sequence', 'disabled'])}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h4 class="mb-0">Show Component Parameter API</h4>
                    </div>
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-bordered tableParam" id='tableParam'>
                            <thead>
                                <tr class="text-center">
                                    <th width='2%' class="font-weight-bold">No</th>
                                    <th width='49%' class="font-weight-bold">Name</th>
                                    <th width='49%' class="font-weight-bold">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($comp_param_api as $key => $param)
                                <tr>
                                    <td class='text-center'>{{ ++$key }}</td>
                                    <td>{{ $param->name }}</td>
                                    <td>{{ $param->value }}</td>
                                </tr>
                            @empty
                                <tr id='no-data'>
                                    <td colspan="4" class="text-center">No data to display.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    {{-- @endcan --}}

</div>
@endsection
