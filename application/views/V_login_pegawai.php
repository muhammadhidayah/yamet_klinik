<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>
<body>
	<div class="container-fluid">
		<div class="header">
			<ul>
				<li><a href="<?php echo site_url('home')?>">Beranda</a></li>
				<li><a style="color: #f2f2f2;" href="<?php echo site_url('profil')?>">Profil</a></li>
				<li><a href="<?php echo site_url('layanan')?>">Fasilitas</a></li>
				<li>
					<div class="">
						<img class="" style="width: 160px; z-index: 10;" src="<?php echo base_url('assets/img/ikonYamet.png')?>">
					</div>
				</li>
				<li><a href="<?php echo site_url('layanan')?>">Layanan</a></li>
 				<li><a href="<?php echo site_url('staff')?>">Staff</a></li>
 				<li>
 					<?php if($this->session->userdata('logged_in')) { ?>
						<a href="<?php echo site_url('auth/logOut')?>"><!-- <button type="button" class="btn btn-info"> -->Log Out<!-- </button> --></a>
					<?php } else { ?>
						<a href="<?php echo site_url('auth')?>"><!-- <button type="button" class="btn btn-info"> -->Login<!-- </button> --></a>
					<?php } ?>
 				</li>
			</ul>
			</ul>
		</div>

		<div class="row putih1">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<hr style="border-color: transparent;">
				<hr style="border-color: transparent;">
				<hr style="border-color: transparent;">
				<hr style="border-color: transparent;">
				<hr style="border-color: transparent;">
				<h2 style="text-align: center;">Login</h2>
				<hr style="border-color: transparent;">
				<?php 
					echo validation_errors('<p style="color:red">','</p>'); 
					
					if($this->session->flashdata('msg')) {
				        echo "<p style='color:red'>";
				        echo $this->session->flashdata('msg');
				        echo "</p>";
				    }

				?>
				<form action="<?php echo site_url('auth/pegawaiLogin'); ?>" method="POST">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="form-group row">
				      
				      <div class="col-sm-10">
				        <input type="text" class="form-control" name="username" placeholder="Username">
				      </div>
				    </div>
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
				    <div class="form-group row">
				      
				      <div class="col-sm-10">
				        <input type="password" class="form-control" name="password" placeholder="Password">
				      </div>
				    </div>
    
				    <div class="form-group row">
				      <div class="offset-sm-2 col-sm-10">
				        <button type="submit" class="btn btn-primary">Sign in</button>
				      </div>
				    </div>
  				</form>
  					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					
			</div>
			<div class="col-md-4"></div>

		</div>

		<div class="footer">
			 
			<div class="logobawah">
			<img class="d-block img-fluid" src="<?php echo base_url('assets/img/ikonYamet.png')?>">	
			</div>

			<div class="sosialIkon">
				<img src="<?php echo base_url('assets/img/ikonIg.png')?>">
				<img src="<?php echo base_url('assets/img/ikonFB.png')?>">

			</div>
			 
			<div class="copyrigth">
				
			<b >Copyright © 2017</b>
			<p>Yamet Child Development Center</p>			
	
			</div>

	</div>

</body>
</html>