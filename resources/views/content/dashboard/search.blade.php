@extends('layouts/contentLayoutMaster')


@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">

<style>
/* form starting stylings ------------------------------- */
.group {
    position: relative;
    /* margin-bottom:45px;  */
}
input {
    font-size: 14px;
    padding: 10px 10px 10px 5px;
    display: block;
    width: 100%;
    /* width:300px; */
    border: none;
    border-bottom: 1px solid #757575;
}

input:focus {
    outline: none;
}

/* LABEL ======================================= */
label {
    color: #999;
    font-size: 14px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 5px;
    top: 10px;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

/* active state */
input:focus~label,
input:not(:placeholder-shown)~label
 {
    top: -20px;
    font-size: 14px;
    color: white;
}

/* BOTTOM BARS ================================= */
.bar {
    position: relative;
    display: block;
}

.bar:before,
.bar:after {
    content: '';
    height: 2px;
    width: 0;
    bottom: 1px;
    position: absolute;
    background: #7367f0 !important;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

.bar:before {
    left: 50%;
}

.bar:after {
    right: 50%;
}

/* active state */
input:focus~.bar:before,
input:focus~.bar:after {
    width: 50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
    position: absolute;
    height: 60%;
    /* width:100px;  */
    top: 25%;
    left: 0;
    pointer-events: none;
    opacity: 0.5;
}

/* active state */
input:focus~.highlight {
    -webkit-animation: inputHighlighter 0.3s ease;
    -moz-animation: inputHighlighter 0.3s ease;
    animation: inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
    from {
        background: white;
    }

    to {
        width: 0;
        background: transparent;
    }
}

@-moz-keyframes inputHighlighter {
    from {
        background: white;
    }

    to {
        width: 0;
        background: transparent;
    }
}

@keyframes inputHighlighter {
    from {
        background: white;
    }

    to {
        width: 0;
        background: transparent;
    }
}


/* select starting stylings ------------------------------*/
.select {
    /* font-family: */
    /* 'Roboto','Helvetica','Arial',sans-serif; */
    position: relative;
    width: 100%;
    border-bottom: 1px solid #757575;
}

.select-text {
    position: relative;
    font-family: inherit;
    background-color: transparent;
    width: 100%;
    padding: 10px 10px 10px 0;
    font-size: 14px;
    border-radius: 0;
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.12);
}

/* Remove focus */
.select-text:focus {
    outline: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0);
}

/* Use custom arrow */
.select .select-text {
    appearance: none;
    -webkit-appearance: none
}

.select:after {
    position: absolute;
    top: 14px;
    right: 10px;
    /* Styling the down arrow */
    width: 0;
    height: 0;
    padding: 0;
    content: '';
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid rgba(0, 0, 0, 0.12);
    pointer-events: none;
}


/* LABEL ======================================= */
.select-label {
    color: rgba(0, 0, 0, 0.5);
    font-size: 14px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 0;
    top: 10px;
    transition: 0.2s ease all;
}

/* active state */
.select-text:focus~.select-label,
.select-text:not(:placeholder-shown)~.select-label
{
    color: transparent;
    top: -20px;
    transition: 0.2s ease all;
    font-size: 14px;
}

/* BOTTOM BARS ================================= */
.select-bar {
    position: relative;
    display: block;
    width: 100%;
}

.select-bar:before,
.select-bar:after {
    content: '';
    height: 2px;
    width: 0;
    bottom: 1px;
    position: absolute;
    background: #7367f0 !important;
    transition: 0.2s ease all;
}

.select-bar:before {
    left: 50%;
}

.select-bar:after {
    right: 50%;
}

/* active state */
.select-text:focus~.select-bar:before,
.select-text:focus~.select-bar:after {
    width: 50%;
}

/* HIGHLIGHTER ================================== */
.select-highlight {
    position: absolute;
    height: 60%;
    width: 100px;
    top: 25%;
    left: 0;
    pointer-events: none;
    opacity: 0.5;
}
th, td {
  padding: 15px;
}
</style>
@endsection

@section('content')
<!-- Info table about actions -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Search Data</h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse"><i data-feather="chevron-up"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="table-responsive">
                                    <table width='100%'>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Waktu Transaksi</td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="from_date" placeholder="From Date" class="basepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>From Date</label> --}}
                                                </div>
                                            </td>
                                            <td width='15%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="from_time" placeholder="Time" class="timepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>Time</label> --}}
                                                </div>
                                            </td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="to_date" placeholder="To Date" class="basepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>To Date</label> --}}
                                                </div>
                                            </td>
                                            <td width='15%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="to_time" placeholder="Time" class="timepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>Time</label> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Waktu Settlement</td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="settlement_date_from" class="basepicker" placeholder="From Date">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>From Date</label> --}}
                                                </div>
                                            </td>
                                            <td width='15%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text"  name="settlement_time_from" placeholder="Time" class="timepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>Time</label> --}}
                                                </div>
                                            </td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="settlement_date_to" class="basepicker" placeholder="To Date">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>To Date</label> --}}
                                                </div>
                                            </td>
                                            <td width='15%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="settlement_time_to" placeholder="Time" class="timepicker">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    {{-- <label>Time</label> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width='100%'>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Jumlah</td>
                                            <td width='20%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text"  name="amount_from" class="numeral" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Dari</label>
                                                </div>
                                            </td>
                                            <td width='20%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="amount_to" class="numeral" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Sampai</label>
                                                </div>
                                            </td>
                                            <td width='15%' align="right" class="pr-2">Curreny</td>
                                            <td width='25%' class="pr-2">
                                                <div class="select">
                                                    <select class="select-text" name='currency' placeholder="Any">
                                                        <option value="" disabled selected></option>
                                                        <option value="IDR">IDR</option>
                                                        <option value="USD">USD</option>
                                                    </select>
                                                    <span class="select-highlight"></span>
                                                    <span class="select-bar"></span>
                                                    <label class="select-label">Any</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Status</td>
                                            <td colspan="2" width='40%' class="pr-2">
                                                <div class="select">
                                                    <select class="select-text" name="status" placeholder=" ">
                                                        <option value="" disabled selected></option>
                                                        <option value="AUTHENTICATED">AUTHENTICATED</option>
                                                        <option value="AUTHORIZED">AUTHORIZED</option>
                                                        <option value="CAPTURED">CAPTURED</option>
                                                        <option value="DECLINED">DECLINED</option>
                                                        <option value="FAILED">FAILED</option>
                                                    </select>
                                                    <span class="select-highlight"></span>
                                                    <span class="select-bar"></span>
                                                    <label class="select-label">Any</label>
                                                </div>
                                            </td>
                                            <td width='15%' align="right" class="pr-2">Order ID</td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="order_id" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Search by Order ID</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Transaksi ID</td>
                                            <td colspan="2" width='40%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name="transaction_id" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Search by transaction ID</label>
                                                </div>
                                            </td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr class="m-4">
                                            <td width='20%' align="right" class="pr-2">Card Number</td>
                                            <td width='20%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name='card_first' maxlength="4" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>First 4 code</label>
                                                </div>
                                            </td>
                                            <td width='20%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name='card_last' maxlength="4" placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Last 4 code</label>
                                                </div>
                                            </td>
                                            <td width='15%' align="right" class="pr-2">Approval</td>
                                            <td width='25%' class="pr-2">
                                                <div class="group">      
                                                    <input type="text" name='auth_code' placeholder=" ">
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Auth Code</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="text-right">
                                        <br>
                                        <button type="submit" class="btn btn-outline-primary">Pencarian</button>
                                        <button class="btn btn-outline-info">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Payment Method</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Transaction ID</th>
                            <th>Card Number</th>
                            <th>Auth Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endpush
@push('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script> --}}
    <script>
        // Default
        basicPickr = $('.basepicker'),
        timePickr = $('.timepicker'),
        numeralMask = $('.numeral');
        // Date 
        if (basicPickr.length) {
            basicPickr.flatpickr();
        }
        // Time  
        if (timePickr.length) {
            timePickr.flatpickr({
            enableTime: true,
            noCalendar: true
            });
        }
        //Numeral
        if (numeralMask.length) {
            new Cleave(numeralMask, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
            });
        }
    </script>
@endpush