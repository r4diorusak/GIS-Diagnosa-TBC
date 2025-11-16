<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
    <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/normalize.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/template.css?v='.md5(date('YmdHis'))) ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/hover-min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css') ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>

    <?php echo $map['js'] ?>
	
	<style>
	<style type='text/css'>
  .my-legend .legend-title {
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 90%;
    }
  .my-legend .legend-scale ul {
    margin: 0;
    margin-bottom: 5px;
    padding: 0;
    float: left;
    list-style: none;
    }
  .my-legend .legend-scale ul li {
    font-size: 80%;
    list-style: none;
    margin-left: 0;
    line-height: 18px;
    margin-bottom: 2px;
    }
  .my-legend ul.legend-labels li span {
    display: block;
    float: left;
    height: 16px;
    width: 30px;
    margin-right: 5px;
    margin-left: 0;
    border: 1px solid #999;
    }
	
	.my-legend span {
    display: block;
    float: left;
    height: 16px;
    width: 30px;
    margin-right: 5px;
    margin-left: 0;
    border: 1px solid #999;
    }
	
  .my-legend .legend-source {
    font-size: 70%;
    color: #999;
    clear: both;
    }
  .my-legend a {
    color: #777;
    }
  .logo{
	margin-top: -5px;
	position:absolute;
  }	
  .logo-login{
	position:absolute;
  }	
  .judul{
	  font-size: 10.5pt;
    font-weight: bold;
    font-family: 'PT Sans', sans-serif !important;
    color: #607D8B !important;
	margin-top: -5px;
	margin-left:40px;
  }
.modal-title-login{
	margin-left:40px;
}	

#map_canvas {
    width=80%;
    margin-left: -1%;
}
</style>
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url() ?>"><img class="logo" src="public/icon/puskesmas_hijau.png"><label class="judul" align="left"> Sistem Informasi Geografis Penyebaran Penyakit TBC Dengan Metode K-Means <br>Dan Sistem Diagnosa Penyakit TBC Dengan Metode Naive Bayes Di Dinas Kesehatan Kota Padangsidimpuan</a></label>
			</div>
			<div class="collapse navbar-collapse">
                <ul class="nav navbar-button navbar-nav navbar-right">
                    <li>
                    	<?php if($this->session->has_userdata('admin_login') == FALSE) : ?>
                        <a data-toggle="modal" href='#modalLogin' title="Lgoin">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    	<?php else : ?>
                        <a href="<?php echo base_url('admin') ?>" class="hvr-rotate" title="Lgoin">
                            <i class="fa fa-sign-in"></i> Kembali ke Administrator
                        </a>
                    	<?php endif; ?>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url() ?>" class="hvr-underline-reveal">Home</a></li>
					<li><a  data-toggle="modal" href='#modal-metode' class="hvr-underline-reveal">Diagnosa TBC</a></li>
					<li><a  data-toggle="modal" href='#modal-about' class="hvr-underline-reveal">About</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid top20px">
		<div class="row">
			<div class="col-md-3" style="margin-top: 70px;">
				<form action="" method="get">
				<div class="form-group">
					<label for="">Cari Fasyankes :</label>
					<input type="text" name="q" value="<?php echo $this->input->get('q') ?>" class="form-control" id="place-input">
				</div>
				
<div class='my-legend'>
<label>Keterangan</label>
<div class='legend-scale'>
  <ul class='legend-labels'>
    <li><span style='background:green;'></span>Rendah</li>
    <li><span style='background:yellow;'></span>Sedang</li>
    <li><span style='background:red;'></span>Tinggi</li>
	
  </ul>
</div>
<div class='legend-source'></div>
</div>
				
			
				
				<?php if($this->db->get('kecamatan')->num_rows()) : ?>
				<div class="form-group">
					<label>Kecamatan :</label>
					<?php foreach($this->db->get('kecamatan')->result() as $key => $row) : ?>
		            <div class="checkbox checkbox-info my-legend"> 
					<div class='legend-scale'>
		                <input type="checkbox" value="<?php echo $row->id_kecamatan; ?>" name="kecamatan[<?php echo $key ?>]" <?php if((int)@in_array($row->id_kecamatan, $this->input->get('kecamatan')) AND @is_array($this->input->get('kecamatan'))) echo 'checked'; ?>>
		                <?php
						$warna="";
						if( $row->tingkat=='1' )
							$warna="<span style='background:green;'></span>";
						if( $row->tingkat=='2' )
							$warna="<span style='background:yellow;'></span>";
						if( $row->tingkat=='3' )
							$warna="<span style='background:red;'></span>";	
						
						?>
						
						<label ><?php echo $warna.$row->nama_kecamatan; ?></label> 
						  </div>
		            </div>
		        	<?php endforeach; ?>
				</div>
				<?php endif; ?>
				
				<?php if($this->db->get('fasyankes')->num_rows()) : ?>
				<div class="form-group">
					<label>Fasyankes :</label>
					<?php foreach($this->db->get('fasyankes')->result() as $key => $row) : ?>
		            <div class="checkbox checkbox-info my-legend"> 
					<div class='legend-scale'>
		                <input type="checkbox" value="<?php echo $row->ID; ?>" name="fasyankes[<?php echo $key ?>]" <?php if((int)@in_array($row->ID, $this->input->get('fasyankes')) AND @is_array($this->input->get('fasyankes'))) echo 'checked'; ?>>
		                <?php
						$warna="";
						if( $row->tingkat=='1' )
							$warna="<span style='background:green;'></span>";
						if( $row->tingkat=='2' )
							$warna="<span style='background:yellow;'></span>";
						if( $row->tingkat=='3' )
							$warna="<span style='background:red;'></span>";	
						
						?>
						
						<label ><?php echo $warna.$row->name; ?></label> 
						  </div>
		            </div>
		        	<?php endforeach; ?>
				</div>
				<?php endif; ?>
				
				<div class="form-group">
					<label for="">Tingkat Penyebaran:</label>
					<select name="tingkat" id="input" class="form-control">
						<option value="">~ Semua ~</option>
						<option value="Rendah" <?php if($this->input->get('tingkat') == 'Rendah') echo 'selected'; ?>> Rendah</option>
						<option value="Rendah-Sedang" <?php if($this->input->get('tingkat') == 'Rendah-Sedang') echo 'selected'; ?>> Rendah-Sedang</option>
						<option value="Sedang-Tinggi" <?php if($this->input->get('tingkat') == 'Sedang-Tinggi') echo 'selected'; ?>> Sedang-Tinggi</option>
						<option value="Tinggi" <?php if($this->input->get('tingkat') == 'Tinggi') echo 'selected'; ?>> Tinggi</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-block"><i class="fa fa-search"></i> Cari</button>
				</div>
				<div id="directionsDiv"></div>
				</form>
			</div>
			<div class="col-sm-9">
			
				<?php echo $map['html'] ?>
			</div>
		</div><br><br><br><br>
	</div>
	<footer class="page-break-top">
		<div class="footer-divider"></div>
		<div class="container">
			<div class="row">
				<div class="clearfix page-break-top"></div>
				<div class="hr5"></div>
				<div class="col-md-12">
					<p class="text-center"><small>Ari Naditama @2022 - Sistem Informasi Geografis Penyebaran Penyakit TBC Dengan Metode K-Means Dan Sistem Diagnosa Penyakit TBC Dengan Metode Naive Bayes Di Dinas Kesehatan Kota Padangsidimpuan </small></p>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="modalLogin">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<img class="logo-login" src="public/icon/puskesmas_hijau.png"><h4 class="modal-title-login">Login</h4>
				</div>
				<form action="<?php echo base_url('user/auth') ?>" method="POST" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Username / E-Mail :</label>
						<input type="text" class="form-control" name="identity" required>
					</div>
					<div class="form-group">
						<label for="">Password :</label>
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Login</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian!</h4>
					<p><?php echo $this->session->flashdata('message') ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-about" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tentang Aplikasi</h4>
				</div>
				<div class="modal-body">
					<p>Sistem Informasi Geografis Penyebaran Penyakit TBC Dengan Metode K-Means Dan Sistem Diagnosa Penyakit TBC Dengan Metode Naive Bayes Di Dinas Kesehatan Kota Padangsidimpuan dibangun dengan PHP (Framework Codeigniter 3), Google Maps V3 API dan Twitter bootstrap.</p>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama Pengembang</td>
								<td width="50" class="text-center">:</td>
								<td>Ari Naditama</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td width="50" class="text-center">:</td>
								<td>180180002</td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td width="50" class="text-center">:</td>
								<td>Sistem Informasi</td>
							</tr>
							<tr>
								<td>Universitas</td>
								<td width="50" class="text-center">:</td>
								<td>Universitas Malikussaleh Aceh</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td width="50" class="text-center">:</td>
								<td>Jl. Kenanga no.11A Kota Padangsidimpuan</td>
							</tr>
							<tr>
								<td>Nomor Telepon</td>
								<td width="50" class="text-center">:</td>
								<td>0852-6079-1707</td>
							</tr>
						</tbody>
					</table>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade" id="modal-metode" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Diagnosa TBC</h4>
				</div>
				<div class="modal-body">
	<form class="form-horizontal" action="user/hitung_bayes" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <?php if($this->session->flashdata('message')) : ?>
            <div class="col-sm-8 col-md-offset-2">
                <div class="form-group">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
  	
	<div class="form-group">
      <label class="col-sm-2 control-label">Umur :</label>
      <div class="col-sm-8">
          <input type="number" name="umur" class="form-control" required>
            
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Batuk (Hari) :</label>
      <div class="col-sm-8">
          <input type="number" name="batuk" class="form-control" required>
            
      </div>
    </div>
	
			<div class="form-group">
                   <label class="col-sm-2 control-label">Penurunan Berat Badan :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="penurunan" required>
                    <option value="">- Pilih -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Sesak Nafas :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="sesak" required>
                    <option value="">- Pilih -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
			
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Berkeringat Malam :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="berkeringat" required>
                    <option value="">- Pilih -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Batuk Darah :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="batukd" required>
                    <option value="">- Pilih -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Demam :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="demam" required>
                    <option value="">- Pilih -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
   
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-block"><i class="fa  fa-stethoscope"></i> Jalankan Diagnosa</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modal-diagnosa" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Hasil Diagnosa</h4>
				</div>
				<div class="modal-body">
					
					<?php 
					echo $_GET['klarifikasi'];
					echo '<br><br>Hasil Diagnosa = <b>'.$_GET['hasil'].'</b>';
					
					?>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php if (isset($_GET['hasil'])=='Positif') { ?>
	<script type='text/javascript'>
	$("#modal-diagnosa").modal("show");
	</script>
<?php } ?>

<?php if (isset($_GET['hasil'])=='Negatif') { ?>
	<script type='text/javascript'>
	$("#modal-diagnosa").modal("show");
	</script>
<?php } ?>
	
	
	<script>
		function detail_hotel(param) 
		{
			$('div#modal-id').modal('show');
		}
		$(document).ready(function() {
			<?php if($this->session->flashdata('message')) : ?>
			$('div#modal-alert').modal('show');
			<?php endif; ?>
		});
	</script>
</body>
</html>