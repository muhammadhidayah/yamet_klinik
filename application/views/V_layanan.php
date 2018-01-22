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
			<div class="col-md-4"><a href="<?php echo site_url('layanan/kondisi')?>"><b>Kondisi yang Di Layani</b></a></div>
			<div class="col-md-4"><a href="<?php echo site_url('layanan/melayani')?>"><b>Melayani</b></a></div>
		</div>

		<div class="menutengahpost">
			<!-- <div class="col-md-3">
				

				<table class="table">
					<tr>
						<th><h2>News</h2></th>
					</tr>

						<tr>
							<td><a href="#link artikel "><?php echo $profile->nama_klinik ?></a></td>
						</tr>
				</table>
			</div> -->
			
<!-- 				<div class="col-md-4"><img src="<?php echo base_url('assets/upload/layanan/autis.jpg')?>">	</div>
 -->				
				<div class="col-md-5">
					<h2>Kondisi Yang dilayani</h2>
				<p><p><em>Autisme</em>&nbsp;adalah kelainan perkembangan sistem saraf pada seseorang yang kebanyakan diakibatkan oleh faktor hereditas dan kadang-kadang telah dapat dideteksi sejak bayi berusia 6 bulan. Deteksi dan terapi sedini mungkin akan menjadikan si penderita lebih dapat menyesuaikan dirinya dengan yang normal.</p>
			
				
				
			</div>
		</div>

<!-- 	<div class="row putih1">
			
			<div class="col-md-12">
				
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  
    <div class="carousel-item active">
     <div class="col-md-4"> <img class="d-block img-fluid" src="<?php echo base_url('assets/upload/layanan/autis.jpg')?>" height="200px" alt="First slide"></div>
     <div class="col-md-7">
     	<p><p><em>Autisme</em>&nbsp;adalah kelainan perkembangan sistem saraf pada seseorang yang kebanyakan diakibatkan oleh faktor hereditas dan kadang-kadang telah dapat dideteksi sejak bayi berusia 6 bulan. Deteksi dan terapi sedini mungkin akan menjadikan si penderita lebih dapat menyesuaikan dirinya dengan yang normal.</p>
     </div>
        
    </div>
  
     	<?php foreach ($layanan as $layanan): ?>
    <div class="carousel-item">
      <div class="col-md-4">
      	<img class="d-block img-fluid" src="<?php echo base_url('assets/upload/layanan/'.$layanan->gambar_layanan)?>" height="200px" alt="Second slide">
      </div>
    <div class="col-md-7">
    	<p><?php echo $layanan->isi_layanan; ?></p>
    </div>
    </div>

       <?php endforeach ?>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
			</div>
		</div> -->

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