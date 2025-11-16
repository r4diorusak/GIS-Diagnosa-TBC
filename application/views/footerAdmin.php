
			</div>
	    </div>
	</div>
	<footer class="page-break-top">
		<div class="footer-divider"></div>
		
			<div class="row">
				
				<div class="hr5"></div>
				<div class="col-md-12">
					<p class="text-center"><small>Sistem Informasi Geografis Penyebaran Penyakit TBC Dengan Metode K-Means Dan Sistem Diagnosa Penyakit TBC Dengan Metode Naive Bayes Di Dinas Kesehatan Kota Padangsidimpuan </small></p>
				</div>
			</div>
		
	</footer>

	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<p><?php echo $this->session->flashdata('message') ?></p>
				</div>
			</div>
		</div>
	</div>


	<div class="modal" id="modal-delete">
		<div class="modal-dialog modal-sm modal-danger">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-info-circle"></i> Hapus!</h4>
					<span>Hapus data ini dari database?</span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
					<a href="#" id="btn-yes" class="btn btn-danger">Hapus</a>
				</div>
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
				<form action="hitung_bayes_detail" method="post" enctype="multipart/form-data">
					

          <input type="number" name="umur1" class="form-control hidden" Value="<?php if(isset($_SESSION['umur'])){echo $_SESSION['umur'];}?>">
          <input type="number" name="batuk1" class="form-control hidden" Value="<?php if(isset($_SESSION['batuk'])){echo $_SESSION['batuk'];} ?>">
          <input type="text" name="penurunan1" class="form-control hidden" Value="<?php if(isset($_SESSION['penurunan'])){echo $_SESSION['penurunan'];}?>">  
		  <input type="text" name="sesak1" class="form-control hidden" Value="<?php if(isset($_SESSION['sesak'])){echo $_SESSION['sesak'];}?>">  
		  <input type="text" name="berkeringat1" class="form-control hidden" Value="<?php if(isset($_SESSION['berkeringat'])){echo $_SESSION['berkeringat'];}?>">  
		  <input type="text" name="batukd1" class="form-control hidden" Value="<?php if(isset($_SESSION['batukd'])){echo $_SESSION['batukd'];}?>">	
		  <input type="text" name="demam1" class="form-control hidden" Value="<?php if(isset($_SESSION['demam'])){echo $_SESSION['demam'];}?>">	
					<button type="submit" class="btn btn-primary">Detail </button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<?php
	if (isset($_GET['hasil'])=='Positif') { ?>
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
		function setMapToForm(latitude, longitude) 
		{
			$('input[name="latitude"]').val(latitude);
			$('input[name="longitude"]').val(longitude);
		}
		$(document).ready(function() {
			var base_url = '<?php echo base_url() ?>';
			$("#sidebar-sticker").sticky({topSpacing:70});
			<?php if($this->session->flashdata('message')) : ?>
			$('div#modal-alert').modal('show');
			<?php endif; ?>

			$('a.delete-fasyankes').on('click', function() 
			{
				var ID = $(this).data('id');

				$('#modal-delete').modal('show');
				$('a#btn-yes').attr('href', base_url + 'admin/deleteFasyankes/' + ID);
			});
			
			$('a.delete-pasien').on('click', function() 
			{
				var ID = $(this).data('id');

				$('#modal-delete').modal('show');
				$('a#btn-yes').attr('href', base_url + 'admin/deletePasien/' + ID);
			});
			
			
		});
	</script>
</body>
</html>