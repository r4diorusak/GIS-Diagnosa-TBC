<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<div class="page-header">
	<img class="logo" src="../public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Data Pasien</label>
	<form action="" method="get">
	<div class="col-md-4 pull-right">
       <div class="input-group" style="margin-top: -30px;">
           <input id="input-calendar" type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="Pencarian..">
           <span class="input-group-addon"><i class="fa fa-search"></i></span>
       </div>
	</div>
	</form>
</div>
<table class="table table-striped">
  	<thead>
  		<tr>
  			<th>No.</th>
  			<th class="text-center">Nama</th>
  			<th class="text-center">Umur</th>
			<th class="text-center">Jenis Kelamin</th>	
			<th class="text-center">Batuk</th>	
			<th class="text-center">Penurunan Berat Badan</th>
			<th class="text-center">Sesak Nafas</th>
			<th class="text-center">Berkeringat Malam</th>
			<th class="text-center">Batuk Darah</th>	
			<th class="text-center">Demam</th>	
			<th class="text-center">TBC</th>
  			
  			
  		</tr>
  	</thead>
  	<tbody>
  	<?php foreach( $pasien as $row) : ?>
  		<tr>
  			<td><?php echo ++$this->page ?>.</td>
			<td class="td-action" width="250">
				<?php echo $row->nama ?>
				<div class="button-action">
					<a href="<?php echo base_url('admin/updatepasien/'.$row->id); ?>"><i class="fa fa-lg fa-pencil-square-o"></i> Edit</a> |
					<a href="#" data-id="<?php echo $row->id ?>" class="text-danger delete-pasien"><i class="fa fa-lg fa-trash-o"></i> Hapus</a>
				</div>	
			</td>
  			
  			<td class="text-center"><?php echo $row->umur ?></td>
  			<td class="text-center"><?php echo $row->jenis_kelamin ?></td>
			<td class="text-center"><?php echo $row->batuk ?></td>
			<td class="text-center"><?php echo $row->penurunan_bb ?></td>
			<td class="text-center"><?php echo $row->sesak_nafas ?></td>
			<td class="text-center"><?php echo $row->berkeringat_malam ?></td>
			<td class="text-center"><?php echo $row->batuk_darah ?></td>
			<td class="text-center"><?php echo $row->demam ?></td>
			<td class="text-center"><?php echo $row->tbc ?></td>
  			
  			
  		</tr>
  	<?php endforeach; ?>
  	</tbody>
</table>
<?php if(!$pasien) : ?>
<div class="col-md-5 col-md-offset-3">
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Maa!</strong> Data yang anda cari tidak ditemukan.
	</div>
</div>
<?php endif; ?>
<div class="text-center" style="margin-bottom: 50px;">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php
$this->load->view('footerAdmin', $this->data);


/* End of file */
/* Location: ./application/views/data-fasyankes.php */