<!DOCTYPE html>
<html>
<head>
	<title>Terapis</title>
	
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
				<li><a style="color: #f2f2f2;" href="<?php echo site_url('home')?>">Beranda</a></li>
				<li><a href="<?php echo site_url('profil')?>">Profil</a></li>
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
	
		<div class="row putih2">
			<div class="col-md-12">
				<div class="col-md-3">
					<br>
					<br>
					<div class="table-responsive">
						<table class="table" >
							<tr>
								<td style="text-align: center;">
									<?php if($pegawai->ava_pegawai != "") { ?>
										<img src="<?php echo base_url('assets/upload/pegawai/img/'.$pegawai->ava_pegawai)?>" alt="Gambar Profile" height="90px">
									<?php } else { ?>
										<img src="<?php echo base_url('assets/img/avatar1.png')?>" alt="Gambar Profile" height="90px">
									<?php } ?>
								</td>
							</tr>
							<tr><td style="text-align: center;" ><b><?php echo $this->session->userdata('username'); ?></b></td></tr>
							<tr><td style="text-align: center;" ><a href="<?php echo site_url('terapis/dashboard') ?>"><button type="button" class="btn btn-info">Lihat Profile</button></a></td></tr>
							<?php echo form_open_multipart('terapis/dashboard/updateAva'); ?>
								<tr><td><input type="file" name="avaprofile" class="form-control"></td></tr>
								<tr><td><input type="submit" class="btn btn-info btn-sm" name="submit" value="Update Foto"></td></tr>	
							<?php echo form_close(); ?>
							
						</table>
					</div>
					<hr style="border-color: black;">
					<br>
					
					<ul id="manager">
					
					<li><a href="<?php echo site_url('terapis/perkembangan_client')?>"><b>Perkembangan Client</b></a></li>
					
					
					<li><a href="<?php echo site_url('terapis/client')?>"><b>Client</b></a></li>
					
				
					
					
					
					</ul>
					<br>
				</div>

				<div class="col-md-9 menutengahter">
					<h5><b><i>Biodata pegawai</i></b></h5>
					<br>
					<div class="table-responsive">
						<table class="table">
						<tr>
							<th>nama pegawai</th>
							<th>email</th>
							<th>no hp</th>
							<th>alamat</th>
							<th>username</th>
							<th>password</th>
							<th>Action</th>
					</tr>
					
						
							
						
						<tr>
						<td> <?php echo $pegawai->nama_pegawai; ?></td>
						<td> <?php echo $pegawai->email_pegawai; ?></td>
						<td> <?php echo $pegawai->nohp_pegawai; ?></td>
						<td> <?php echo $pegawai->alamat_pegawai; ?></td>
						<td> <?php echo $pegawai->username_pegawai; ?></td>
						<?php echo form_open('terapis/dashboard/updateUser'); ?>
						<input type="hidden" name="username_pegawai" value="<?php echo $pegawai->username_pegawai; ?>">
						<td> <input type="text" name="password_pegawai" value="<?php echo $pegawai->password_pegawai; ?>"></td>
					
						<td><button type="submit" class="btn btn-success">Update</button></td>
						<?php echo form_close(); ?>
						</tr>
			
					</table>
					</div>
					
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