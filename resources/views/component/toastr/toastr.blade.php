
<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script>

  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    toastr[type]("{{ Session::get('message') }}", type, {
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        timeOut: 2000,
    });
  @endif

  @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}', 'Error'    );
    @endforeach
  @endif
</script>
