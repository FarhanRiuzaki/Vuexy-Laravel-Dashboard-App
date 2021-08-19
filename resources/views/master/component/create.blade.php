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
                {!! Form::open(array('route' => $route . '.store','method'=>'POST','id' => 'MyForm')) !!}
                {{-- Header --}}
                <div class="card-header border-bottom p-1 d-flex">
                    <div class="head-label">
                        <h4 class="mb-0">Add Component</h4>
                    </div>
                    {{ BackButton($route, true) }}
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('Page: ', 'page_id', $page, null, ['required']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('API name: ', 'api_name', null, null, ['placeholder' => 'API name', 'required']) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputSelect('API type: ', 'api_type', ['json' => 'json', 'php'=>'php'], null, ['required']) }}
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                            {{ Form::inputText('Type: ', 'type', 'default::', null, ['placeholder' => 'Type', 'required'])}}
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
                {{-- Param API --}}
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h4 class="mb-0">Add Component Parameter API</h4>
                    </div>
                </div>
                {{-- Body --}}
                <div class="table-responsive pt-2">
                    <table class="table table-bordered" id="tableParam">
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
                                    <button type="button" class="btn btn-success btn-icon btn-sm" id="addParam">
                                        <x-bi-plus-circle/>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- End of Param API --}}
                {{-- Component has Page --}}
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h4 class="mb-0">Add Component Page</h4>
                    </div>
                </div>
                {{-- Body --}}
                <div class="table-responsive pt-2">
                    <table class="table table-bordered" id="tablePage">
                        <thead>
                            <tr class="text-center vertical">
                                <th width='4%' class="font-weight-bold">No</th>
                                <th width='45%' class="font-weight-bold">Page</th>
                                <th width='45%' class="font-weight-bold">Sequence</th>
                                <th width='5%' class="font-weight-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-input text-center">
                                <td colspan="3"><b>Component Page</b></td>
                                <td width='5px'>
                                    <button type="button" class="btn btn-success btn-icon btn-sm" id="addPage">
                                        <x-bi-plus-circle/>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- End of Param API --}}
                {!! Form::close() !!}
            </div>
        </div>
    {{-- @endcan --}}

</div>
@endsection

@push('page-script')
<script>
    // add component parameter api
    no  = 0;
    $('body').on('click', '#addParam', function () {
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
                + '<button type="button" class="btn btn-danger btn-icon btn-sm dellParam">'+ '<i class="fa fa-times-circle" style="font-size:16px"></i>' +'</button>'
            + "</td>"
            + "</tr>";
        // console.log(html);
        $('#tableParam tbody').append(html);
    });

    // delete component parameter api
    $('body').on('click', '.dellParam', function () {
        var tr = $(this).closest("tr");
            tr.remove();

            $.each($("#tableParam tbody tr:not(.tr-input)"),function(e,item){
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

    var option = "";
    var arrPage = JSON.parse(`<?php echo $page; ?>`);
    $.each(arrPage, function( index, value ) {
        // console.log( index + ": " + value );
        option+= '<option value=' + index + '>' + value + '</option>'
    });

    // add component page
    nop  = 0;
    $('body').on('click', '#addPage', function () {
        nop++;
        html = '<tr>'
            + "<td class='numberPage text-center'>"
                + nop
            +"</td>"
            + "<td>"
                + "<select data-name='page_id' name='component_has_page["+nop+"][page_id]' class='form-control'>"
                    + option
                + "</select>"
            +"</td>"
            + "<td>"
                + "<input type='text' data-name='sequence' name='component_has_page["+nop+"][sequence]' class='form-control' value='" + nop + "'>"
            +"</td>"
            + "<td class='text-center'>"
                + '<button type="button" class="btn btn-danger btn-icon btn-sm dellPage">'+ '<i class="fa fa-times-circle" style="font-size:16px"></i>' +'</button>'
            + "</td>"
            + "</tr>";
        // console.log(html);
        $('#tablePage tbody').append(html);
    });

    // delete component parameter api
    $('body').on('click', '.dellPage', function () {
        var tr = $(this).closest("tr");
            tr.remove();

            $.each($("#tablePage tbody tr:not(.tr-input)"),function(p,item){
                //ganti nomor per TR
                var nop = p*1 +1;
                $(this).find(".numberPage").html(nop);
                $(this).find("input").val(nop);

                //NEANGAN INPUTAN PER TR
                $.each($(this).find("input"),function(s,f){
                    var pageName = $(this).data("name");
                    $(this).attr("name","component_has_page["+nop+"]["+pageName+"]");
                })
                $.each($(this).find("select"),function(s,f){
                    var pageName = $(this).data("name");
                    $(this).attr("name","component_has_page["+nop+"]["+pageName+"]");
                })
            })
            nop = nop - 1;
    });
</script>
@endpush
