<!-- Line Chart Starts -->
<div class="card">
    <div
        class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
        <div>
            <h6 class="mb-25">{{ $comp->header }}</h6>
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

    var options = {
    chart: {
        height: 350,
        type: 'bar',
        events: {
          click: function(event, chartContext, config) {
            // swal.fire('ok','mantap','info');
            window.location.href = "{{ url($url_page . encrypt($sequence+1)) }}";
          }
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [],
    // title: {
    //     text: 'Ajax Example',
    // },
    noData: {
      text: 'Loading...'
    }
  }

  var chart = new ApexCharts(
    document.querySelector("#line-chart-{{ $comp->sequence }}"),
    options
  );
  chart.render();

  $.getJSON("{{ url('api/test') . '/' . $comp->api_name }}", function(response) {
    // console.log(response);
    chart.updateSeries([{
      name: 'Sales',
      data: response.data
    }])
  });
});
</script>
@endpush