<!-- Line Chart Starts -->
<div class="card">
    <div class="card-header p-1">
        <div class="head-label">
            <h4 class="mb-0">{{ $comp->header }}</h4>
        </div>
    </div>
    <div class="card-body">
        <div id="donut-chart-{{ $comp->sequence }}"></div>
    </div>
</div>
<!-- Line Chart Ends -->

@push('page-script')
<script>
$(function () {
    'use strict';
    
    var flickerAPI = "{{ url('api') . '/' . $comp->api_name }}";
    $.getJSON( flickerAPI, 
        <?= $api_param ?>
    )
    .done(function( data ) {
        var labels = [];
        var series = [];
        $.each(data, function(k,v) {
            labels.push(v.x);
            series.push(v.y)
        });

        var donutChartEl = document.querySelector('#donut-chart-{{ $comp->sequence }}'),
        donutChartConfig = {
        chart: {
            // height: 350,
            type: 'donut'
        },
        legend: {
            show: true,
            position: 'bottom'
        },
        labels: labels,
        series: series,
        dataLabels: {
            enabled: true,
            formatter: function (val, opt) {
            return parseInt(val) + '%';
            }
        },
        plotOptions: {
            pie: {
            donut: {
                labels: {
                show: true,
                name: {
                    fontSize: '2rem',
                    fontFamily: 'Montserrat'
                },
                value: {
                    fontSize: '1rem',
                    fontFamily: 'Montserrat',
                    formatter: function (val) {
                        // console.log(val);
                        return parseInt(val);
                    }
                },
                total: {
                    show: true,
                    fontSize: '1.5rem',
                    label: 'Total',
                    formatter: function (w) {
                    //   console.log(w);
                        return '100%';
                    }
                }
                }
            }
            }
        },
        responsive: [
            {
            breakpoint: 992,
            options: {
                chart: {
                height: 380
                }
            }
            },
            {
            breakpoint: 576,
            options: {
                chart: {
                height: 320
                },
                plotOptions: {
                pie: {
                    donut: {
                    labels: {
                        show: true,
                        name: {
                        fontSize: '1.5rem'
                        },
                        value: {
                        fontSize: '1rem'
                        },
                        total: {
                        fontSize: '1.5rem'
                        }
                    }
                    }
                }
                }
            }
            }
        ]
        };
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    });

});
</script>
@endpush