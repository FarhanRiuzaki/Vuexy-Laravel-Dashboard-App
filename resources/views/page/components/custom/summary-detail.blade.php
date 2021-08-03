<div class="card">
    <div class="card-body" style="padding-top:25px">
        <p class="card-text font-weight-bolder">{{ $comp->header }}</p>
        <hr>                  
        <div class="row">
            <div class="col-4">
                <p class="font-weight-bolder mb-0 " id="totalTransaction-{{ $comp->sequence }}"></p>
            </div>
            <div class="col-8">
                <p class="font-weight-bolder mb-0 float-right " id="totalAmount-{{ $comp->sequence }}"></p>     
            </div>
        </div> 
    </div>
</div>


@push('page-script')
<script>
(function() {
  var flickerAPI = "{{ url('api') . '/' . $comp->api_name }}";
    $.getJSON( flickerAPI, 
        <?= $api_param ?>
    )
    .done(function( data ) {
        // console.log(data[]);
        if(data[0]){
            var totTrx = addCommas(data[0].totalTransaction) + ' TRX';
        }else{
            var totTrx = '0 TRX';
        }
        if(data[0]){
            var totAmt = 'RP. ' + addCommas(data[0].totalAmount);
        }else{
            var totAmt = 'RP. 0';
        }
        
        $('#totalTransaction-{{ $comp->sequence }}').text(totTrx);
        $('#totalAmount-{{ $comp->sequence }}').text(totAmt);
        // console.log(addCommas(data[0].totalTransaction), addCommas(data[0].totalAmount));
    });
})();
</script>
@endpush