<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Administrator</title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body class="login-page">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel">
						<div class="panel-heading">
							<h3><i class="fa fa-user"></i> Administrator</h3>
						</div>
						<div class="panel-body">
							<?php echo $alert; ?>
							<?php echo form_open('auth/login'); ?>
								<div class="form-group">
									<?php echo form_input(array('class'=>'form-control', 'name'=>'username', 'placeholder'=>'Username')); ?>
								</div>
								<div class="form-group">
									<?php echo form_password(array('class'=>'form-control', 'name'=>'password', 'placeholder'=>'Password')); ?>
								</div>
								<button class="btn btn-lg btn-warning btn-block" type="submit"><i class="fa fa-sign-in"></i> Login</button>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
