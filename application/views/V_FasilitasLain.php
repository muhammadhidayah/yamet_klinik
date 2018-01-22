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
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body>
	<div class="wrapper">
		<div class="header">
			<ul>
				<li><a href="<?php echo site_url('home')?>">Beranda</a></li>
				<li><a style="color: #f2f2f2;" href="<?php echo site_url('profil')?>">Profil</a></li>
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
	<div class="Lbody">
			<center><img src="<?php echo base_url('assets/img/yamet1.jpg') ?>"></center>
		</div>
	

		<div class="HjudulBerita">
			<div class="col-md-3"></div>
			<div class="col-md-4"><a href="<?php echo site_url('Fasilitas/Kelas')?>"><b>Kelas</b></a></div>
			<div class="col-md-4"><a href="<?php echo site_url('Fasilitas/FasilitasLain')?>"><b>Fasilitas Lain</b></a></div>
		</div>
	</div>
	
	<div class="row putih1">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th><b>Fasilitas Lain</b></th>
					</tr>
					<?php foreach ($fasilitaslain as $key ): ?>
						<tr>
							<td><img src="<?php echo base_url('assets/upload/fasilitas/'.$key->gambar_fasilitas)?>" height="200px" ></td>
						</tr>
						<td><?php echo $key->isi_fasilitas; ?></td>
					<?php endforeach  ?>
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