{{-- Extends layout --}}
@extends('layouts/contentLayoutMaster')

@section('title', $page_title) 

{{-- Content --}}
@section('content')
    @php
        // membuat parameter untuk kondisi exist data 
        // default 
        $chart          = 0;
        $table          = 0;
        $parameter_api  = [];
        
    @endphp

    @foreach ($template->templateDetail as $item)
        @if ($item->sequence == $sequence)

            <div class="row">
                @foreach ($item->page->component as $key => $comp)
                    @php
                        // mendapatkan folder path berdasarkan component type
                        $all    = explode("::", $comp->type, 2);
                        $chart  = explode("-", $all[1], 2);
                        // dump($arr);
                        if($chart[0]    == 'chart'){
                            $chart++;
                        }
                        if($all[1]      == 'table'){
                            $table++;
                        }
                        
                        // mengecek parameter api untuk component 
                        if (@$comp->componentParameterApi) {
                            foreach ($comp->componentParameterApi as $key_api => $val_api) {
                                $parameter_api[$val_api->name] = $val_api->value;
                            }
                        }
                        $api_param      = json_encode($parameter_api);
                        $parameter_api  = [];
                    @endphp

                    <div class="col-xs-12 col-md-{{ $comp->column_size }}">
                            @include('page.components.' . $all[0] . '.' . $all[1] )
                    </div>            
                @endforeach
            </div>
        @endif
    @endforeach
@endsection

@if ($table > 0)
    @include('page.components.load.table')
@endif
@if ($chart> 0)
    @include('page.components.load.chart')
@endif

@push('vendor-script')
    <script>
        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
@endpush
  