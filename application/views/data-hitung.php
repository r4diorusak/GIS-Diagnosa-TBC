<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin');
?>

<div class="page-header">
	<img class="logo" src="../public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Diagnosa Metode K-Means</label>

	<form action="" method="get">
	<div class="col-md-4 pull-right">
       <div class="input-group" style="margin-top: -30px;">
           <input id="input-calendar" type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="Pencarian..">
           <span class="input-group-addon"><i class="fa fa-search"></i></span>
       </div>
	</div>
	</form>
</div>

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
	
<table class="table table-bordered">
  	<thead>
  		<tr>
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">No.</th>
  			<th colspan="4"class="text-center">Center 1</th>
  			<th colspan="4"class="text-center">Center 2</th>
			<th colspan="4"class="text-center">Center 3</th>
			
			<th rowspan="2" style="vertical-align : middle;text-align:center;">DC 1</th>
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">DC 2</th>
			<th rowspan="2" style="vertical-align : middle;text-align:center;">DC 3</th>
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Class</th>
			<th colspan="4"class="text-center">Center 1</th>
  			<th colspan="4"class="text-center">Center 2</th>
			<th colspan="4"class="text-center">Center 3</th>
			
  			
  		</tr>
		<tr>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
	  
	  <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
	  
	  <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
	  
	  
	  
	  <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
	
	  <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>

      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>

	  
	  
    </tr>
  	</thead>
  	<tbody>
  	<?php 
		$H1_SO2020=0;
		$H1_RO2020=0;
		$H1_SO2021=0; 
		$H1_RO2021=0;
		
		$H2_SO2020=0;
		$H2_RO2020=0;
		$H2_SO2021=0; 
		$H2_RO2021=0;
		
		$H3_SO2020=0;
		$H3_RO2020=0;
		$H3_SO2021=0; 
		$H3_RO2021=0;
		
		$ct1=0;
		$ct2=0;
		$ct3=0;
		$ct4=0;
		$ct5=0;
		$ct6=0;
		$ct7=0;
		$ct8=0;
		$ct9=0;
		$ct10=0;
		$ct11=0;
		$ct12=0;
		$C1SO2020=0;
		$C1RO2020=0;
		$C1SO2021=0;
		$C1RO2021=0;
	
		foreach( $fasyankes as $row) : ?>
  		<tr>
  			<td><?php echo ++$this->page ?>.</td>
			
  			<td class="text-center"><?php echo number_format($K=1,2); ?></td>
			<td class="text-center"><?php echo number_format($L=0,2); ?></td>
			<td class="text-center"><?php echo number_format($M=1,2); ?></td>
			<td class="text-center"><?php echo number_format($N=0,2); ?></td>
			
			<td class="text-center"><?php echo number_format($O=29,2); ?></td>
			<td class="text-center"><?php echo number_format($P=0,2); ?></td>
			<td class="text-center"><?php echo number_format($Q=8,2); ?></td>
			<td class="text-center"><?php echo number_format($R=0,2); ?></td>
			
			<td class="text-center"><?php echo number_format($S=96,2); ?></td>
			<td class="text-center"><?php echo number_format($T=3,2); ?></td>
			<td class="text-center"><?php echo number_format($U=86,2); ?></td>
			<td class="text-center"><?php echo number_format($V=4,2); ?></td>
			<!--DC-->
  			<td class="text-center"><?php echo $dc1=number_format(sqrt(pow(($K-$row->SO2020),2)+pow(($L-$row->RO2020),2)+pow(($M-$row->SO2021),2)+pow(($N-$row->RO2021),2)),2); ?></td>
  			<td class="text-center"><?php echo $dc2=number_format(sqrt(pow(($O-$row->SO2020),2)+pow(($P-$row->RO2020),2)+pow(($Q-$row->SO2021),2)+pow(($R-$row->RO2021),2)),2); ?></td>
			<td class="text-center"><?php echo $dc3=number_format(sqrt(pow(($S-$row->SO2020),2)+pow(($T-$row->RO2020),2)+pow(($U-$row->SO2021),2)+pow(($V-$row->RO2021),2)),2); ?></td>
			<!--Class-->
			<?php if($dc1==min($dc1,$dc2,$dc3)){$cls=1; echo '<td class="text-center" style="background-color:green; color:white;">1'; } elseif ($dc2==min($dc1,$dc2,$dc3)){$cls=2; echo '<td class="text-center" style="background-color:yellow; color:black;">2'; } else {$cls=3; echo '<td class="text-center" style="background-color:red; color:white;">3';}?></td>
			<!--Center-->
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==1){++$ct1;echo $C1SO2020=$row->SO2020;}else{$C1SO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==1){++$ct2;echo $C1RO2020=$row->RO2020;}else{$C1RO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==1){++$ct3;echo $C1SO2021=$row->SO2021;}else{$C1SO2021=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==1){++$ct4;echo $C1RO2021=$row->RO2021;}else{$C1RO2021=null;} ?></td>
			
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==2){++$ct5; echo $C2SO2020=$row->SO2020;}else{$C2SO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==2){++$ct6; echo $C2RO2020=$row->RO2020;}else{$C2RO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==2){++$ct7; echo $C2SO2021=$row->SO2021;}else{$C2SO2021=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==2){++$ct8; echo $C2RO2021=$row->RO2021;}else{$C2RO2021=null;} ?></td>
			
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==3){++$ct9; echo $C3SO2020=$row->SO2020;}else{$C3SO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==3){++$ct10; echo $C3RO2020=$row->RO2020;}else{$C3RO2020=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==3){++$ct11; echo $C3SO2021=$row->SO2021;}else{$C3SO2021=null;} ?></td>
			<td style="vertical-align : middle;text-align:center;"><?php if($cls==3){++$ct12; echo $C3RO2021=$row->RO2021;}else{$C3RO2021=null;} ?></td>
			
			<?php		 
			$H1_SO2020+=$C1SO2020;
			$H1_RO2020+=$C1RO2020;
			$H1_SO2021+=$C1SO2021;
			$H1_RO2021+=$C1RO2021;
			
			$H2_SO2020+=$C2SO2020;
			$H2_RO2020+=$C2RO2020;
			$H2_SO2021+=$C2SO2021;
			$H2_RO2021+=$C2RO2021;
			
			$H3_SO2020+=$C3SO2020;
			$H3_RO2020+=$C3RO2020;
			$H3_SO2021+=$C3SO2021;
			$H3_RO2021+=$C3RO2021;
			
			?>
			 
  		</tr>
  	<?php endforeach; ?>
	
		<td colspan="17" align="right">Average :</td>
		
		<td class="text-center"><?php echo number_format($_SESSION['avg1']=$H1_SO2020/$ct1,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg2']=$H1_RO2020/$ct2,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg3']=$H1_SO2021/$ct3,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg4']=$H1_RO2021/$ct4,2); ?></td>
		
		<td class="text-center"><?php echo number_format($_SESSION['avg5']=$H2_SO2020/$ct5,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg6']=$H2_RO2020/$ct6,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg7']=$H2_SO2021/$ct7,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg8']=$H2_RO2021/$ct8,2); ?></td>
		
		<td class="text-center"><?php echo number_format($_SESSION['avg9']=$H3_SO2020/$ct9,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg10']=$H3_RO2020/$ct10,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg11']=$H3_SO2021/$ct11,2); ?></td>
		<td class="text-center"><?php echo number_format($_SESSION['avg12']=$H3_RO2021/$ct12,2); ?></td>
  	</tbody>
</table>

<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
<?php 
$this->load->view('data-hitung_n2'); 
$this->load->view('data-hitung_n3'); 
$this->load->view('data-hitung_n4'); 

?>

<?php echo "Hasil :"; 
$i=0;
$query = $this->db->query("SELECT kecamatan.id_kecamatan, kecamatan.nama_kecamatan, (SUM(fasyankes.tingkat)/count(fasyankes.tingkat)) as Stingkat, count(fasyankes.tingkat) as Sjumlah FROM fasyankes LEFT JOIN kecamatan ON id_kecamatan = fasyankes.kecamatan GROUP BY kecamatan.id_kecamatan;");
				
?>			
				<div class="form-group" style="margin-left: 5px;">
				     
					<?php foreach ($query->result() as $row)
					 { ?>
		            <div class="checkbox checkbox-info my-legend"> 
					<div class='legend-scale'>
		                <input type="checkbox" value="<?php echo $row->id_kecamatan; ?>" name="kecamatan" checked onclick="return false;"/>
		                <?php
						++$i;
						$warna="";
						if( $row->Stingkat>='1' and  $row->Stingkat<='2')
							$warna="<span style='background:red;'></span>Penyebaran Tinggi Pada Kecamatan <input type='text' class='hidden' name='tkecamatan".$i."' value='3'><input type='text' class='hidden' value=".$row->Stingkat."> <input type='text' class='hidden' value=".$row->Sjumlah.">";											
						if( $row->Stingkat=='1' )
							$warna="<span style='background:green;'></span>Penyebaran Rendah Pada Kecamatan <input type='text' class='hidden' name='tkecamatan".$i."' value='1'> <input type='text' class='hidden' value=".$row->Stingkat."> <input type='text' class='hidden' value=".$row->Sjumlah.">";
						if( $row->Stingkat=='2' )
							$warna="<span style='background:yellow;'></span>Penyebaran Sedang Pada Kecamatan <input type='text' class='hidden' name='tkecamatan".$i."' value='2'> <input type='text' class='hidden' value=".$row->Stingkat."><input type='text' class='hidden' value=".$row->Sjumlah.">";
						if( $row->Stingkat=='3' )
							$warna="<span style='background:red;'></span>Penyebaran Tinggi Pada Kecamatan <input type='text' class='hidden' name='tkecamatan".$i."' value='3'> <input type='text' class='hidden' value=".$row->Stingkat."> <input type='text' class='hidden' value=".$row->Sjumlah.">";											
						
						?>
						
						<label><?php echo $warna.$row->nama_kecamatan;?></label> 
						  </div>
		            </div>
				
		        <?php } ?>
					
				</div>
				
<div class="form-group" style="margin-bottom: 50px; margin-left: 5px;">
					<button class="btn btn-success btn-block"><i class="fa  fa-stethoscope"></i> Simpan Hasil</button>
				</div>
				
		</form>		
<?php
$this->load->view('footerAdmin', $this->data);

