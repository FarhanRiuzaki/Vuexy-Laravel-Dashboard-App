@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

@section('content')
<div class="row">
    <div class="col-sm-12 col-xl-8 offset-xl-2">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom p-1">
                            <div class="head-label">
                                <h4 class="mb-0">Role Management</h4>
                            </div>
                            {{ BackButton($route)}}
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => $route.'.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-50">
                                    {{ Form::inputText('Name: ', 'name', null, null, ['placeholder' => 'Name', 'required']) }}
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
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
                            <button class="btn btn-primary data-submit mr-1">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
    </div>
</div>
@endsection
@push('page-script')
    <script >
        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox'  && !(checkboxes[i].disabled) ) {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
    </script>
@endpush