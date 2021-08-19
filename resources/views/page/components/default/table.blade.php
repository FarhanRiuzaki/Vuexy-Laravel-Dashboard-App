<!-- Ajax Sourced Server-side -->
<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label">
            <h4 class="mb-0">{{ $comp->header }}</h4>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered datatables-ajax-{{ $comp->sequence }}">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Position</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!--/ Ajax Sourced Server-side -->
@push('page-script')
<script>

$(function () {
var isRtl = $('html').attr('data-textdirection') === 'rtl';

var dt_ajax_table = $('.datatables-ajax-{{ $comp->sequence }}'),
assetPath = '../../../app-assets/';

if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
}

// Ajax Sourced Server-side
// --------------------------------------------------------------------

if (dt_ajax_table.length) {
    var dt_ajax = dt_ajax_table.dataTable({
    processing: true,
    ajax: assetPath + 'data/ajax.php',
    pageLength: 5,
    dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    //   language: {
    //     paginate: {
    //       // remove previous & next text from pagination
    //       previous: '&nbsp;',
    //       next: '&nbsp;'
    //     }
    //   }
    });
    $('.datatables-ajax-{{ $comp->sequence }}').on('click', 'tbody tr', function () {
        var label = $(this).closest("tr").find("td:first-child").text();
        $('#componentHasPageLabel-{{ $comp->sequence }}').text(label);
        $('#componentHasPage-{{ $comp->sequence }}').modal('show');
    } );

}
});

</script>
@endpush

