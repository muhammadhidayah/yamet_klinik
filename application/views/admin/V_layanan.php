<!DOCTYPE html>
<html>
<head>
	<title>Admin - klinik</title>
	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/validasi.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
		<script src=”<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.dev.js”></script>
		<script src=”<?php echo base_url(); ?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js”></script>
		<script src=”<?php echo base_url(); ?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js”></script>
		<script src=”<?php echo base_url(); ?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js”></script>
		<script>
	tinymce.init({
		selector: "textarea",
		theme: "modern",
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
		],
		external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
		},
		content_css: "css/development.css",
		add_unload_trigger: false,

		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample",

		image_advtab: true,
		image_caption: true,

		style_formats: [
			{title: 'Bold text', format: 'h1'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		template_replace_values : {
			username : "Jack Black"
		},

		template_preview_replace_values : {
			username : "Preview user name"
		},

		link_class_list: [
			{title: 'Example 1', value: 'example1'},
			{title: 'Example 2', value: 'example2'}
		],

		image_class_list: [
			{title: 'Example 1', value: 'example1'},
			{title: 'Example 2', value: 'example2'}
		],

		templates: [
			{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
			{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
		],

		setup: function(ed) {
			/*ed.on(
				'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
				'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
				'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
				console.log(e.type, e);
			});*/
		},

		spellchecker_callback: function(method, data, success) {
			if (method == "spellcheck") {
				var words = data.match(this.getWordCharPattern());
				var suggestions = {};

				for (var i = 0; i < words.length; i++) {
					suggestions[words[i]] = ["First", "second"];
				}

				success({words: suggestions, dictionary: true});
			}

			if (method == "addToDictionary") {
				success();
			}
		}
	});

</script>
</head>
<body>
	<div class="wrapper">
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
					<h5><b><i>Fasilitas dan Layanan</i></b></h5>
					
					<div class="table-responsive">
					<table class="table">
						<tr>
							<th></th>
							<th colspan="2"><a href="<?php echo site_url('admin/layanan/tambah_layanan') ?>">
								<button type="button" class="btn btn-success">++ Layanan</button>
							</a>
							<a href="<?php echo site_url('admin/fasilitas/tambah_fasilitas') ?>">
								<button type="button" class="btn btn-success">++ Fasilitas</button>
							</a>

							<a href="<?php echo site_url('admin/Kelas/tambah_kelas') ?>">
								<button type="button" class="btn btn-success">++ Kelas</button>
							</a>
						</th>
						</tr>
						<tr>
							<th style="background-color: #1abc9c; color: white;">isi layanan</th>
							<th style="background-color: #1abc9c; color: white;">gambar</th>
							<th colspan="2" style="background-color: #1abc9c; color: white;">action</th>
						</tr>
						<?php foreach ($layanan as $layanan): ?>
							<tr>
								<td><?php echo $layanan->isi_layanan; ?></td>
								<td><img src="<?php echo base_url('assets/upload/layanan/'.$layanan->gambar_layanan) ?>" height="150px"></td>
								<td>
									<a href="<?php echo site_url('admin/layanan/edit/'.$layanan->id_layanan) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
								</td>
								<td>
									<a href="<?php echo site_url('admin/Layanan/delete/'.$layanan->id_layanan) ?>">
								<button type="button" class="btn btn-danger">Delete</button>
							</a>
								</td>
							</tr>
								
					<?php endforeach ?>
								
					<tr>
								<th style="background-color: #1abc9c; color: white;"><b>Isi Fasilitas</b></th>
								<th style="background-color: #1abc9c; color: white;"><b>Gambar</b></th>
								<th style="background-color: #1abc9c; color: white;" colspan="2"><b>Action</b></th>
							</tr>
							<?php foreach ($fasilitas as $fasilitas): ?>
							<tr>
								<td><?php echo $fasilitas->isi_fasilitas; ?></td>
								<td><img src="<?php echo base_url('assets/upload/fasilitas/'.$fasilitas->gambar_fasilitas) ?>" height="150px"></td>
								<td>
									<a href="<?php echo site_url('admin/fasilitas/edit/'.$fasilitas->id_fasilitas) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
								</td>
								<td>

									<a href="<?php echo site_url('admin/fasilitas/delete/'.$fasilitas->id_fasilitas) ?>">
								<button type="button" class="btn btn-danger">Delete</button>
							</a>
								</td>
							</tr>
					<?php endforeach ?>

					<tr>
							<th style="background-color: #1abc9c; color: white;">isi kelas</th>
							<th style="background-color: #1abc9c; color: white;">gambar</th>
							<th colspan="2" style="background-color: #1abc9c; color: white;">action</th>
						</tr>

						<?php foreach ($kelas as $kelas): ?>
							<tr>
								<td><?php echo $kelas->isi_kelasklinik; ?></td>
								<td><img src="<?php echo base_url('assets/upload/kelas/'.$kelas->gambar_kelasklinik) ?>" height="150px"></td>
								<td>
									<a href="<?php echo site_url('admin/kelas/edit/'.$kelas->id_kelasklinik) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
								</td>
								<td>

									<a href="<?php echo site_url('admin/kelas/delete/'.$kelas->id_kelasklinik) ?>">
								<button type="button" class="btn btn-danger">Delete</button>
							</a>
								</td>
							</tr>
					<?php endforeach ?>

					</table>
					</div>
					<hr style="color: black;">
					<div class="table-responsive">
						<table class="table">
							
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