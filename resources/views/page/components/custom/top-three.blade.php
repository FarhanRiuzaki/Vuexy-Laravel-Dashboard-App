{{-- logic hide label --}}
@php
    $cek['yesterday']['MERCHANT']       = 0;
    $cek['yesterday']['PAYEMNT SOURCE'] = 0;
    $cek['month']['MERCHANT']           = 0;
    $cek['month']['PAYEMNT SOURCE']     = 0;
    $cek['year']['MERCHANT']            = 0;
    $cek['year']['PAYEMNT SOURCE']      = 0;
    
    $cek['yesterday']['amt']['MERCHANT']       = 0;
    $cek['yesterday']['amt']['PAYEMNT SOURCE'] = 0;
    $cek['month']['amt']['MERCHANT']           = 0;
    $cek['month']['amt']['PAYEMNT SOURCE']     = 0;
    $cek['year']['amt']['MERCHANT']            = 0;
    $cek['year']['amt']['PAYEMNT SOURCE']      = 0;
@endphp
{{-- @php
    dd($data);
@endphp --}}
@if ($data[$comp->sequence] != '')
    @foreach ($data[$comp->sequence] as $item)
        @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY QTY')
            @php
                if($item->groups == 'MERCHANT'){        $cek['yesterday']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['yesterday']['PAYEMNT SOURCE']++;}
            @endphp
        @endif
        @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY QTY')
            @php
                if($item->groups == 'MERCHANT'){        $cek['month']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['month']['PAYEMNT SOURCE']++;}
            @endphp
        @endif
        @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY QTY')
            @php
                if($item->groups == 'MERCHANT'){        $cek['year']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['year']['PAYEMNT SOURCE']++;}
            @endphp
        @endif

        @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY AMOUNT')
            @php
                if($item->groups == 'MERCHANT'){        $cek['yesterday']['amt']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['yesterday']['amt']['PAYEMNT SOURCE']++;}
            @endphp
        @endif
        @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY AMOUNT')
            @php
                if($item->groups == 'MERCHANT'){        $cek['month']['amt']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['month']['amt']['PAYEMNT SOURCE']++;}
            @endphp
        @endif
        @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY AMOUNT')
            @php
                if($item->groups == 'MERCHANT'){        $cek['year']['amt']['MERCHANT']++;}
                if($item->groups == 'PAYEMNT SOURCE'){  $cek['year']['amt']['PAYEMNT SOURCE']++;}
            @endphp
        @endif
    @endforeach

    <div class="card">
        <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start mb-0 pb-0">
            <p class="font-weight-bolder mt-50">{{ $comp->header }}</p>
            <div class="heading-elements">
                <div class="btn-group">
                    <button class="btn btn-flat-secondary dropdown-toggle waves-effect current-view" type="button" id="dropdownMenuButton600" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View by Total Transaction
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton600" style="">
                        <a class="dropdown-item by-qty" href="javascript:void(0);">View by Total Transaction</a>
                        <a class="dropdown-item by-amount" href="javascript:void(0);">View by Amount Transaction</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body" id="by-qty">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="yesterday-tab" data-toggle="tab" href="#yesterday" aria-controls="home" role="tab" aria-selected="true"><x-bi-calendar2-event/> Yesterday</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#monthly" aria-controls="profile" role="tab" aria-selected="false"><x-bi-calendar3/> Month</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" aria-controls="about" role="tab" aria-selected="false"><x-bi-calendar/> Year</a>
            </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="yesterday" aria-labelledby="yesterday-tab" role="tabpanel">
                    <div id="trx">
                        <div class="row">
                            @if ($cek['yesterday']['MERCHANT'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yesterday Merchant</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY QTY')
                                        {!! topThree($item, 'MERCHANT') !!}
                                    @endif   
                                @endforeach
                            </div>
                            @if ($cek['yesterday']['PAYEMNT SOURCE'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yesterday Payment</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY QTY')
                                        {!! topThree($item, 'PAYEMNT SOURCE') !!}
                                    @endif   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tab-pane" id="monthly" aria-labelledby="monthly-tab" role="tabpanel">
                <div id="trx">
                    <div class="row">
                        @if ($cek['month']['MERCHANT'] > 0)
                            <div class="col-12">
                                <div class="divider divider-left">
                                    <div class="divider-text">Monthly Merchant</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 row">
                            @foreach ($data[$comp->sequence] as $item)
                                @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY QTY')
                                    {!! topThree($item, 'MERCHANT') !!}
                                @endif   
                            @endforeach
                        </div>

                        @if ($cek['month']['PAYEMNT SOURCE'] > 0)
                            <div class="col-12">
                                <div class="divider divider-left">
                                    <div class="divider-text">Monthly Payment</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 row">
                            @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY QTY')
                                    {!! topThree($item, 'PAYEMNT SOURCE') !!}
                                    @endif   
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                <div class="tab-pane" id="yearly" aria-labelledby="yearly-tab" role="tabpanel">
                    <div id="trx">
                        <div class="row">
                            @if ($cek['year']['MERCHANT'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yearly Merchant</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY QTY')
                                        {!! topThree($item, 'MERCHANT') !!}
                                    @endif   
                                @endforeach
                            </div>

                            @if ($cek['year']['PAYEMNT SOURCE'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yearly Payment</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                        @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY QTY')
                                        {!! topThree($item, 'PAYEMNT SOURCE') !!}
                                        @endif   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body " id="by-amount" style="display: none; margin-top: -21px">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="yesterday-amt-tab" data-toggle="tab" href="#yesterday-amt" aria-controls="home" role="tab" aria-selected="true"><x-bi-calendar2-event/> Yesterday</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="monthly-amt-tab" data-toggle="tab" href="#monthly-amt" aria-controls="profile" role="tab" aria-selected="false"><x-bi-calendar3/> Month</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="yearly-amt-tab" data-toggle="tab" href="#yearly-amt" aria-controls="about" role="tab" aria-selected="false"><x-bi-calendar/> Year</a>
            </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="yesterday-amt" aria-labelledby="yesterday-amt-tab" role="tabpanel">
                    <div id="trx">
                        <div class="row">
                            @if ($cek['yesterday']['amt']['MERCHANT'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yesterday Merchant</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY AMOUNT')
                                    {!! topThreeAmt($item, 'MERCHANT') !!}
                                    @endif   
                                @endforeach
                            </div>
                            @if ($cek['yesterday']['amt']['PAYEMNT SOURCE'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yesterday Payment</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YESTERDAY' && $item->tipeView == 'BY AMOUNT')
                                    {!! topThreeAmt($item, 'PAYEMNT SOURCE') !!}
                                    @endif   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tab-pane" id="monthly-amt" aria-labelledby="monthly-amt-tab" role="tabpanel">
                <div id="trx">
                    <div class="row">
                        @if ($cek['month']['amt']['MERCHANT'] > 0)
                            <div class="col-12">
                                <div class="divider divider-left">
                                    <div class="divider-text">Monthly Merchant</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 row">
                            @foreach ($data[$comp->sequence] as $item)
                                @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY AMOUNT')
                                {!! topThreeAmt($item, 'MERCHANT') !!}
                                @endif   
                            @endforeach
                        </div>

                        @if ($cek['month']['amt']['PAYEMNT SOURCE'] > 0)
                            <div class="col-12">
                                <div class="divider divider-left">
                                    <div class="divider-text">Monthly Payment</div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 row">
                            @foreach ($data[$comp->sequence] as $item)
                                @if ($item->tipeDays == 'MONTH' && $item->tipeView == 'BY AMOUNT')
                                {!! topThreeAmt($item, 'PAYEMNT SOURCE') !!}
                                @endif   
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                <div class="tab-pane" id="yearly-amt" aria-labelledby="yearly-amt-tab" role="tabpanel">
                    <div id="trx">
                        <div class="row">
                            @if ($cek['year']['amt']['MERCHANT'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yearly Merchant</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                    @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY AMOUNT')
                                        {!! topThreeAmt($item, 'MERCHANT') !!}
                                    @endif   
                                @endforeach
                            </div>

                            @if ($cek['year']['amt']['PAYEMNT SOURCE'] > 0)
                                <div class="col-12">
                                    <div class="divider divider-left">
                                        <div class="divider-text">Yearly Payment</div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 row">
                                @foreach ($data[$comp->sequence] as $item)
                                        @if ($item->tipeDays == 'YEAR' && $item->tipeView == 'BY AMOUNT')
                                        {!! topThreeAmt($item, 'PAYEMNT SOURCE') !!}
                                        @endif   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('page-script')
        <script>
            $('.by-qty').on('click',function(params) {
                $('#by-qty').show();
                $('#by-amount').hide();
                $('.current-view').text('View by Total Transaction');
            })
            $('.by-amount').on('click',function(params) {
                $('#by-qty').hide();
                $('#by-amount').show();
                $('.current-view').text('View by Amount Transaction');
            })
        </script>
    @endpush
@endif
