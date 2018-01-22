<!DOCTYPE html>
<html>
<head>
	<title>Siswa</title>
	
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
							<tr><td style="text-align: center;" ><a href="#"><button type="button" class="btn btn-info">Lihat Profile</button></a></td></tr>
							<?php echo form_open_multipart('client/dashboard/updateAva'); ?>
								<tr><td><input type="file" name="avaprofile" class="form-control" required></td></tr>
								<tr><td style="text-align: center;"><input type="submit" class="btn btn-info btn-sm" name="submit" value="Update Foto"></td></tr>	
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
					


				</div>
				<div class="col-md-9 menutengahter">
					<h5><b><i>Biodata Siswa</i></b></h5>
			
					<div class="table-responsive">
						<table class="table">
						<tr>
							<th>Nama Siswa</th>
							<th>Tanggal lahir</th>
							<th>diagnosis</th>
							<th>alamat</th>
							<th>Email</th>
							<th>password</th>
							<th>Action</th>
					</tr>
					
						
						<tr>
							<td> <?php echo $client->nama_client; ?></td>
							<td> <?php echo $client->tgllahir_client; ?></td>
							<td> <?php echo $client->diagnosis_client; ?></td>
							<td> <?php echo $client->alamat_client; ?></td>
							<td> <?php echo $client->email_client; ?></td>
							<?php echo form_open('client/dashboard/updateuser'); ?>
							<td><input type="text" class="form-control" name="password" value="<?php echo $client->password_client; ?>" ></td>
							<td><div class="offset-sm-2 col-sm-10">
							        <button type="submit" class="btn btn-success">Update</button>
							      </div>
							</td>
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