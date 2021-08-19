<!-- Ajax Sourced Server-side -->
<div class="card">
    
  <div class="card-header">
    <div class="head-label">
        <h4 class="mb-0">{{ $comp->header }}</h4>
    </div>
    <div class="heading-elements">
      <ul class="list-inline mb-0">
        <li>
          <a data-action="collapse" class="rotate"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
        </li>
      </ul>
    </div>
  </div>
    <div class="card-content collapse" style="">
      <div class="card-body">
          <div class="row">
              <div class="col-md-3 ">
                {{ Form::inputText('Start Transaction Date:', 'start_date', date('Y-m-d'), null, ['required']) }}
              </div>
              <div class="col-md-3">
                {{ Form::inputText('End Transaction Date:', 'end_date', date('Y-m-d'), null, ['required']) }}
              </div>
              <div class="col-md-3">
                {{ Form::inputText('Total Search Transaction: ', null, null, null, ['disabled']) }}
              </div>
              {{-- <div class="col-md-3"></div> --}}
              <div class="col-md-3">
                  <button class="btn btn-block btn-warning btnSearch" style="margin-top: 19.5px">Search</button>
              </div>
          </div>
      </div>
    </div>
  </div>
<!--/ Ajax Sourced Server-side -->
@push('page-script')
<script>
$(function () {
    $('.btnSearch').on('click', function() {
        window.location.href = '{{ $current_URL }}' + '?start_date=' + $('#start_date').val() + '&end_date=' + $('#end_date').val();
    });
});
</script>
@endpush

