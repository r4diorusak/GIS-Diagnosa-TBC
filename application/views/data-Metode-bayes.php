<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<title>Naive Bayes</title>
<div class="page-header">
	<img class="logo" src="../public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Data Sample Metode Naive Bayes</label>

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
  	<?php foreach( $Pasien as $row) : ?>
  		<tr>
  			<td><?php echo ++$this->page ?>.</td>
			<td class="td-action" width="250">
				<?php echo $row->nama ?>

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
<?php if(!$Pasien) : ?>
<div class="col-md-5 col-md-offset-3">
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Maa!</strong> Data yang anda cari tidak ditemukan.
	</div>
</div>
<?php endif; ?>
<div class="text-center"> 
	<?php echo $this->pagination->create_links(); ?>
</div>
<hr>
<h1>Diagnosa<h1>
<hr>
<form class="form-horizontal" action="hitung_bayes" method="post" enctype="multipart/form-data">
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
	
    
	<div class="form-group col-md-12" style="margin-bottom: 50px;">
					<button type="submit" class="btn btn-success btn-block"><i class="fa  fa-stethoscope"></i> Mulai Perhitungan</button>
				</div>
	
	
</form>




				
<?php
$this->load->view('footerAdmin', $this->data);

