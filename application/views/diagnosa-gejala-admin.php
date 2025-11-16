<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hasil Diagnosa </title>
	 <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/normalize.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/template.css?v='.md5(date('YmdHis'))) ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/hover-min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css') ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.sticky.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js') ?>"></script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Diagnosa Penyakit TBC Dengan Metode Naive Bayes</h1>

	<div id="body">
		
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
<div class="col-md-12">
<H3>Frequency</H3>
<!--Frequensi Penurunan Berat Badan-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;
$B_Badan=0;
$P_bb1 = $this->db->query("SELECT COUNT(penurunan_bb) as bb FROM `pasien` WHERE penurunan_bb='Ya' and tbc='Positif'");
$P_bb2 = $this->db->query("SELECT COUNT(penurunan_bb) as bb FROM `pasien` WHERE penurunan_bb='Ya' and tbc='Negatif'");

$P_bb3 = $this->db->query("SELECT COUNT(penurunan_bb) as bb FROM `pasien` WHERE penurunan_bb='Tidak' and tbc='Positif'");
$P_bb4 = $this->db->query("SELECT COUNT(penurunan_bb) as bb FROM `pasien` WHERE penurunan_bb='Tidak' and tbc='Negatif'");

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}
		
foreach ($P_bb1->result() as $row){
$B_Badan1=$row->bb;
}

foreach ($P_bb2->result() as $row){
$B_Badan2=$row->bb;
}

foreach ($P_bb3->result() as $row){
$B_Badan3=$row->bb;
}

foreach ($P_bb4->result() as $row){
$B_Badan4=$row->bb;
}

?>
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="5" style="vertical-align : middle;text-align:center;">Frequency Penurunan Berat Badan</th>
		
		</tr>
  		<tr>	
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">PBB</th>
  			<th colspan="2"class="text-center">Class</th>	
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>	
  		</tr>

		<tr>
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Ya</td>
		<td><?php echo $N5=number_format($B_Badan1/$Tbc_positif,4); ?></td>
		<td><?php echo $O5=number_format($B_Badan2/$Tbc_negatif,4); ?></td>
		<td><?php echo $N7=$N5+$O5 ?></td>
	</tr>
	<tr>
		<td>Tidak</td>
		<td><?php echo $N6=number_format($B_Badan3/$Tbc_positif,4); ?></td>
		<td><?php echo $O6=number_format($B_Badan4/$Tbc_negatif,4); ?></td>
		<td><?php echo $O7=$N6+$O6 ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $N7=$N5+$N6 ?></td>
		<td><?php echo $O7=$O5+$O6 ?></td>
		<td></td>
	</tr>
	</tbody>
	</table>
</div>

<!--Frequensi Sesak Nafas-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;

$P_sn1 = $this->db->query("SELECT COUNT(sesak_nafas) as bb FROM `pasien` WHERE sesak_nafas='Ya' and tbc='Positif'");
$P_sn2 = $this->db->query("SELECT COUNT(sesak_nafas) as bb FROM `pasien` WHERE sesak_nafas='Ya' and tbc='Negatif'");

$P_sn3 = $this->db->query("SELECT COUNT(sesak_nafas) as bb FROM `pasien` WHERE sesak_nafas='Tidak' and tbc='Positif'");
$P_sn4 = $this->db->query("SELECT COUNT(sesak_nafas) as bb FROM `pasien` WHERE sesak_nafas='Tidak' and tbc='Negatif'");

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}
		
foreach ($P_sn1->result() as $row){
$S_Nafas1=$row->bb;
}

foreach ($P_sn2->result() as $row){
$S_Nafas2=$row->bb;
}

foreach ($P_sn3->result() as $row){
$S_Nafas3=$row->bb;
}

foreach ($P_sn4->result() as $row){
$S_Nafas4=$row->bb;
}

?>
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="5" style="vertical-align : middle;text-align:center;">Frequency Sesak Nafas</th>
		
		</tr>
  		<tr>	
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">PBB</th>
  			<th colspan="2"class="text-center">Class</th>	
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>	
  		</tr>

		<tr>
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Ya</td>
		<td><?php echo $S5=number_format($S_Nafas1/$Tbc_positif,4); ?></td>
		<td><?php echo $T5=number_format($S_Nafas2/$Tbc_negatif,4); ?></td>
		<td><?php echo $S7=$S5+$T5 ?></td>
	</tr>
	<tr>
		<td>Tidak</td>
		<td><?php echo $S6=number_format($S_Nafas3/$Tbc_positif,4); ?></td>
		<td><?php echo $T6=number_format($S_Nafas4/$Tbc_negatif,4); ?></td>
		<td><?php echo $T7=$S6+$T6 ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $S7=$S5+$S6 ?></td>
		<td><?php echo $T7=$T5+$T6 ?></td>
		<td></td>
	</tr>
	</tbody>
	</table>
</div>

<!--Frequensi Berkeringat Malam-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;

$km1 = $this->db->query("SELECT COUNT(berkeringat_malam) as bb FROM `pasien` WHERE berkeringat_malam='Ya' and tbc='Positif'");
$km2 = $this->db->query("SELECT COUNT(berkeringat_malam) as bb FROM `pasien` WHERE berkeringat_malam='Ya' and tbc='Negatif'");

$km3 = $this->db->query("SELECT COUNT(berkeringat_malam) as bb FROM `pasien` WHERE berkeringat_malam='Tidak' and tbc='Positif'");
$km4 = $this->db->query("SELECT COUNT(berkeringat_malam) as bb FROM `pasien` WHERE berkeringat_malam='Tidak' and tbc='Negatif'");

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}
		
foreach ($km1->result() as $row){
$S_km1=$row->bb;
}

foreach ($km2->result() as $row){
$S_km2=$row->bb;
}

foreach ($km3->result() as $row){
$S_km3=$row->bb;
}

foreach ($km4->result() as $row){
$S_km4=$row->bb;
}

?>
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="5" style="vertical-align : middle;text-align:center;">Frequency Berkeringat Malam</th>
		
		</tr>
  		<tr>	
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">PBB</th>
  			<th colspan="2"class="text-center">Class</th>	
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>	
  		</tr>

		<tr>
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Ya</td>
		<td><?php echo $X5=number_format($S_km1/$Tbc_positif,4); ?></td>
		<td><?php echo $Y5=number_format($S_km2/$Tbc_negatif,4); ?></td>
		<td><?php echo $X7=$X5+$Y5 ?></td>
	</tr>
	<tr>
		<td>Tidak</td>
		<td><?php echo $X6=number_format($S_km3/$Tbc_positif,4); ?></td>
		<td><?php echo $Y6=number_format($S_km4/$Tbc_negatif,4); ?></td>
		<td><?php echo $Y7=$X6+$Y6 ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $X7=$X5+$X6 ?></td>
		<td><?php echo $Y7=$Y5+$Y6 ?></td>
		<td></td>
	</tr>
	</tbody>
	</table>
</div>

<!--Frequensi Batuk Darah-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;

$bd1 = $this->db->query("SELECT COUNT(batuk_darah) as bb FROM `pasien` WHERE batuk_darah='Ya' and tbc='Positif'");
$bd2 = $this->db->query("SELECT COUNT(batuk_darah) as bb FROM `pasien` WHERE batuk_darah='Ya' and tbc='Negatif'");

$bd3 = $this->db->query("SELECT COUNT(batuk_darah) as bb FROM `pasien` WHERE batuk_darah='Tidak' and tbc='Positif'");
$bd4 = $this->db->query("SELECT COUNT(batuk_darah) as bb FROM `pasien` WHERE batuk_darah='Tidak' and tbc='Negatif'");

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}
		
foreach ($bd1->result() as $row){
$S_bd1=$row->bb;
}

foreach ($bd2->result() as $row){
$S_bd2=$row->bb;
}

foreach ($bd3->result() as $row){
$S_bd3=$row->bb;
}

foreach ($bd4->result() as $row){
$S_bd4=$row->bb;
}

?>
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="5" style="vertical-align : middle;text-align:center;">Frequency Batuk Darah</th>
		
		</tr>
  		<tr>	
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">PBB</th>
  			<th colspan="2"class="text-center">Class</th>	
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>	
  		</tr>

		<tr>
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Ya</td>
		<td><?php echo $AC5=number_format($S_bd1/$Tbc_positif,4); ?></td>
		<td><?php echo $AD5=number_format($S_bd2/$Tbc_negatif,4); ?></td>
		<td><?php echo $AC7=$AC5+$AD5 ?></td>
	</tr>
	<tr>
		<td>Tidak</td>
		<td><?php echo $AC6=number_format($S_bd3/$Tbc_positif,4); ?></td>
		<td><?php echo $AD6=number_format($S_bd4/$Tbc_negatif,4); ?></td>
		<td><?php echo $AD7=$AC6+$AD6 ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $AC7=$AC5+$AC6 ?></td>
		<td><?php echo $AD7=$AD5+$AD6 ?></td>
		<td></td>
	</tr>
	</tbody>
	</table>
</div>
<div class="clearfix"></div>
<!--Frequensi Demam-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;

$dm1 = $this->db->query("SELECT COUNT(demam) as bb FROM `pasien` WHERE demam='Ya' and tbc='Positif'");
$dm2 = $this->db->query("SELECT COUNT(demam) as bb FROM `pasien` WHERE demam='Ya' and tbc='Negatif'");

$dm3 = $this->db->query("SELECT COUNT(demam) as bb FROM `pasien` WHERE demam='Tidak' and tbc='Positif'");
$dm4 = $this->db->query("SELECT COUNT(demam) as bb FROM `pasien` WHERE demam='Tidak' and tbc='Negatif'");

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}
		
foreach ($dm1->result() as $row){
$S_dm1=$row->bb;
}

foreach ($dm2->result() as $row){
$S_dm2=$row->bb;
}

foreach ($dm3->result() as $row){
$S_dm3=$row->bb;
}

foreach ($dm4->result() as $row){
$S_dm4=$row->bb;
}

?>
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="5" style="vertical-align : middle;text-align:center;">Frequency Batuk Darah</th>
		
		</tr>
  		<tr>	
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">PBB</th>
  			<th colspan="2"class="text-center">Class</th>	
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>	
  		</tr>

		<tr>
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Ya</td>
		<td><?php echo $AH5=number_format($S_dm1/$Tbc_positif,4); ?></td>
		<td><?php echo $AI5=number_format($S_dm2/$Tbc_negatif,4); ?></td>
		<td><?php echo $AH7=$AI5+$AH5 ?></td>
	</tr>
	<tr>
		<td>Tidak</td>
		<td><?php echo $AH6=number_format($S_dm3/$Tbc_positif,4); ?></td>
		<td><?php echo $AI6=number_format($S_dm4/$Tbc_negatif,4); ?></td>
		<td><?php echo $AI7=$AH6+$AI6 ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $AH7=$AH5+$AH6 ?></td>
		<td><?php echo $AI7=$AI5+$AI6 ?></td>
		<td></td>
	</tr>
	</tbody>
	</table>
</div>

<!--Frequensi Diagnosa-->
<div class="col-md-3">
<?php
$Tbc_positif=0;
$Tbc_negatif=0;

$Tbc_q_positif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Positif'");
$Tbc_q_negatif  = $this->db->query("SELECT COUNT(tbc) as tbc FROM `pasien` WHERE tbc='Negatif'");

foreach ($Tbc_q_positif->result() as $row){
$Tbc_positif=$row->tbc;
}

foreach ($Tbc_q_negatif->result() as $row){
$Tbc_negatif=$row->tbc;
}

?>
<table class="table table-bordered">
  	<thead>
		
  
		<tr>
	  <th class="text-center">Diagnosa</th>	
      <th class="text-center">Positif</th>
      <th class="text-center">Negatif</th>
      
  		</tr>
	</thead>
	<tbody>
	<tr>
		<td>Hasil TBC</td>
		<td><?php echo $N10=number_format($Tbc_positif,0); ?></td>
		<td><?php echo $O10=number_format($Tbc_negatif,0); ?></td>
	</tr>
	<tr>
		<td colspan="2">Total</td>
		<td><?php echo $O11=$N10+$O10 ?></td>
		
	</tr>
	</tbody>
	</table>
</div>

</div>		

<div class="col-md-12">
<H3>Atribut</H3>
<!--Atribut Umur Positif-->
<div class="col-md-6">
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="4" style="vertical-align : middle;text-align:center;">Atribut Umur Positif</th>
		
		</tr>
  		<tr>
			
  			<th>No</th>
			<th>umur</th>
			<th>Umur - √ Umur</th>
			<th>(Umur - √ Umur) 2</th>	
  		</tr>
	
     
  	</thead>
	
	
  	<tbody>
  	<?php 
	$sm_age=0;
	$sum_age=0;
	$deviasi_p=0;
	$s_umr=0;
	$s1_umr=0;
	$i=0;
	$i2=0;
	$query = $this->db->query("SELECT id, umur FROM `pasien` where tbc='Positif' group by umur");
	
	$tes = $this->db->query("SELECT umur FROM `pasien` where tbc='Positif' group by umur");
		
		foreach ($tes->result() as $trow){
			$trow->umur;
		$sum_age+=$trow->umur;
		
		++$i;	
		}
		$sum_age=$sum_age/$i;
		
		foreach ($query->result() as $row){
	?>		
		<tr>
  			<td><?php echo ++$i2; ?>.</td>
			<td><?php echo $row->umur ?></td>
			<td><?php echo $umr=number_format($row->umur-$sum_age,4); ?></td>
			<td><?php echo $s_umr=pow($umr,2); ?></td>
			
		</tr><tr>	
  	<?php
		$sm_age+=$row->umur;
		$s1_umr+=$s_umr;
		}
	?>
	   </tr>
	<tr>
		<td>∑=</td>
		<td><?php echo $sm_age; ?></td>
		<td></td>
		<td><?php echo number_format($s1_umr,4); ?></td>
	</tr>
	<tr><td></td>
	</tr>
	<tr>
		<td colspan="3">Mean Umur Positif</td>
		<td><?php echo number_format($mean_umur_p=$sm_age/$i,4); ?></td>
	</tr>	
	<tr>
		<td colspan="3">Standar Deviasi Umur Positif</td>
		<td><?php 
		
		 echo number_format($deviasi_umur_p=sqrt($s1_umr/($i-1)),4);?></td>
	</tr>
  	</tbody>
</table>

</div>
<!--Atribut Umur Negatif-->
<div class="col-md-6" id="table">
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="4" style="vertical-align : middle;text-align:center;">Atribut Umur Negatif</th>
		
		</tr>
  		<tr>
			
  			<th>No</th>
			<th>umur</th>
			<th>Umur - √ Umur</th>
			<th>(Umur - √ Umur) 2</th>	
  		</tr>
	
     
  	</thead>
	
	
  	<tbody>
  	<?php 
	$sm_age=0;
	$sum_age=0;
	$s_umr=0;
	$s1_umr=0;
	$i=0;
	$i2=0;
	$query = $this->db->query("SELECT id, umur FROM `pasien` where tbc='Negatif' group by umur");
	
	$tes = $this->db->query("SELECT umur FROM `pasien` where tbc='Negatif' group by umur");
		
		foreach ($tes->result() as $trow){
			$trow->umur;
		$sum_age+=$trow->umur;
		
		++$i;	
		}
		$sum_age=$sum_age/$i;
		
		foreach ($query->result() as $row){
	?>		
		<tr>
  			<td><?php echo ++$i2?>.</td>
			<td><?php echo $row->umur ?></td>
			<td><?php echo $umr=number_format($row->umur-$sum_age,4); ?></td>
			<td><?php echo $s_umr=pow($umr,2); ?></td>
			
		</tr><tr>	
  	<?php
		$sm_age+=$row->umur;
		$s1_umr+=$s_umr;
		}
	?>
	   </tr>
	<tr>
		<td>∑=</td>
		<td><?php echo $sm_age; ?></td>
		<td></td>
		<td><?php echo number_format($s1_umr,4); ?></td>
	</tr>
	<tr><td></td>
	</tr>
	<tr>
		<td colspan="3">Mean Umur Negatif</td>
		<td><?php echo $mean_umur_n=number_format($sm_age/$i2,4); ?></td>
	</tr>	
	<tr>
		<td colspan="3">Standar Deviasi Umur Negatif</td>
		<td><?php 
		
		 echo number_format($deviasi_umur_n=sqrt($s1_umr/($i2-1)),4);?></td>
	</tr>
  	</tbody>
</table>

</div>

<div class="clearfix"></div>

<!--Atribut  Batuk Positif-->
<div class="col-md-6" id="table">
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="4" style="vertical-align : middle;text-align:center;">Atribut Batuk Positif</th>
		
		</tr>
  		<tr>
			
  			<th>No</th>
			<th>Batuk</th>
			<th>Batuk - √ Batuk</th>
			<th>(Batuk - √ Batuk) 2</th>	
  		</tr>
	
     
  	</thead>
	
	
  	<tbody>
  	<?php 
	$sm_batuk=0;
	$sum_batuk=0;
	$s_umr=0;
	$s1_umr=0;
	$i=0;
	$i2=0;
	$query = $this->db->query("SELECT batuk FROM `pasien` where tbc='Positif' GROUP By batuk;");
	
	$tes = $this->db->query("SELECT batuk FROM `pasien` where tbc='Positif' GROUP By batuk;");
		
		foreach ($tes->result() as $trow){
			$trow->batuk;
		$sum_batuk+=$trow->batuk;
		
		++$i;	
		}
		$sum_batuk=$sum_batuk/$i;
		
		foreach ($query->result() as $row){
	?>		
		<tr>
  			<td><?php echo ++$i2?>.</td>
			<td><?php echo $row->batuk ?></td>
			<td><?php echo $umr=number_format($row->batuk-$sum_batuk,4); ?></td>
			<td><?php echo $s_umr=pow($umr,2); ?></td>
			
		</tr><tr>	
  	<?php
		$sm_batuk+=$row->batuk;
		$s1_umr+=$s_umr;
		}
	?>
	   </tr>
	<tr>
		<td>∑=</td>
		<td><?php echo $sm_batuk; ?></td>
		<td></td>
		<td><?php echo number_format($s1_umr,4); ?></td>
	</tr>
	<tr><td></td>
	</tr>
	<tr>
		<td colspan="3">Mean Batuk Positif</td>
		<td><?php echo $mean_batuk_p=number_format($sm_batuk/$i,4); ?></td>
	</tr>	
	<tr>
		<td colspan="3">Standar Deviasi Batuk Positif</td>
		<td><?php 
		
		 echo number_format($deviasi_batuk_p=sqrt($s1_umr/($i2-1)),4);?></td>
	</tr>
  	</tbody>
</table>

</div>

<!--Atribut  Batuk Negatif-->
<div class="col-md-6">
<table class="table table-bordered">
  	<thead>
		<tr>
		<th colspan="4" style="vertical-align : middle;text-align:center;">Atribut Batuk Negatif</th>
		
		</tr>
  		<tr>
			
  			<th>No</th>
			<th>Batuk</th>
			<th>Batuk - √ Batuk</th>
			<th>(Batuk - √ Batuk) 2</th>	
  		</tr>
	
     
  	</thead>
	
	
  	<tbody>
  	<?php 
	$sm_batuk=0;
	$sum_batuk=0;
	$s_umr=0;
	$s1_umr=0;
	$i=0;
	$i2=0;
	$query = $this->db->query("SELECT batuk FROM `pasien` where tbc='Negatif' GROUP By batuk;");
	
	$tes = $this->db->query("SELECT batuk FROM `pasien` where tbc='Negatif' GROUP By batuk;");
		
		foreach ($tes->result() as $trow){
			$trow->batuk;
		$sum_batuk+=$trow->batuk;
		
		++$i;	
		}
		$sum_batuk=$sum_batuk/$i;
		
		foreach ($query->result() as $row){
	?>		
		<tr>
  			<td><?php echo ++$i2?>.</td>
			<td><?php echo $row->batuk ?></td>
			<td><?php echo $umr=number_format($row->batuk-$sum_batuk,4); ?></td>
			<td><?php echo $s_umr=pow($umr,2); ?></td>
			
		</tr><tr>	
  	<?php
		$sm_batuk+=$row->batuk;
		$s1_umr+=$s_umr;
		}
	?>
	   </tr>
	<tr>
		<td>∑=</td>
		<td><?php echo $sm_batuk; ?></td>
		<td></td>
		<td><?php echo number_format($s1_umr,4); ?></td>
	</tr>
	<tr><td></td>
	</tr>
	<tr>
		<td colspan="3">Mean Batuk Negatif</td>
		<td><?php echo $mean_batuk_n=number_format($sm_batuk/$i,4); ?></td>
	</tr>	
	<tr>
		<td colspan="3">Standar Deviasi Batuk Negatif</td>
		<td><?php 
		
		 echo number_format($deviasi_batuk_n=sqrt($s1_umr/($i2-1)),4);?></td>
	</tr>
  	</tbody>
</table>

</div>
</div>

<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
<label>Sample Untuk Diklasifikasi:</label>

<p>Umur <?php echo $_POST['umur'];?> Tahun Dengan Batuk <?php echo $_POST['batuk'];?> Hari Penurunan berat badan <?php echo $_POST['penurunan'];?> Sesak Nafas <?php echo $_POST['sesak'];?> Berkeringat malam <?php echo $_POST['berkeringat'];?> Batuk Berdarah <?php echo $_POST['batukd'];?> Demam <?php echo $_POST['demam'];?></p>
Klasifikasi Umur Dengan Hasil Positif : <?php  echo number_format($AI15=1/sqrt(2*3.14*$deviasi_umur_p)*exp(-(pow($_POST['umur']-$mean_umur_p,2)/pow($deviasi_umur_p,2))),4);?>
<br>Klasifikasi Umur Dengan Hasil Negatif : <?php  echo number_format($AI17=1/sqrt(2*3.14*$deviasi_umur_n)*exp(-(pow($_POST['umur']-$mean_umur_n,2)/pow($deviasi_umur_n,2))),4);?>
<br>Klasifikasi Batuk Dengan Hasil Positif	: <?php  echo number_format($AI20=1/sqrt(2*3.14*$deviasi_batuk_p)*exp(-(pow($_POST['batuk']-$mean_batuk_p,2)/pow($deviasi_batuk_p,2))),4);?>
<br>Klasifikasi Batuk Dengan Hasil Negatif	: <?php  echo number_format($AI22=1/sqrt(2*3.14*$deviasi_batuk_n)*exp(-(pow($_POST['batuk']-$mean_batuk_n,2)/pow($deviasi_batuk_n,2))),4);?>

<?php
$_SESSION['umur']=$_POST['umur']; 
$_SESSION['batuk']=$_POST['batuk']; 
$_SESSION['penurunan']=$_POST['penurunan']; 
$_SESSION['sesak']=$_POST['sesak'];  
$_SESSION['berkeringat']=$_POST['berkeringat']; 
$_SESSION['batukd']=$_POST['batukd'];  
$_SESSION['demam']=$_POST['demam'];  
		
if ($_POST['penurunan']=="Ya"){ $pb=$N5;}else{$pb=$N6;}
if ($_POST['sesak']=="Ya"){ $sn=$S5;}else{$sn=$S6;}
if ($_POST['berkeringat']=="Ya"){ $bm=$X5;}else{$bm=$X6;}
if ($_POST['batukd']=="Ya"){ $bd=$AC5;}else{$bd=$AC6;}
if ($_POST['demam']=="Ya"){ $dm=$AH5;}else{$dm=$AH6;}


if ($_POST['penurunan']=="Ya"){ $pb_n=$O5;}else{$pb_n=$O6;}
if ($_POST['sesak']=="Ya"){ $sn_n=$T5;}else{$sn_n=$T6;}
if ($_POST['berkeringat']=="Ya"){ $bm_n=$Y5;}else{$bm_n=$Y6;}
if ($_POST['batukd']=="Ya"){ $bd_n=$AD5;}else{$bd_n=$AD6;}
if ($_POST['demam']=="Ya"){ $dm_n=$AI5;}else{$dm_n=$AI6;}

?>




<br>
<br>Positif : <?php echo number_format($AF27=$AI15*$AI20*$pb*$sn*$bm*$bd*$dm,5); ?>
<br>Negatif	: <?php echo number_format($AF28=$AI17*$AI22*$pb_n*$sn_n*$bm_n*$bd_n*$dm_n,5); ?>				
	<hr>
	<div class="callout callout-info">
        <h4>Hasil Diagnosa: <?php IF($AF27>$AF28) {echo $hasil="Positif";} else {echo $hasil="Negatif";} ?></h4>    
      </div>
		
		<?php 
		$klarifikasi='Umur '.$_POST['umur'].' Tahun Dengan Batuk '.$_POST['batuk'].' Hari Penurunan berat badan '.$_POST['penurunan'].' Sesak Nafas '.$_POST['sesak'].' Berkeringat malam '.$_POST['berkeringat'].' Batuk Berdarah '.$_POST['batukd'].' Demam '.$_POST['demam'].'';
		redirect('admin/bayes?hasil='.$hasil.'&klarifikasi='.$klarifikasi.'');
			
		?>
				
</form>		

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>