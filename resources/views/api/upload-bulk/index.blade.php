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
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="head-label">
                    <h4 class="mb-0">{{ $page_title }}</h4>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => $route .'.store','method'=>'POST','id' => 'MyForm', 'enctype' => 'multipart/form-data')) !!}
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <strong>Upload file</strong>
                            <input type="file" name="upload_bulk" id="upload_bulk" class="form-control file" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btnSubmit" style="margin-top: 19px">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
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
<script>
$(function () {
    $('.btnSubmit').on('click', function(e){
        e.preventDefault();
        var file = $('.file').val();
        if(file == ''){
            swal.fire('Info', 'harap masukan file terlebih dahulu', 'info');
        }else{
        swal.fire({
            title: 'Are you sure?',
            text: "Upload Bulk!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            }).then(function(e) {
                if(e.isConfirmed){
                    $('form#MyForm').submit();
                    swal.fire({
                        icon : 'info',
                        title: 'Harap menunggu',
                        text: 'Sedang memproses data',
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick : false,
                        allowEscapeKey : false,
                        allowEnterKey : false
                    })
                }else{
                    return false;
                }
            });
        }
        // console.log(file);
    })
    $('body').on('change', '.file', function () {
        file_name   = this.files[0].name;
        size        = this.files[0].size / 1024;
        limit       = 1024 * 10;
        validExtensions = ["xls", "xlsx"];

        extension   = file_name.substr( (file_name.lastIndexOf('.') + 1) );
        console.log(extension);
        change_name = file_name.split('.').shift() + '' + parseInt(Math.random() * 10000) + '.' + extension;
        // set         = $(this).val().replace(file_name, change_name);
        // $(this).val(set);

        this.files[0].name = change_name;
        valid = true;
        if(validExtensions.indexOf(extension) == -1){
            swal.fire('Oops', 'file harus berektensi: xls, xlsx', 'info');
            $(this).val('');
            valid = false;
        }

        if(size > limit){
            swal.fire('Oops', 'file harus berukuran kurang dari 10MB', 'info');
            $(this).val('');
            valid = false;
        }
    });
});
</script>
@endpush
