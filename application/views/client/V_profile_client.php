<!DOCTYPE html>
<html>
<head>
	<title>Profil Siswa</title>
	
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
		<div class="row putih1">
			<div class="col-md-12">
				<div class="col-md-3">
					<br>
					<br>
					<div class="table-responsive">
							<table class="table" >
							<tr>
								<td style="text-align: center;">
									<?php if($client->gambar_client != "") { ?>
										<img src="<?php echo base_url('assets/upload/client/'.$client->gambar_client)?>" alt="Gambar Profile" height="90px">
									<?php } else { ?>
										<img src="<?php echo base_url('assets/upload/client/avatar1.png')?>" alt="Gambar Profile" height="90px">
									<?php } ?>
								</td>
							</tr>
							<tr><td style="text-align: center;" ><b><?php echo $this->session->userdata('username'); ?></b></td></tr>
							<tr><td style="text-align: center;" ><a href="<?php echo site_url('client/dashboard') ?>"><button type="button" class="btn btn-info">Lihat Profile</button></a></td></tr>
							<?php echo form_open_multipart('client/dashboard/updateAva'); ?>
								<tr><td><input type="file" name="avaprofile" class="form-control" required></td></tr>
								<tr><td style="text-align: center;" ><input type="submit" class="btn btn-info btn-sm" name="submit" value="Update Foto"></td></tr>	
							<?php echo form_close(); ?>
							
						</table>
					</div>
					<hr style="border-color: black;">
					<br>
					
						

						<ul id="manager">
					
					<li><a href="<?php echo site_url('client/perkembangan')?>"><b>Perkembangan Siswa</b></a></li>
					
					
					<li><a href="<?php echo site_url('client/Profile_client')?>"><b>Siswa</b></a></li>
					
					</ul>
						<br>
						<br>
						<br>
					
				</div>

				<div class="col-md-3">
					

					<?php echo form_open('client/Profile_client/updateclient'); ?>
					<h5><b>Biodata Siswa</b></h5>
					<div class="table-responsive">
						<table class="table">
							
							<tr><td><b>Nama Lengkap</b></td></tr>
							<tr><td><input type="text" name="nama_client" value="<?php echo $client->nama_client ?>"></td></tr>

							<tr><td><b>Nama Panggilan</b></td></tr>
							<tr><td><input type="text" name="namapanggilan_client" value="<?php echo $client->namapanggilan_client ?>"></td></tr>

							<tr><td><b>Jenis kelamain</b></td></tr>
							<tr><td><input type="text" name="jk_client" value="<?php echo $client->jk_client; ?>"></td></tr>

						

							<tr><td><b>Tempat lahir</b></td></tr>
							<tr><td><input type="text" name="templahir_client" value="<?php echo $client->templahir_client ?>"></td></tr>

							<tr><td><b>Tanggal lahir</b></td></tr>
							<tr><td><input type="text" name="tgllahir_client" value="<?php echo $client->tgllahir_client ?>"></td></tr>
						</table>
					</div>
				</div>

				<div class="col-md-3">
					<div class="table-responsive">
						<h5 style="color: transparent;">Biodata client</h5>
						<table class="table">
							
							<tr><td><b>Sekolah</b></td></tr>
							<tr><td><input type="text" name="sekolah_client" value="<?php echo $client->sekolah_client ?>"></td></tr>

							<tr><td><b>Diagnosis Client</b></td></tr>
							<tr><td><input type="text" name="diagnosis_client" value="<?php echo $client->diagnosis_client ?>" readonly></td></tr>

							<tr><td><b>Nama Ayah</b></td></tr>
							<tr><td><input type="text" name="nama_ayahclient" value="<?php echo $client->nama_ayahclient ?>"></td></tr>

							<tr><td><b>Nama Ibu</b></td></tr>
							<tr><td><input type="text" name="nama_ibuclient" value="<?php echo $client->nama_ibuclient ?>"></td></tr>

							<tr><td><b>No tlp</b></td></tr>
							<tr><td><input type="text" name="notelp_client" value="<?php echo $client->notelp_client ?>"></td></tr>

							
						</table>
					</div>
				</div>

				<div class="col-md-3">
					<div class="table-responsive">
						<h5 style="color: transparent;">Biodata client</h5>
						<table class="table">
							
							<tr><td colspan="6" style="text-align: center;"></td></tr>
							

							

							<tr><td><b>E-mail</b></td></tr>
							<tr><td><input type="email" name="email_client" value="<?php echo $client->email_client ?>"></td></tr>

							<tr><td><b>Alamat</b></td></tr>
							<tr><td><input type="text" name="alamat_client" value="<?php echo $client->alamat_client ?>"></td></tr>
							<tr><td><input type="submit" value="save"></td></tr>

							
						</table>
					</div>
					<?php echo form_close(); ?>
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