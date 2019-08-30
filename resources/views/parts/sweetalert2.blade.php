{{-- SweetAlert2s --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        swal("¡Todo salió bien!", "{{ Session::get('success') }}", "success");
    });
</script>
@endif
@if (Session::has('error'))
<script>
    $(document).ready(function() {
        swal("Tenemos un problema...", "{{Session::get('error')}}", "error");
    });
</script>
@endif
@if (Session::has('info'))
<script>
    $(document).ready(function() {
        swal("{{ Session::get('info') }} :)", "¡Todo salió bien!", "success");
    });
</script>
@endif
@if ($errors->any())
<script>
    $(document).ready(function() {
        swal('Tenemos un problema...', '@foreach ($errors->all() as $error){{ $error }}   @endforeach',
            'error');
    });
</script>
@endif
@if (session('status'))
<script>
    $(document).ready(function() {
        swal("{{ session('status') }}");
    });
</script>
@endif
