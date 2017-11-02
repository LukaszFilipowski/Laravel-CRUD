<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Panel administracyjny</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="{{url('/adminlte')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/adminlte')}}/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<link href="{{url('/adminlte')}}/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="../../index2.html">Admin<b>CM</b></a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Logowanie do panelu</p>
                                @include('admin.template.alerts')
				<form action="{{route('admin_loginpost')}}" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="login" class="form-control" placeholder="Login"/>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="passwd" class="form-control" placeholder="Password"/>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">		
							<div class="checkbox icheck">
								<label>
									<input name="remember" value="1" type="checkbox"> Zapamiętaj mnie
								</label>
							</div>												
						</div><!-- /.col -->
						<div class="col-xs-4">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Zaloguj</button>
						</div><!-- /.col -->
					</div>
				</form>
			</div>
		</div>

		<script src="{{url('/adminlte')}}/plugins/jQuery/jQuery-2.1.3.min.js"></script>
		<script src="{{url('/adminlte')}}/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="{{url('/adminlte')}}/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%'
				});
			});
		</script>
	</body>
</html>