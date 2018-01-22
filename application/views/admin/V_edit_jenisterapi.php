<!DOCTYPE html>
<html>
<head>
	<title>Admin - Tambah terapi</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<div class="row putih1">
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
							<tr><td style="text-align: center;" ><a href="<?php echo site_url('admin/dashboard') ?>"><button type="button" class="btn btn-info">Lihat Profile</button></a></td></tr>
							<?php echo form_open_multipart('admin/dashboard/updateAva'); ?>
								<tr><td><input type="file" name="avaprofile" class="form-control"></td></tr>
								<tr><td style="text-align: center;"><input type="submit" class="btn btn-info btn-sm" name="submit" value="Update Foto"></td></tr>	
							<?php echo form_close(); ?>
							
						</table>
					</div>
					<hr style="border-color: black;">
					<br>
					
					<ul id="manager">
					<li><a href="<?php echo site_url('admin/user');?>"><b>User</b> </a></li>
					<li><a href="<?php echo site_url('admin/profile');?>"><b>Profil Klinik</b> </a></li>
					<li><a href="<?php echo site_url('admin/berita')?>"><b>News</b></a></li>
					
				
					
					<li><a href="<?php echo site_url('admin/client')?>"><b>Client</b></a></li>
					
				
					<li><a href="<?php echo site_url('admin/jenis_terapi')?>"><b>Jenis Terapi</b></a></li>
					<li><a href="<?php echo site_url('admin/pegawai')?>"><b>Staff</b></a></li>
					<li><a href="<?php echo site_url('admin/layanan')?>"><b>Layanan &#38; Fasilitas</b></a></li>
					
					
					</ul>
					<br>
				</div>

				<div class="col-md-9">
					<h5><b><i>Tambah Jenis Terapi</i></b></h5>
				<br>
					<?php
			           echo validation_errors('<div class="alert alert-warning alert-dismissible">','</div>');
			           if(isset($errors)) {
			             echo '<div class="alert alert-warning alert-dismissible">';
			             echo $errors;
			             echo '</div>';
			           }
			         ?>

			         <?php
			            if($this->session->flashdata('sukses')) {
			              echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Sukses!</h4>';
			              echo $this->session->flashdata('sukses');
			              echo '</div>';
			            }
			          ?>

					<div class="table-responsive">
						<?php echo form_open('admin/jenis_terapi/doUpdate');?>
						<table class="table">
						

							<tr>
								<th><b>Jenis terapi</b></th>
																
							</tr>

							<tr>
								<td>
									<input type="text" name="id_jenisterapi" value="<?php echo $terapi->id_jenisterapi ?>" hidden>
									<input type="text" name="jenis_terapi" class="form-control" value="<?php echo $terapi->jenis_terapi ?>" required>
								</td>
																
							</tr>

							<tr>
								<th><b>Biaya Terapi</b></th>
																
							</tr>

							<tr>
								<td><input type="text" name="biaya_terapi" class="form-control" value="<?php echo $terapi->biaya_terapi ?>" required></td>
								<td><button type="submit" class="btn btn-primary">
								  <i class="icon-user icon-white"></i> Submit
								</button></td>
																
							</tr>
						</table>
						<?php echo form_close();?>
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