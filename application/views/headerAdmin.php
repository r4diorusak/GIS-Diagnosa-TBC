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
<style>
<style type='text/css'>
  .rata{
	     margin-left: 40px; 
  }
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
.judul{
	  font-size: 10.5pt;
    font-weight: bold;
    font-family: 'PT Sans', sans-serif !important;
    color: #607D8B !important;
	margin-top: -5px;
	margin-left:40px;
  }
  
  .page-header {
    padding-bottom: 15px;
    margin: 25px 0 10px;
    border-bottom: 1px solid #eee;
}
.container {
    width: 1366px;
}
</style>
	<?php if(isset($map['js'])) echo $map['js']; ?>
	
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
				<a class="navbar-brand" href="<?php echo base_url() ?>admin"><i class="fa fa-lg fa-laptop"></i> Administrator</a>
			</div>
			<div class="collapse navbar-collapse">
                <ul class="nav navbar-button navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url('user/signout') ?>" class="hvr-rotate" title="Lgoin">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url() ?>" class="hvr-underline-reveal">Kembali ke Map</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 80px;">
	    <div class="row">
			<div class="col-md-2 user-sidebar">
				<div id="sidebar-sticker">
				<div class="list-group" style="margin-top: 20px;">
					<a href="<?php echo base_url('admin') ?>" class="list-group-item <?php echo active_link_method('index', 'admin') ?>">
						<i class="fa fa-home"></i> Home
					</a>
					<a href="<?php echo base_url('admin/addfasyankes') ?>" class="list-group-item <?php echo active_link_method('addfasyankes', 'admin') ?>">
						<i class="fa fa-plus"></i> Tambah Fasyankes
					</a>
					<a href="<?php echo base_url('admin/fasyankes') ?>" class="list-group-item <?php echo active_link_method('fasyankes', 'admin') ?>">
						<i class="fa fa-hospital-o"></i> Data Fasyankes
					</a>
					<a href="<?php echo base_url('admin/addpasien') ?>" class="list-group-item <?php echo active_link_method('addpasien', 'admin') ?>">
						<i class="fa fa-plus"></i> Tambah Pasien
					</a>
					<a href="<?php echo base_url('admin/pasien') ?>" class="list-group-item <?php echo active_link_method('pasien', 'admin') ?>">
						<i class="fa fa-users"></i> Data Pasien
					</a>
					<a href="<?php echo base_url('admin/metode') ?>" class="list-group-item <?php echo active_link_method('metode', 'admin') ?>">
						<i class="fa  fa-stethoscope"></i> Metode K-Means
					</a>
					<a href="<?php echo base_url('admin/bayes') ?>" class="list-group-item <?php echo active_link_method('bayes', 'admin') ?>">
						<i class="fa  fa-stethoscope"></i> Metode Naive Bayes
					</a>
					<a href="<?php echo base_url('admin/account') ?>" class="list-group-item <?php echo active_link_method('account', 'admin') ?>">
						<i class="fa fa-wrench"></i> Pengaturan Akun
					</a>
				</div>
			</div>
			</div>
			<div class="col-md-10 user-contents">