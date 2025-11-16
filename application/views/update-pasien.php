<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);

?>
<div class="page-header">
  <h1>Update Pasien</h1>
</div>
<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
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
      <label class="col-sm-2 control-label">Nama :</label>
      <div class="col-sm-8">
          <input type="text" name="nama" class="form-control" value="<?php echo $pasien->nama ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Umur :</label>
      <div class="col-sm-8">
          <input type="number" name="umur" class="form-control" value="<?php echo $pasien->umur ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	<div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="kelamin">
                    <option value="<?php echo $pasien->jenis_kelamin ?>">- <?php echo $pasien->jenis_kelamin ?> -</option>
                    <option value="Perempuan">Perempuan</option>
                    <option Value="Laki - Laki">Laki - Laki</option>
                  </select>
				  </div>
            </div>
	
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Batuk (Hari) :</label>
      <div class="col-sm-8">
          <input type="number" name="batuk" class="form-control" value="<?php echo $pasien->batuk ?>" placeholder="" >
            
      </div>
    </div>
	
			<div class="form-group">
                   <label class="col-sm-2 control-label">Penurunan Berat Badan :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="penurunan">
                    <option value="<?php echo $pasien->penurunan_bb ?>">- <?php echo $pasien->penurunan_bb ?> -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Sesak Nafas :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="sesak">
                    <option value="<?php echo $pasien->sesak_nafas ?>">- <?php echo $pasien->sesak_nafas ?> -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
			
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Berkeringat Malam :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="berkeringat">
                    <option value="<?php echo $pasien->berkeringat_malam ?>">- <?php echo $pasien->berkeringat_malam ?> -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Batuk Darah :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="batukd">
                    <option value="<?php echo $pasien->batuk_darah ?>">- <?php echo $pasien->batuk_darah ?> -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
	<div class="form-group">
                   <label class="col-sm-2 control-label">Demam :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="demam">
                    <option value="<?php echo $pasien->demam ?>">- <?php echo $pasien->demam ?> -</option>
                    <option value="Ya">Ya</option>
                    <option Value="Tidak">Tidak</option>
                  </select>
				  </div>
            </div>
	
    <div class="form-group">
                   <label class="col-sm-2 control-label">TBC :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="tbc">
                    <option value="<?php echo $pasien->tbc ?>">- <?php echo $pasien->tbc ?> -</option>
                    <option value="Positif">Positif</option>
                    <option Value="Negatif">Negatif</option>
                  </select>
				  </div>
            </div>
    
    <div class="form-group" style="margin-bottom: 50px;">
        <div class="col-sm-6 col-md-offset-3">
            <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
    </div>
</form>
<?php
$this->load->view('footerAdmin', $this->data);

