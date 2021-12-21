{{-- Extends layout --}}
@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

{{-- Content --}}
@section('content')
<div class="row">
    @php
        $class_offset = 'offset-2';
    @endphp
    {{-- @can('permission.create') --}}
        @php
            $class_offset = '';
        @endphp
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="card">
                {{-- Header --}}
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        @if(isset($edit))
                            <h4 class="mb-0">Edit Rekening</h4>
                        @else
                            <h4 class="mb-0">Add Rekening</h4>
                        @endif
                    </div>
                </div>
                {{-- Body --}}
                <div class="card-body pt-2">
                    @if(isset($edit))
                        @include('master.rekening.edit')
                    @else
                        @include('master.rekening.create')
                    @endif
                </div>
            </div>
        </div>
    {{-- @endcan --}}
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card card-custom">
            {{-- Header --}}
            <div class="card-header border-bottom p-1">
                <div class="head-label">
                    <h3 class="mb-0">List Rekening</h3>
                </div>
            </div>
            {{-- Body --}}
            <div class="card-body table-responsive" >
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr class="text-center">
                            <th width='30px'>No</th>
                            <th>No. Rekening</th>
                            <th>Currency</th>
                            <th>D/C</th>
                            <th>Desc</th>
                            <th width='100px'>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection


@push('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endpush

@push('page-script')
<script type="text/javascript">
$(function () {
    'use strict';
    var dt_basic_table = $('.yajra-datatable');
    var type    = '';
    var url     = "{{ route('account.datatable') }}";
    @if(isset($edit))
        var type    = 'edit';
    @else
        var type    = 'create';
    @endif
    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: url,
                type: 'GET',
                data: {
                    type: type
                }
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {data: 'number', name: 'number'},
                {data: 'currency', name: 'currency'},
                {data: 'type', name: 'type'},
                {data: 'desc', name: 'desc'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 0, 5] }
            ],
            scrollY: "500px",
            scrollCollapse: true,
            paging: false,
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            // buttons: [
            // {
            //     text: feather.icons['plus'].toSvg({
            //         class: 'mr-50 font-small-4'
            //     }) + 'Add New Record',
            //     className: 'create-new btn btn-primary',
            //     init: function (api, node, config) {
            //         $(node).removeClass('btn-secondary');
            //     }
            // }],
        }).on( 'draw', function () {
            $('[data-toggle="tooltip"]').tooltip();
        });;
    }

});
</script>
@endpush
