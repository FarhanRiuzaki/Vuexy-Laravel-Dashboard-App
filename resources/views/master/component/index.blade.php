{{-- Extends layout --}}
@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

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
            <div class="card card-custom">
                {{-- Header --}}
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        <h3 class="mb-0">List Component</h3>
                    </div>
                    <a href="{{ route($route. '.create') }}" class="btn font-weight-bold btn-primary">Add New Component</a>
                </div>
                {{-- Body --}}
                <div class="card-body table-responsive" >
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr class="text-center">
                                <th width="4%">No</th>
                                <th width="26%">API Name</th>
                                <th width="16%">Type</th>
                                <th width="21%">Header</th>
                                <th width="18%">Created At</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    {{-- @endcan --}}

</div>
@endsection

@push('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
@endpush

@push('page-script')
<script>
    $(function (){
        'use strict';
        var dt_basic_table = $('.yajra-datatable');
        var type    = '';   // def type
        var url     = "{{ route($route . '.datatable') }}";
        // DataTable with buttons
        // --------------------------------------------------------------------
        if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: { url: url },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {data: 'api_name', name: 'api_name'},
                    {data: 'type', name: 'type'},
                    {data: 'header', name: 'header'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "columnDefs": [
                    { className: "text-center", "targets": [ 0, 5] }
                ],
                "order": [[ 4, "desc" ]],
                scrollY: "400px",
                scrollCollapse: true,
                paging: false,
                dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            }).on( 'draw', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });;
        }
    });
</script>
@endpush
