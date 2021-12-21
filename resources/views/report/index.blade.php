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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <br>
                <h3 align='center'><b>LAPORAN POINT</b></h3>  
                <br>
                <div class="row">
                    <div class="col-md-2 ">
                      {{ Form::inputText('Start Transaction Date:', 'start_date', date('Y-m-d'), 'flatpicker', ['required']) }}
                    </div>
                    <div class="col-md-2">
                      {{ Form::inputText('End Transaction Date:', 'end_date', date('Y-m-d'), 'flatpicker', ['required']) }}
                    </div>
                    {{-- <div class="col-md-3"></div> --}}
                    <div class="col-md-4">
                        <button class="btn btn-warning btnSearch" style="margin-top: 19.5px">Search</button>
                        {{-- <button class="btn btn-success btnSearch" style="margin-top: 19.5px">Excel</button> --}}
                        <button class="btn btn-danger btnPdf" style="margin-top: 19.5px">PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            {{-- Header --}}
            <div class="card-header border-bottom p-1">
                <div class="head-label">
                    <h4 class="mb-0">Laporan</h4>
                </div>
            </div>
            {{-- Body --}}
            <div class="card-body pt-2" >
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type</th>
                            <th>Phone Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Adjust Point</th>
                            <th>Remark</th>
                            <th>Created Date</th>
                            {{-- <th>Status</th> --}}
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

$(document).ready(function(){

$('.flatpicker').flatpickr();

$('.btnSearch').on('click', function(){
    var start_date  = $('#start_date').val();
    var end_date    = $('#end_date').val();
    // console.log(start_date, end_date);
    
    // Set dynamic parameters for the data table
    $('.dataTable').data('dt_params', { start_date: start_date, end_date:end_date});
    // Redraw data table, causes data to be reloaded
    $('.dataTable').DataTable().draw();
});

$('.btnPdf').on('click', function(){
    var start_date  = $('#start_date').val();
    var end_date    = $('#end_date').val();
    var url         = "{{ route('report.createPDF') }}?start_date=" + start_date + "&end_date=" + end_date;
    window.open(url, '_BLANK');

    // // Set dynamic parameters for the data table
    $('.dataTable').data('dt_params', { start_date: start_date, end_date:end_date});
    // Redraw data table, causes data to be reloaded
    $('.dataTable').DataTable().draw();
});
option = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url: "{{ route( $route . '.index') }}",
        // data:{
        //     start_date: start_date,
        //     end_date: end_date
        // },
        type: 'GET',
        data: function ( d ) {
            // Retrieve dynamic parameters
            var dt_params = $('.dataTable').data('dt_params');
            // Add dynamic parameters to the data object sent to the server
            if(dt_params){ $.extend(d, dt_params); }
        }
    },
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {data: 'type', name: 'type'},
        {data: 'phone_number', name: 'phone_number'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'adjust_point', name: 'adjust_point'},
        {data: 'remark', name: 'remark'},
        {
        data: 'created_at',
        name: 'created_at',
        class: 'text-center',
        },
    ],
    "order": [[ 1, "desc" ]],
    dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
};

// FUNCTION DATATABLE DISINI
$('.dataTable').DataTable(option).on( 'draw', function () {
    $('[data-toggle="tooltip"]').tooltip();
});
});
</script>
@endpush
