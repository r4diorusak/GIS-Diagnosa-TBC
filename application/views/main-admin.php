<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<div class="page-header">
  <img class="logo" src="public/icon/puskesmas_hijau.png">
	<label class="judul" align="left">Home</label>
</div>
					<p>Sistem Informasi Geografis Penyebaran Penyakit TBC Dengan Metode K-Means Dan Sistem Diagnosa Penyakit TBC Dengan Metode Naive Bayes Di Dinas Kesehatan Kota Padangsidimpuan dibangun dengan PHP (Framework Codeigniter 3), Google Maps V3 API dan Twitter bootstrap.</p>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama Pengembang</td>
								<td width="50" class="text-center">:</td>
								<td>Ari Naditama</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td width="50" class="text-center">:</td>
								<td>180180002</td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td width="50" class="text-center">:</td>
								<td>Sistem Informasi</td>
							</tr>
							<tr>
								<td>Universitas</td>
								<td width="50" class="text-center">:</td>
								<td>Universitas Malikussaleh Aceh</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td width="50" class="text-center">:</td>
								<td>Jl. Kenanga no.11A Kota Padangsidimpuan</td>
							</tr>
							<tr>
								<td>Nomor Telepon</td>
								<td width="50" class="text-center">:</td>
								<td>0852-6079-1707</td>
							</tr>
						</tbody>
						</table>
<?php
$this->load->view('footerAdmin', $this->data);

/* End of file main-admin.php */
/* Location: ./application/views/main-admin.php */