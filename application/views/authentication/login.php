<!DOCTYPE HTML>

<html>
	<head>
		<title>PKL - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
		
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/logo.png');?>">
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="<?php echo base_url();?>" class="logo">SiPKL</a>
					
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>FORM LOGIN</h2>
						<p>Silahkan isi dengan benar</p>
						<p>demo: admin/password || guru1/123 || guru2/123456</p>
						<hr>
						
            <?php if(validation_errors()){ ?>
            <center>
                <div class="alert alert-danger bg-danger" style="max-width: 400px;">
                    <?php echo validation_errors(); ?>
                </div>
            </center>
            <?php } ?>
            <?php if(!empty($this->session->flashdata('message'))){ ?>
            <center>
                <div style="max-width: 400px;">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            </center>
            <?php } ?>
						<div class="kotak_login">	
						<form action="<?php echo base_url('Auth/do_login'); ?>" method="post">
								<label>Username</label>
								<input type="text" name="username" class="form_login" placeholder="Username ..">
								<br/>
								<label>Password</label>
								<input type="password" name="password" class="form_login" placeholder="Password ..">
								<br/>
									<input  class="button special" type="submit" value="LOGIN" >
								<br/>
							</form>
						</div>
					</header>
				</div>
			</section>

		<!-- Scripts -->
			<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/skel.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/util.js"></script>
			<script src="<?php echo base_url();?>assets/js/main.js"></script>

	</body>
</html>