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
<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label">
            <h4 class="mb-0">{{ $page_title }}</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr class='text-center'>
                    <th width='20px'>No</th>
                    <th>Filename</th>
                    <th>Total Transaksi</th>
                    <th>Total Success</th>
                    <th>Total Failed</th>
                    <th width="80px">Start Time</th>
                    <th width="80px">End Time</th>
                    <th width="80px">Progres</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
<script>
$(function () {
    setInterval(() => {
        $('.yajra-datatable').DataTable().draw();
    }, 10000);
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route($route.'.index') }}",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {data: 'filename', name: 'filename'},
            {data: 'total_trx', name: 'total_trx'},
            {data: 'success', name: 'success'},
            {data: 'failed', name: 'failed'},
            {data: 'start_time', name: 'start_time'},
            {data: 'end_time', name: 'end_time'},
            {data: 'progres', name: 'progres'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 7, 8 ] }
        ],
        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    }).on( 'draw', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

  });

    //   function activate user
    $('body').on('click', '.btn-approve', function (e) {
        e.preventDefault();
        var url = $(this).data('remote');
        console.log(url);
        swal.fire({
        title: 'Are you sure?',
        text: "Transaksi akan di approve",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
        }).then(function(e) {
            if(e.value){
                window.open(url,'NewWin',
                            'toolbar=no,status=no,width=50,height=50')  
            }
        })
    });
</script>
@endpush
