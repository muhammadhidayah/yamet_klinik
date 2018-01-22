<!DOCTYPE html>
<html>
<head>
	<title>Perkembangan Siswa</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
		
		<div class="wrapper">
	
<!-- 		<div class="btnHlogin">
			<div class="col-md-11"></div>
				<?php if($this->session->userdata('logged_in')) { ?>
					<a href="<?php echo site_url('auth/logOut')?>"><button type="button" class="btn btn-info">Log Out</button></a>
				<?php } else { ?>
					<a href="<?php echo site_url('auth')?>"><button type="button" class="btn btn-info">Login</button></a>
				<?php } ?>
		</div> -->

		<div class="header">
			<ul>
				<li><a style="color: #f2f2f2;" href="<?php echo site_url('home')?>">Beranda</a></li>
				<li><a href="<?php echo site_url('profil')?>">Profil</a></li>
				<li><a href="<?php echo site_url('fasilitas')?>">Fasilitas</a></li>
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

				<div class="col-md-9">
					<h5><b>Laporan Perkembangan Siswa</b></h5>
				
					

					
					<table class="table" style="text-align: center;">
						<tr>
							<td ><b>YAMET KLINIK TUMBUH KEMBANG ANAK</b></td>
						</tr>
						<tr><td>JL. Kebon Agung 101 Sendang Adi, Mlati, Sleman</td></tr>
						<tr><td>Telp. (0274) 4530535 / 0822 25503447</td></tr>
						<tr><td>YOGYAKARTA</td></tr>
						<tr><td><hr></td></tr>
						
					</table>
					<table class="table">
						<tr><td><b>Nama Siwa : </b></td><td><?php echo $preview->nama_client; ?></td></tr>
						<tr><td><b>Diagnosa Awal : </b></td><td><?php echo $preview->diagnosis_client; ?></td></tr>
						<tr><td><b>Terapis :</b></td><td> <?php echo $preview->nama_pegawai; ?></td></tr>
						<tr><td><b>Tanggal Terapi : </b></td><td><?php echo $preview->tanggal_perkembangan; ?></td></tr>
						<tr><td><b>Perkembangan Siswa : </b></td><td><?php echo $preview->laporan_perkembanganclient; ?></td></tr>
						<tr><td><a href="<?php echo site_url('client/perkembangan/cetak/'. $preview->id_perkembanganclient) ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</a></td></tr>
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