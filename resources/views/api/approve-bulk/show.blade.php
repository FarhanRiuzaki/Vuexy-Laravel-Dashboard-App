@extends('layouts.contentLayoutMaster')

@section('title', $page_title) 

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
{{-- <div class="row">
    <div class="col-xs-10 col-sm-10 col-md-10 offset-lg-1"> --}}
        <div class="card card-custom {{ @$class }}">
            {{-- Header --}}
            <div class="card-header border-bottom p-1">
                <div class="head-label">
                    <h4 class="mb-0">Show Upload Bulk</h4>
                </div>
                <div class="dt-action-buttons text-right">
                    <div class="dt-buttons">
                        <a href="{{ route($route.'.index')}}" class="dt-button btn btn-primary btn-warning ">
                            <i data-feather="chevrons-left"></i>
                            Back
                        </a>
                        {{-- <button class="btn btn-success btn-approve"><x-bi-check/> Approve</button>
                        <button class="btn btn-danger btn-reject mr-1"><x-bi-x/> Reject</button> --}}
                    </div>
                </div>
            </div>
            {{-- Body --}}
            <div class="card-body pt-2 table-responsive" >
                <table class="table yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Telpon</th>
                            <th>Type</th>
                            <th>Adjust Point</th>
                            <th>Remark</th>
                            <th>Status</th>
                            <th>Response</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    {{-- </div>
</div> --}}
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
<script>
$(function () {
    var table = $('.yajra-datatable').DataTable({
        "bStateSave": true,
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route($route.'.show', $id) }}",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {data: 'phone_number', name: 'phone_number'},
            {data: 'type', name: 'type'},
            {data: 'adjust_point', name: 'adjust_point'},
            {data: 'remark', name: 'remark'},
            {data: 'status', name: 'status'},
            {data: 'response', name: 'response'},
        ],
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 5 ] }
        ],
        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        createdRow: (row, data, dataIndex, cells) => {
            $(cells[5]).css('background-color', data.status_color)
            $(cells[5]).css('color', '#fff')
        },
    }).on( 'draw', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
  });
  </script>
@endpush
