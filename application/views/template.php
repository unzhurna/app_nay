<!doctype html>
<html class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>STMIK IKMI Cirebon</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/iosOverlay.css">
		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>/assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
	</head>
	<body class="boxed">
		<div class="bg-dark dk" id="wrap">
			<div id="top">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<header class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<?php echo anchor('', img('assets/img/logo.png', 'class="navbar-brand"')); ?>
						</header>
						<div class="topnav">
							<div class="btn-group">
								<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen"> <i class="glyphicon glyphicon-fullscreen"></i> </a>
							</div>
							<div class="btn-group">
								<?php
									echo anchor('', 'usernama', 'class="btn btn-default btn-sm"');
									echo anchor('auth/logout', '<i class="fa fa-power-off"></i>', 'class="btn btn-default btn-sm"');
								?>
							</div>
						</div>
					</div>
				</nav>
			</div>
			<div id="left">
				<ul id="menu" class="bg-blue dker">
					<li class="<?php if(isset($menu) && $menu=='dashboard') echo "active"; ?>">
						<?php echo anchor('dashboard', '<i class="fa fa-home"></i><span class="link-title">&nbsp;Home</span>'); ?>
					</li>
					<li class="<?php if(isset($menu) && $menu=='dosen') echo "active"; ?>">
						<?php echo anchor('dosen', '<i class="fa fa-user"></i><span class="link-title">&nbsp;Dosen</span>'); ?>
					</li>
					<li class="<?php if(isset($menu) && $menu=='user') echo "active"; ?>">
						<?php echo anchor('dosen', '<i class="fa fa-user"></i><span class="link-title">&nbsp;User</span>'); ?>
					</li>
					<li><?php echo anchor('dosen', '<i class="fa fa-comments-o"></i><span class="link-title">&nbsp;Quisioner</span>'); ?></li>
					<li>
						<a href="javascript:;"> <i class="fa fa-exclamation-triangle"></i> <span class="link-title"> Error Pages </span> <span class="fa arrow"></span> </a>
						<ul>
							<li>
								<a href="503.html"> <i class="fa fa-angle-right"></i>&nbsp;503</a>
							</li>
							<li>
								<a href="offline.html"> <i class="fa fa-angle-right"></i>&nbsp;offline</a>
							</li>
							<li>
								<a href="countdown.html"> <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a>
							</li>
						</ul>
					</li>					
				</ul>
			</div>
			<div id="content">
				<div class="outer">
					<div class="inner bg-light lter">
						<div class="row"><?php echo $content; ?></div>
					</div>
				</div>
			</div>
		</div>		
		<footer class="Footer bg-dark dker">
			<p>2014 &copy; STMIK IKMI Cirebon</p>
		</footer>

		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/iosOverlay.js"></script>
  		<script src="<?php echo base_url(); ?>assets/js/spin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/screenfull.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/core.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
		<script>
			jQuery(document).ready(function() {
				<?php if($this->session->flashdata('alert')):?>
					notification('<?php echo $this->session->flashdata('alert'); ?>');	
				<?php endif;?>
			});
		</script>
		<?php
			if (isset($script))
			{
				echo $script;
			}
 		?>

	</body>
</html>