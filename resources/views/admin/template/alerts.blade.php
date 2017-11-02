<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.css" type="text/css">
<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
@if ( session('success') )
    <script type="text/javascript">
        swal("", "{{ session('success') }}", "success");
    </script>
@endif
@if ( session('error') )
        <script type="text/javascript">
            swal("", "{{ session('error') }}", "error");
        </script>
@endif
@if (isset($errors))
        <?php $errorss = ''; ?>
	@foreach ($errors->all() as $error)

            <?php $errorss .= $error.'\n'; ?>

	@endforeach
        @if ($errorss != '')
            <script type="text/javascript">
                swal("", "{{ $errorss }}", "error");
            </script>
        @endif
@endif