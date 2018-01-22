<!DOCTYPE html>
<html>
<head>
	<title>Admin -Edit Data Pegawai</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
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

				<div class="col-md-5 menutengah">
					<h5><b><i>Data Pegawai</i></b></h5>
					<br>
					<br>
				
					<div class="table-responsive">
						<table class="table">
						<?php echo form_open('admin/pegawai/doUpdatePegawai') ?>
						<tr><td><b>Nama</b></td><td>
							<input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $terapis->id_pegawai ?>">
							<input type="text" name="nama_pegawai" class="form-control" value="<?php echo $terapis->nama_pegawai ?>"></td></tr>

						<tr><td><b>Panggilan</b></td><td><input type="text" name="panggilan_pegawai" class="form-control" value="<?php echo $terapis->panggilan_pegawai ?>"></td></tr>

						<tr><td><b>Tanggal Lahir</b></td><td><input type="date" name="tgllahir_pegawai" class="form-control" value="<?php echo $terapis->tgllahir_pegawai ?>"></td></tr>

						<tr><td><b>Agama</b></td><td><input type="text" name="agama_pegawai" class="form-control" value="<?php echo $terapis->agama_pegawai ?>"></td></tr>

						<tr><td><b>Gol Darah</b></td><td>
							<select name="goldarah_pegawai">
								<option><b><?php echo $terapis->goldarah_pegawai ?></b></option>
								<option><b>A</b></option>
								<option><b>B</b></option>
								<option><b>AB</b></option>
								<option><b>O</b></option>
							</select>
						</td></tr>

						<tr><td><b>Jenis Kelamin</b></td><td>
							<select name="jk_pegawai">
								<option><b><?php echo $terapis->jk_pegawai ?></b></option>
								<option><b>L</b></option>
								<option><b>P</b></option>
							</select>
						</td></tr>

						<tr><td><b>Pendidikan Akhir</b></td><td><input type="text" name="pendakhir_pegawai" class="form-control" value="<?php echo $terapis->pendakhir_pegawai ?>"></td></tr>

						<tr><td><b>Spesialis</b></td><td><input type="text" name="spesialis_pegawai" class="form-control" value="<?php echo $terapis->spesialis_pegawai ?>"></td></tr>

						<tr><td><b>Email</b></td><td><input type="text" name="email_pegawai" class="form-control" value="<?php echo $terapis->email_pegawai ?>"></td></tr>

						<tr><td><b>no. Hp</b></td><td><input type="text" name="nohp_pegawai" class="form-control" value="<?php echo $terapis->nohp_pegawai ?>"></td></tr>

						<tr><td><b>alamat</b></td><td><textarea name="alamat_pegawai"><?php echo $terapis->alamat_pegawai ?></textarea></td></tr>

						<tr><td><div class="offset-sm-2 col-sm-10">
								<button type="submit" class="btn btn-success">Update</button>
							</div></td></tr>

						<?php echo form_close() ?>
						</table>
					</div>
					
					
				</div>
				<div class="col-md-4 menutengah"></div>

				

				

				
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