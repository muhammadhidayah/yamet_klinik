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
				<h2 style="text-align: center;">Login Sebagai</h2>
				<hr style="border-color: transparent;">
				<?php 
					echo validation_errors('<p style="color:red">','</p>'); 
					
					if($this->session->flashdata('msg')) {
				        echo "<p style='color:red'>";
				        echo $this->session->flashdata('msg');
				        echo "</p>";
				    }

				?>
				<div class="col-md-12 form-group">
					<a href="<?php echo site_url('auth/pegawai') ?>" class="btn form-control btn-sm btn-info">Pegawai</a>
				</div>
				<div class="col-md-12 form-group">
					<a href="<?php echo site_url('auth/client') ?>" class="btn form-control btn-sm btn-info">Client</a>
				</div>

  					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">
					<hr style="border-color: transparent;">


					
			</div>

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

	</div>

</body>
</html>