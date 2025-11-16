<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session'));
	}

	public function index()
	{
		$this->data['title'] = "DIAGNOSA PENYEBARAN TBC";
		$config['center'] = '1.4015562,99.2546512';
		$config['zoom'] = 'auto';
		$config['styles'] = array(
		  	array(
		  		"name"=>"No Businesses", 
		  		"definition"=> array(
		   			array(
		   				"featureType"=>"poi", 
		   				"elementType" =>"labels", 
		   				"stylers"=> array(
		   					array(
		   						"visibility"=>"off"
		   					)
		   				)
		   			)
		  		)
		  	)
		);												

		$this->googlemaps->initialize($config);
		foreach($this->searchQuery() as $key => $value) :
		
		if( $value->tingkat=='1' )
			$warna='<small class="label label-success"> Rendah</small>';				
		if( $value->tingkat=='2' )
			$warna='<small class="label label-warning"> Sedang</small>';								
		if( $value->tingkat=='3' )				
			$warna='<small class="label label-danger"> Tinggi</small>';	
		
		$marker = array();
		$marker['position'] = "{$value->latitude}, {$value->longitude}";
		
		$marker['animation'] = 'DROP';
		$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
		$marker['infowindow_content'] .= '<div class="media-left">';
		$marker['infowindow_content'] .= '<img src="'.base_url("public/image/{$value->photo}").'" class="media-object" style="width:150px">';
		$marker['infowindow_content'] .= '</div>';
		$marker['infowindow_content'] .= '<div class="media-body">';
		$marker['infowindow_content'] .= '<h4 class="media-heading">'.$value->name.'</h4>';
		$marker['infowindow_content'] .= '<p>Tingkat Penyebaran : <strong>'. $warna.'</strong></p>';
		$marker['infowindow_content'] .= '<h5 class="media-heading">Jumlah Penderita TBC:</h5>';
		$marker['infowindow_content'] .= '<p>Tahun 2020 = '.($value->SO2020+$value->RO2020).'<br>';
		$marker['infowindow_content'] .= 'Tahun 2021 = '.($value->SO2021+$value->RO2021).'</p>';
		$marker['infowindow_content'] .= '<p><b><b>Total ='.($value->SO2020+$value->RO2020+$value->SO2021+$value->RO2021).' Pasien</b></p>';
		$marker['infowindow_content'] .= '<h5 class="media-heading">Alamat:</h5>';
		$marker['infowindow_content'] .= '<p>'.$value->address.'</p>';
		$marker['infowindow_content'] .= '</div>';
		$marker['infowindow_content'] .= '</div>';
		
		if( $value->tingkat=='1' )
			$pilih_icon="public/icon/puskesmas_hijau.png";
		if( $value->tingkat=='2' )
			$pilih_icon="public/icon/puskesmas_kuning.png";
		if( $value->tingkat=='3' )
			$pilih_icon="public/icon/puskesmas_merah.png";
		
		$marker['icon'] = base_url($pilih_icon);
		$this->googlemaps->add_marker($marker);
		endforeach;

		$this->googlemaps->initialize($config);

		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('main-index', $this->data);
	}

	public function searchQuery()
	{
		$this->db->select('fasyankes.*');

		$this->db->join('kecamatan', 'fasyankes.kecamatan = kecamatan.id_kecamatan', 'left');

		$this->db->join('tingkat', 'fasyankes.tingkat = tingkat.id_tingkat', 'left');

		switch ($this->input->get('tingkat')) 
		{
			case 'Rendah':
				$this->db->where('fasyankes.tingkat =', 1);
				break;
			case 'Rendah-Sedang':
				$this->db->where('fasyankes.tingkat >=', 1);
				$this->db->where('fasyankes.tingkat <=', 2);
				break;
			case 'Sedang-Tinggi':
				$this->db->where('fasyankes.tingkat >=', 2);
				$this->db->where('fasyankes.tingkat <=', 3);
				break;
			case 'Tinggi':
				$this->db->where('fasyankes.tingkat >=', 3);
				break;
		}

		if( is_array(@$this->input->get('kecamatan')) )
			$this->db->where_in('id_kecamatan', $this->input->get('kecamatan'));
		$this->db->group_by('fasyankes.ID');

		if( is_array(@$this->input->get('fasyankes')) )
		$this->db->where_in('ID', $this->input->get('fasyankes'));
		
		
		if($this->input->get('q') != '')
			$this->db->like('fasyankes.name', $this->input->get('q'));

		$this->db->where('fasyankes.latitude !=', NULL)
				 ->where('fasyankes.longitude !=', NULL);

		return $this->db->get("fasyankes")->result();
	}
	
	
}



