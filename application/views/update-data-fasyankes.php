<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);

?>

<div class="page-header">
  <h1>Update Data Fasyankes</h1>
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
      <label class="col-sm-2 control-label">Nama Fasyankes :</label>
      <div class="col-sm-8">
          <input type="text" name="nama" class="form-control" value="<?php echo $fasyankes->name ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	 
	  <hr class="hr-text" data-content="AND">
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Positif 2020 SO:</label>
      <div class="col-sm-8">
          <input type="number" name="P_SO2020" class="form-control" value="<?php echo $fasyankes->SO2020 ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Positif 2020 RO:</label>
      <div class="col-sm-8">
          <input type="number" name="P_RO2020" class="form-control" value="<?php echo $fasyankes->RO2020 ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	  <hr class="hr-text" data-content="AND">
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Positif 2021 SO:</label>
      <div class="col-sm-8">
          <input type="number" name="P_SO2021" class="form-control" value="<?php echo $fasyankes->SO2021 ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
      </div>
    </div>
	
	<div class="form-group">
      <label class="col-sm-2 control-label">Positif 2021 RO:</label>
      <div class="col-sm-8">
          <input type="number" name="P_RO2021" class="form-control" value="<?php echo $fasyankes->RO2021 ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
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

