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
                            {{ BackButton($route) }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $role->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permissions:</strong>
                                        @if(!empty($rolePermissions))
                                            <table class="table table-bordered">
                                                @php
                                                    $array = [];
                                                    $i= 0;
                                                @endphp
                                                @foreach ($rolePermissions as $key => $value)
                                                    @php
                                                        $key = explode('.', $value->name);
                                                        $key = $key[0];
            
                                                        $arr[$key][$value->id] = $value->name;
                                                        $i++;
                                                    @endphp
                                                @endforeach
            
                                                @foreach ($arr as $key => $item)
                                                    <thead>
                                                        <tr>
                                                            <th class="bg-dark text-white">[ {{ strtoupper($key) }} ] Permission</th>
                                                        </tr>
                                                    </thead>
            
                                                    @foreach ($item as $keys => $val)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $val }}</td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
    </div>
</div>
@endsection