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
                        <h4 class="mb-0">Edit Component</h4>
                    </div>
                    {{ BackButton($route, true) }}
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('Page: ', 'page_id', $page, null, [ 'required']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('API name: ', 'api_name', null, null, ['placeholder' => 'API name', 'required']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('API type: ', 'api_type', ['json' => 'json', 'php'=>'php'], null, ['required']) }}
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Type: ', 'type', null, null, ['placeholder' => 'Type', 'required'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Type Description: ', 'type_desc', null, null, ['placeholder' => 'Type description', 'required'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Header: ', 'header', null, null, ['placeholder' => 'Header', 'required'])}}
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('Column Size: ', 'column_size', ['3' => 'Col-3', '4' => 'Col-4', '6' => 'Col-6', '8' => 'Col-8', '12' => 'Col-12'], null, ['required'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Action: ', 'action', null, null, ['placeholder' => 'Action', 'required'])}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputNumber('Sequence: ', 'sequence', null, null, ['placeholder' => 'Sequence', 'required'])}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h4 class="mb-0">Edit Component Parameter API</h4>
                    </div>
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-bordered tableParam" id='tableParam'>
                            <thead>
                                <tr class="text-center vertical">
                                    <th width='4%' class="font-weight-bold">No</th>
                                    <th width='45%' class="font-weight-bold">Name</th>
                                    <th width='45%' class="font-weight-bold">Value</th>
                                    <th width='5%' class="font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-input text-center">
                                    <td colspan="3"><b>Parameter API</b></td>
                                    <td width='5px'>
                                        <button type="button" class="btn btn-success btn-icon btn-sm addParam">
                                            <x-bi-plus-circle/>
                                        </button>
                                    </td>
                                </tr>
                                @forelse ($comp_param_api as $key => $param)
                                <tr>
                                    <td class='text-center number'>{{ ++$key }}</td>
                                    <td>{{ Form::inputText(null, 'component_parameter_api['.$key.'][name]', $param->name, null, ['placeholder' => 'name', 'required'])}}</td>
                                    <td>{{ Form::inputText(null, 'component_parameter_api['.$key.'][value]', $param->value, null, ['placeholder' => 'value', 'required'])}}</td>
                                    <td class='text-center'>
                                        <button type="button" class="btn btn-danger btn-sm btn-icon dellParam">
                                            <i class="fa fa-times-circle" style="font-size:16px"></i></button></td>
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

@push('page-script')
<script>
    var first_row = $('table tr:last td').text();

    if(first_row == "No data to display."){
        no = 0;
    } else {
        var no = document.getElementById("tableParam").rows.length;
        no--;
        no--;
    }
    
    // add component parameter api
    $('body').on('click', '.addParam', function () {
        if(first_row == "No data to display."){
            $("tr[id='no-data']").remove();
        }
        no++;
        html = '<tr>'
            + "<td class='number text-center'>"
                + no
            +"</td>"
            + "<td>"
                + "<input type='text' data-name='name' name='component_parameter_api["+no+"][name]' class='form-control'>"
            +"</td>"
            + "<td>"
                + "<input type='text' data-name='value' name='component_parameter_api["+no+"][value]' class='form-control'>"
            +"</td>"
            + "<td class='text-center'>"
                + '<button type="button" class="btn btn-danger btn-icon btn-sm dellParam"><i class="fa fa-times-circle-o" style="font-size:16px"></i></button>'
            + "</td>";
        $('.tableParam tbody').append(html);
    });

    // delete component parameter api
    $('body').on('click', '.dellParam', function () {
        var tr = $(this).closest("tr");
            tr.remove();

            $.each($(".tableParam tbody tr:not(.tr-input)"),function(e,item){
                //ganti nomor per TR
                var no = e*1 +1;
                $(this).find(".number").html(no);

                //NEANGAN INPUTAN PER TR
                $.each($(this).find("input"),function(s,f){
                    var dataName = $(this).data("name");
                    $(this).attr("name","component_parameter_api["+no+"]["+dataName+"]");
                })
            })
            no = no - 1;
    });
</script>
@endpush
