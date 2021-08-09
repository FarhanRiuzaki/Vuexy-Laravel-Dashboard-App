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
                {!! Form::model($page_show, ['method' => 'PATCH','route' => [$route . '.update', $page_show->id], 'id' => 'MyForm']) !!}
                {{-- Header --}}
                <div class="card-header border-bottom p-1 d-flex">
                    <div class="head-label">
                        <h4 class="mb-0">Show Page</h4>
                    </div>
                    {{ BackButton($route) }}
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            {{ Form::inputText('Code: ', 'code', null, null, ['placeholder' => 'page code', 'disabled']) }}
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            {{ Form::inputText('URL: ', 'url', null, null, ['placeholder' => 'page name', 'disabled']) }}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                            {{ Form::inputTextarea('Description: ', 'description', null, null, ['placeholder' => 'page description', 'disabled', 'rows'=>'4','cols'=>'4', 'resize'=>'none']) }}
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    {{-- @endcan --}}

</div>
@endsection
