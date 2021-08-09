{{-- Extends layout --}}
@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 offset-lg-2">
        <div class="card">
            {{-- Header --}}
            <div class="card-header border-bottom p-1">
                <div class="head-label">
                    <h4 class="mb-0">Create New User</h4>
                </div>
                {{ BackButton($route) }}
            </div>
            {{-- Body --}}
            <div class="card-body pt-2" >
                {!! Form::open(array('route' => 'users.store','method'=>'POST','id' => 'MyForm')) !!}
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            {{ Form::inputText('Name: ', 'name', null, null, ['placeholder' => 'Name', 'required']) }}
                            {{ Form::inputText('Username: ', 'username', null, null, ['placeholder' => 'Username', 'required']) }}
                            {{ Form::inputText('Email: ', 'email', null, null, ['placeholder' => 'Email', 'required', 'autocomplete' =>'off']) }}
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            {{ Form::inputPassword('Password: ', 'password', null, null, ['placeholder' => 'Password:', 'required', 'autocomplete' => 'new-password'])}}
                            {{ Form::inputPassword('Confirm Password: ', 'confirm-password', null, null, ['placeholder' => 'Confirm Password', 'required', 'equalTo' => '#password'])}}
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple', 'required')) !!}
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary data-submit mr-1">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
