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

@section('content')
<div class="row">
    <div class="col-sm-12 col-xl-8 offset-xl-2">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom p-1">
                            <div class="head-label">
                                <h4 class="mb-0">{{ $page_title }}</h4>
                            </div>
                            {{ CreateButton($route, $permission_type) }}
                        </div>
                        <table class="datatables-basic table table-bordered">
                            <thead>
                                <tr>
                                    <th width='20px'>No</th> 
                                    <th>Name</th>
                                    <th width='150px'>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal to add new record -->
            <div class="modal modal-slide-in fade" id="modals-slide-in">
                <div class="modal-dialog sidebar-sm">

                    <form class="add-new-record modal-content pt-0" method="POST" action="{{ route($route.'.store') }}">
                        @csrf
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Role Name</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                    placeholder="role name" name="name"/>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <strong>Permission: </strong>
                                        <br />
                                        <table class="table table-bordered " >
                                            @php
                                                $array = [];
                                                $i= 0;
                                            @endphp
                                            @foreach ($permission as $key => $value)
                                                @php
                                                    $key = explode('.', $value->name);
                                                    $key = $key[0];

                                                    $arr[$key][$value->id] = $value->name;
                                                    $i++;
                                                @endphp
                                            @endforeach
                                                <thead>
                                                    <tr>
                                                        <th class="bg-dark text-center" width='50px'><input type="checkbox" onchange="checkAll(this)" name="chk[]" > </th>
                                                        <th class="bg-dark text-white">Check All Permission</th>
                                                    </tr>
                                                </thead>

                                            @foreach ($arr as $key => $item)
                                                <thead>
                                                    <tr>
                                                        {{-- <th class="bg-dark" width='50px'></th> --}}
                                                        <th class="bg-dark text-white" colspan="2">[ {{ strtoupper($key) }} ] Permission</th>
                                                    </tr>
                                                </thead>

                                                @foreach ($item as $keys => $val)
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                    {{ Form::checkbox('permission[]', $val, false, array('class' => 'name checkable')) }}
                                                            </td>
                                                            <td>{{ $val }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info data-submit mr-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
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
            'use strict';

            var dt_basic_table = $('.datatables-basic'),
                assetPath = '../../../app-assets/',
                Title = 'Role Management';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            $('body').on('click', '.edit', function(params) {
                
                $('#modals-slide-in').modal('show');
            })

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('roles.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ],
                    "columnDefs": [{
                        className: "text-center",
                        "targets": [0, 2]
                    }],
                    order: [
                        [2, 'desc']
                    ],
                    displayLength: 10,
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
                $('div.head-label').html('<h6 class="mb-0">' + Title + '</h6>');
            }
        });
    </script>
@endpush