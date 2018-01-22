<!DOCTYPE html>
<html>
<head>
	<title>Admin - tambah client</title>
	
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
		<div class="row putih1">
			
			<hr style="border-color: transparent;">
			<div class="col-md-11"></div>
			<div class="col-md-1">
				<?php if($this->session->userdata('logged_in')) { ?>
					<a href="<?php echo site_url('auth/logOut')?>"><button type="button" class="btn btn-info">Log Out</button></a>
				<?php } else { ?>
					<a href="<?php echo site_url('auth')?>"><button type="button" class="btn btn-info">Login</button></a>
				<?php } ?>
			</div>
			<hr style="border-color: transparent;">
			<hr style="border-color: transparent;">
			<hr style="border-color: transparent;">
			
		</div>
		<div class="row ">
			<div class="col-md-12 menu">
					<ul>
						<li><a href="<?php echo site_url('home')?>">Beranda</a></li>
						<li><a href="<?php echo site_url('profil')?>">Profil</a></li>
						<li><a href="">Logo</a></li>
						<li><a href="<?php echo site_url('layanan')?>">Fasilitas &#38; Layanan</a></li>
 						<li><a href="<?php echo site_url('staff')?>">Staff</a></li>
					</ul>
				</div>
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

				<div class="col-md-9 menutengah">
					<h5><b><i>Tambah Client</i></b></h5>
					<hr style="border-color: #333333; width: 90px;">

					<div class="table-responsive">

						<?php echo form_open('admin/client/insertClient');?>
						<table class="table">
							<tr><td>Nama </td>
								<td><input type="text" name="nama_client" value="<?php echo set_value('nama_client') ?>" required></td>
							</tr>
							<tr>
								<td>Nama Panggilan Client</td>
								<td><input type="text" value="<?php echo set_value('namapanggilan_client') ?>" name="namapanggilan_client" required></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td><input type="date" name="tgllahir_client" value="<?php echo set_value('tgllahir_client') ?>" required></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td><input type="text" name="templahir_client" value="<?php echo set_value('templahir_client')?>" required></td>
							</tr>

							<tr>
								<td>Diagnosis</td>
								<td><input type="text" name="diagnosis_client" value="<?php echo set_value('diagnosis_client') ?>" required></td>
							</tr>
							<tr>
								<td>jenis kelamin</td>
								<td><select name="jk_client">
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
	 						</tr>

	 						<tr>
								<td>Agama</td>
								<td><input type="text" name="agama_client" value="<?php echo set_value('agama_client') ?>" required></td>
							</tr>
							
							<tr>
								<td>Sekolah</td>
								<td><input type="text" name="sekolah_client" required></td>
							</tr>

							<tr>
								<td>Nomor Telp</td>
								<td><input type="text" name="notelp_client" placeholder="" required></td>
							</tr>

							<tr>
								<td>E-mail</td>
								<td><input type="email" name="email_client" required></td>
							</tr>

							
							<tr>
								<td>Password</td>
								<td><input type="password" name="password_client" required></td>
							</tr>


							<tr>
								<td>Nama Ayah</td>
								<td><input type="text" name="nama_ayahclient" required></td>
							</tr>
							<tr>
								<td>Nama Ibu</td>
								<td><input type="text" name="nama_ibuclient" required></td>
							</tr>

							<tr>
								<td>Alamat</td>
								<td><textarea name="alamat_client" required></textarea></td>
								
							</tr>

							<tr>
								<td>Catatan Khusus</td>
								<td><textarea name="catatan_khususclient" required></textarea></td>
								
							</tr>

							<tr><td><?php echo form_submit('SUBMIT','SIMPAN DATA'); ?></td></tr>
						</table>
						<?php echo form_close();?>
					</div>
					
				</div>

				

				

				
			</div>
			

		</div>

		

		<div class="row hijau1">
			<div class="col-md-2 ">
				
				
					<b>Logo</b>
				
			</div>
			<div class="col-md-7"></div>
			<div class="col-md-3">
			
			<b style="color: #f2f2f2">Copyrigth2017 YametDesignbyOlivia</b>
		
			</div>
		</div>

	</div>

</body>
</html>