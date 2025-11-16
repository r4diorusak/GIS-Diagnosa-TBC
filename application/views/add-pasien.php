<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<div class="page-header">
  <img class="logo" src="../public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Tambah Pasien</label>
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
          <input type="text" name="nama" class="form-control" required>
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Umur :</label>
      <div class="col-sm-8">
          <input type="number" name="umur" class="form-control" required>
            
      </div>
    </div>
	
		<div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="kelamin" required>
                    <option value="">- Pilih -</option>
                    <option value="Perempuan">Perempuan</option>
                    <option Value="Laki - Laki">Laki - Laki</option>
                  </select>
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
	
    <div class="form-group">
                   <label class="col-sm-2 control-label">TBC :</label>
				    <div class="col-sm-8">
                  <select class="form-control" name="tbc" required>
                    <option value="">- Pilih -</option>
                    <option value="Positif">Positif</option>
                    <option Value="Negatif">Negatif</option>
                  </select>
				  </div>
            </div>
	
    <div class="form-group" style="margin-bottom: 50px;">
        <div class="col-sm-6 col-md-offset-3">
            <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Tambahkan</button>
        </div>
    </div>
</form>
<?php
$this->load->view('footerAdmin', $this->data);


