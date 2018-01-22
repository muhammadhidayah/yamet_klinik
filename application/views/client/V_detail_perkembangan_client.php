<!DOCTYPE html>
<html>
<head>
	<title>Member Perkembangan Client</title>
	
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
					<h5><b>Laporan Perkembangan Client</b></h5>
				
					<form action="<?php echo site_url('client/perkembangan/detail') ?>" method="GET" class="form-group">

						<div class="col-md-12 form-group"><label>Filter</label></div>

						<div class="col-md-3 form-group">
							<input type="month" name="bulan" class="form-control">
						</div>

						<div>
							<input type="submit" name="submit" value="Cari" class="btn btn-sm btn-success">
						</div>
						
					</form>

					
					<table class="table">
						<tr>
							<td>No</td>
							<td>Nama Terapis</td>
							<td>Tanggal Terapis</td>
							<td>Action</td>
						</tr>
						<?php if(count($result) > 0) { ?>
							<?php $i = 0; foreach ($perkembangan as $client): $i++;?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $client->nama_pegawai; ?></td>
								<td><?php echo $client->tanggal_perkembangan; ?></td>
								<td>
									<a href="<?php echo site_url('client/perkembangan/preview/'. $client->id_perkembanganclient) ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Detail</a>
									
								</td>
							</tr>
						<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="4"><center>Client Tidak Melakukan Terapi Pada Bulan Ini</center></td>
							</tr>
						<?php } ?>
					</table>
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