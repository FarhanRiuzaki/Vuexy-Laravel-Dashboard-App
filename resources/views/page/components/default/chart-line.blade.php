<!-- Line Chart Starts -->
<div class="card">
    <div
        class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
        <div>
            <p class="font-weight-bolder mb-25">{{ $comp->header }}</p>
        </div>
    </div>
    <div class="card-body">
        <div id="line-chart-{{ $comp->sequence }}"></div>
    </div>
</div>
<!-- Line Chart Ends -->

@push('page-script')
<script>
$(function () {
    'use strict';

    var flatPicker = $('.flat-picker'),
        isRtl = $('html').attr('data-textdirection') === 'rtl';

    // Line Chart
    // --------------------------------------------------------------------
    var lineChartEl = document.querySelector('#line-chart-{{ $comp->sequence }}'),
        lineChartConfig = {
            chart: {
                height: 120,
                type: 'line',
                zoom: {
                    enabled: false
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: true
                }
            },
            series: [],
            markers: {
                size: 2,
                colors: window.colors.solid.secondary,
                strokeColors: window.colors.solid.secondary,
                strokeWidth: 1,
                strokeOpacity: 1,
                strokeDashArray: 0,
                fillOpacity: 1,
                shape: 'circle',
                radius: 2,
                hover: {
                    size: 5
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
            },
            colors: [window.colors.solid.secondary],
            grid: {
                borderColor: '#fff',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                    show: false
                    }
                },
                yaxis: {
                    lines: {
                    show: true
                    }
                },
                padding: {
                    top: -22,
                    bottom: -5
                }
            },
            noData: {
                text: 'Loading...'
            },
            tooltip: {
                // custom: function (data) {
                //     console.log(data);
                //     return (
                //         '<div class="px-1 py-50">' +
                //         '<span>' +
                //         data.series[data.seriesIndex][data.dataPointIndex] +
                //         ' TRX</span>' +
                //         '</div>'
                //     );
                // }
            },
            xaxis:{
                type: "{{ $comp->type_desc }}",
                tickPlacement: 'on',
                labels: {
                    show: true,
                    hideOverlappingLabels: true,
                    allowOverlap:false,
                    showDuplicates: false,
                    style: {
                        colors: [],
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof lineChartEl !== undefined && lineChartEl !== null) {
        var lineChart = new ApexCharts(lineChartEl, lineChartConfig);
        lineChart.render();

        var flickerAPI = "{{ url('api') . '/' . $comp->api_name }}";
        $.getJSON( flickerAPI, 
            <?= $api_param ?>
        )
        .done(function( data ) {
            lineChart.updateSeries([{
                name: 'TRX',
                data: data
            }])
        });
        // $.getJSON("{{ url('api') . '/' . $comp->api_name }}", function (response) {
        //     lineChart.updateSeries([{
        //         name: 'TRX',
        //         data: response
        //     }])
        // });
    }
});
</script>
@endpush