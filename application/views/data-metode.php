<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>

<div class="page-header">
	<img class="logo" src="../public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Data Sample Metode K-Means</label>

	<form action="" method="get">
	<div class="col-md-4 pull-right">
       <div class="input-group" style="margin-top: -30px;">
           <input id="input-calendar" type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="Pencarian..">
           <span class="input-group-addon"><i class="fa fa-search"></i></span>
       </div>
	</div>
	</form>
</div>
<table class="table table-bordered" border="0">
  	<thead>
  		<tr>
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">No.</th>
  			<th rowspan="2" style="vertical-align : middle;text-align:center;">Nama</th>
  			<th colspan="2"class="text-center">Jumlah Positif 2020</th>
  			<th colspan="2"class="text-center">Jumlah Positif 2021</th>
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Total</th>
			<th rowspan="2" style="vertical-align : middle;text-align:center;">Kecamatan</th>
  			
  		</tr>
		<tr>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
      <th class="text-center">SO</th>
      <th class="text-center">RO</th>
	  
    </tr>
  	</thead>
  	<tbody>
  	<?php 
		$H_SO2020=0;
		$H_RO2020=0;
		$H_SO2021=0; 
		$H_RO2021=0;
		$Htotal=0;
		foreach( $fasyankes as $row) : ?>
  		<tr>
  			<td><?php echo ++$this->page ?>.</td>
			<td class="td-action" width="250">
				<?php echo $row->name ?>
				<div class="button-action">
					<a href="<?php echo base_url('admin/updateData_fasyankes/'.$row->ID); ?>"><i class="fa fa-lg fa-pencil-square-o"></i> Edit</a> |
					<a href="#" data-id="<?php echo $row->ID ?>" class="text-danger delete-fasyankes"><i class="fa fa-lg fa-trash-o"></i> Hapus</a>
				</div>	
			</td>
  			
  			<td class="text-center"><?php echo $row->SO2020 ?></td>
  			<td class="text-center"><?php echo $row->RO2020 ?></td>
			<td class="text-center"><?php echo $row->SO2021 ?></td>
			<td class="text-center"><?php echo $row->RO2021 ?></td>
			<td class="text-center"><?php echo $total=$row->SO2020+$row->RO2020+$row->SO2021+$row->RO2021 ?></td>
			<td><?php echo $row->nama_kecamatan ?></td>
  			<?php
			 
			$H_SO2020=$H_SO2020+$row->SO2020;
			$H_RO2020=$H_RO2020+$row->RO2020;
			$H_SO2021=$H_SO2021+$row->SO2021;
			$H_RO2021=$H_RO2021+$row->RO2021;
			$Htotal=$Htotal+$total;
			?>
  		</tr>
  	<?php endforeach; ?>
	<td class="text-center">Total</td>
		<td class="text-center"><?php echo $this->page ?></td>
		<td class="text-center"><?php echo $H_SO2020; ?></td>
		<td class="text-center"><?php echo $H_RO2020; ?></td>
		<td class="text-center"><?php echo $H_SO2021; ?></td>
		<td class="text-center"><?php echo $H_RO2021; ?></td>
		<td class="text-center"><?php echo $Htotal; ?></td>
		
  	</tbody>
</table>
<?php if(!$fasyankes) : ?>
<div class="col-md-5 col-md-offset-3">
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Maaf!</strong> Data yang anda cari tidak ditemukan.
	</div>
</div>
<?php endif; ?>
<div class="text-center"> 
	<?php echo $this->pagination->create_links(); ?>
</div>

<div class="form-group" style="margin-bottom: 50px;">
					<a href="hitung" class="btn btn-success btn-block"><i class="fa  fa-stethoscope"></i> Mulai Perhitungan</a>
				</div>
				
<?php
$this->load->view('footerAdmin', $this->data);

