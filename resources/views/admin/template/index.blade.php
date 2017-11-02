<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Panel administracyjny</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
                
		<link href="{{url('/adminlte')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/adminlte')}}/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/adminlte')}}/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/adminlte')}}/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.css" type="text/css">

		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

        <style type="text/css">
            .frame-container {
                display: table;
                height: 100%;
            }
            .frame-container iframe {
                position: absolute;
                top:0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
	</head>

	<body class="skin-blue sidebar-mini">
		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

				<!-- Logo -->
				<a href="#" class="logo">
					<span class="logo-lg">Artist<b>PA</b></span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
				</nav>
			</header>

			<aside class="main-sidebar">
				@include('admin.template.navbar')
			</aside>

			
			<div class="content-wrapper" style="position: relative;">	
				@yield('content')
			</div>

			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- To the right -->
				<div class="pull-right hidden-xs">
					
				</div>
				<!-- Default to the left -->
				<strong>Copyright &copy; {{ date('Y') }} <a href="#">strona.pl</a>.</strong> Wszystkie prawa zastrzeżone.
			</footer>

		</div><!-- ./wrapper -->

		<script src="{{url('/adminlte')}}/plugins/ckeditor/ckeditor.js"></script>
		<script src="{{url('/adminlte')}}/plugins/jQuery/jQuery-2.1.3.min.js"></script>
		<script src="{{url('/adminlte')}}/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="{{url('/adminlte')}}/dist/js/app.min.js" type="text/javascript"></script>
		<script src="{{url('/adminlte')}}/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="{{url('/adminlte')}}/dist/js/custom.js" type="text/javascript"></script>
		<script src="{{url('/adminlte')}}/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
                
                <script>
                    $( document ).ready(function(){
                        $( document ).on('click', '.deletable', function(e){
                                e.preventDefault();
                                var button = $(this);
                                var custom = '';
                                if (button.attr('data-custom')){
                                        var custom = "\n" + button.data('custom');
                                }
                                swal({
                                        title: "Jesteś pewny?",
                                        text: "Usuniętego obiektu nie będzie można przywrócić!" + custom,
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Tak, jestem pewny!",
                                        cancelButtonText: "Anuluj!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true
                                }, function(c){
                                        if (c) {
                                                document.location = button.data('href');
                                        }
                                });
                        });
                    }); 
                </script>

		@yield('scripts')

	</body>
</html>