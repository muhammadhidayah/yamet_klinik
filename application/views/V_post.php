<!DOCTYPE html>
<html>
<head>
	<title>Yamet</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		 <meta charset="utf-8">
 		 <meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

		<!-- <div class="HlogoAtas">
			<img class="d-block img-fluid" src="<?php echo base_url('assets/img/ikonYamet.png')?>">
		</div> -->
		<div class="slideshow-container">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="<?php echo base_url('assets/img/home.jpg')?>" alt="First slide" >
						<div class="carousel-caption d-none d-md-block">
							<h3>SLide 1</h3>
							<p>slide satu adalah slide satu adalah slide satu adalah</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="<?php echo base_url('assets/img/home1.jpg')?>" alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>SLide 1</h3>
							<p>slide satu adalah</p>
						</div>
					</div>

					<div class="carousel-item">
						<img class="d-block img-fluid" src="<?php echo base_url('assets/img/home0.jpg')?>" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>SLide 2</h3>
							<p>slide satu adalah</p>
						</div>
					</div>
				</div>

				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<div class="HjudulBerita">
			<div class="col-md-3"></div>
			<div class="col-md-2"><a href="<?php echo site_url('home')?>"><b>News</b></a></div>
			<div class="col-md-6"><a href="<?php echo site_url('layanan/kondisi') ?>"><b>Jenis Terapi</b></a></div>
		</div>

		<div class="row menudepannews">
			<hr style="border-color: transparent;">
			<div class="col-md-3">
				

				<table class="table">
					<tr>
						<th><h1>News</h1></th>
					</tr>
						<?php foreach ($berita as $ber) { ?>
							
					
						<tr>
							<td><a href="<?php echo site_url('home/post/'.$ber->id_post)?>"><?php echo $ber->judul_post ?></a></td>
						</tr>

						<?php	}  ?>
				</table>
			</div>
			<div class="col-md-9 menutengahpost">
			
			<?php echo form_hidden('id_post',$this->uri->segment(3)); ?>
				<table class="table">
					<tr>
						<th colspan="2"><h1><b> <?php  echo $tampilberita['judul_post']; ?> </b></h1></th></tr>
					<tr> 
						<td><!--udah bisa nampilin gambar. tinggal tambahin echo doang kok--><img src="<?php echo base_url('assets/upload/post/'.$tampilberita['gambar_post']) ?>" height="250px"></td>
						
						<td>
							<?php  echo $tampilberita['isi_post']; ?>
						</td>
					</tr>
						
					</tr>
				</table>
					
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