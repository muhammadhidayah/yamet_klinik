<!DOCTYPE html>
<html>
<head>
	<title>Yamet</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		
</head>
<body>
	<div class="wrapper">
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

		
		
	</div>

	<div class="Pbody">
			
		<center><img src="<?php echo base_url('assets/img/yamet1.jpg') ?>"></center>

	</div>

	<div class="HjudulBerita">

			<div class="col-md-4"><a href="<?php echo site_url('profil')?>"><b>Tentang Kami</b></a></div>
			<div class="col-md-2"><a href="<?php echo site_url('profil/sejarah') ?>"><b>Sejarah</b></a></div>
			<div class="col-md-3"><a href="<?php echo site_url('profil/Kurikulum') ?>"><b>Kurikulum</b></a></div>
			<div class="col-md-2"><a href="<?php echo site_url('profil/info') ?>"><b>Info</b></a></div>
		</div>
		<div class="row  menutengahpost">
			
			<div class="col-md-1"></div>
			<div class="col-md-11">
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th><b>Kurikulum</b></th>
						</tr>
						<?php foreach ($profile as $key): ?>
							<tr>
								<td><b><?php echo $key->kurikulum_klinik  ?></b></td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
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