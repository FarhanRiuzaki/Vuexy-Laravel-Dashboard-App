<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>laporan point</title>

    <style>
        .invoice-box {
            max-width: 700px;
            margin: auto;
            /* padding: 30px; */
            /* border: 1px solid #eee; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, .15); */
            font-size: 12.5px;
            line-height: 24px;
            /* font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; */
            font-family: Arial, sans-serif;
            color: #555;
        }

        .invoice-box table.new{
            padding-right: 5% ;
            padding-left: 5% ;
        }

        .invoice-box table {
            width: 100%;
            line-height: normal; /* inherit */
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 40px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .center{
            text-align: center;
        }
        .ls{
            letter-spacing: 3px;
            font-size: 16px;
        }
        .isi{
            font-size: 12.5px !important;
            text-align: justify;
        }
        .isi td table tr td{
            padding: 0;
            margin: 0;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 80;
            width: 100%;
            text-align: center;
            font-size: 12.5px !important;
        }
        .address{
            font-size: 8px;
            bottom: 10;
        }
        
        .docs {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .docs td{
            border: 1px solid grey;
            padding: 10px;
            text-align: center !important;
        }
        .docs th{
            border: 1px solid grey;
            padding: 10px;
            text-align: center !important;
        }
    </style>
	{{-- <link href="{{ asset('css/bundle.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" class="new">
            <tr>
                <td class="center">
                    <b><h3 class="ls">
                        LAPORAN POINT
                    </h3>
                    <h3 style="font-size: 16px;">PERIODE {{ $start_date }} s/d {{ $end_date }}</h3></b>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                </td>
            </tr>
            <tr class="isi">
                <table class="docs">
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if ($item->type == 'redeem')
                                    <td>{{ $item->type  }}</td>
                                @else
                                    <td>{{ $item->type  }}</td>
                                @endif
                                <td>{{ $item->phone_number}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email}}</td>
                                <td style="text-align: right !important">{{ number_format(convertNumber($item->adjust_point))}}</td>
                                <td>{{ $item->remark}}</td>
                                <td style="text-align: left !important">{!! createdAt($item->created_at) !!}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" >Data tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </tr>
        </table>
    </div>
</body>
</html>
