<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('upload','session'));
	}
	
	public function createfasyankes()
	{
		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'description' => $this->input->post('description'),
			'kecamatan' => $this->input->post('kecamatan')
		);

		$this->db->insert('fasyankes', $object);	
		$this->session->set_flashdata('message', "Data fasyankes berhasil ditambahkan");
	}
	
	public function createPasien()
	{
		
		$object = array(
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('umur'),
			'jenis_kelamin' => $this->input->post('kelamin'),
			'batuk' => $this->input->post('batuk'),
			'penurunan_bb' => $this->input->post('penurunan'),
			'sesak_nafas' => $this->input->post('sesak'),
			'berkeringat_malam' => $this->input->post('berkeringat'),
			'batuk_darah' => $this->input->post('batukd'),
			'demam' => $this->input->post('demam'),
			'tbc' => $this->input->post('tbc')
		);

		$this->db->insert('pasien', $object);	
		$this->session->set_flashdata('message', "Data fasyankes berhasil ditambahkan");
	}
	
	public function simpanK()
	{
		for ($i = 1; $i <= 15; $i++) {
		$id=$i;
		$object = array(
			'tingkat' => $this->input->post('tingkat'.$i.'')
		);
		$this->db->where('ID', $id );
		$this->db->update('fasyankes', $object);	
		}
		
		for ($i = 1; $i <= 6; $i++) {
		$id=$i;
		$object = array(
			'tingkat' => $this->input->post('tkecamatan'.$i.'')
		);
		$this->db->where('id_kecamatan', $id );
		$this->db->update('kecamatan', $object);	
		}
		
		
		$this->session->set_flashdata('message', "Data berhasil disimpan");
	}

	public function getFasyankes($param = 0)
	{
		return $this->db->get_where('fasyankes', array('ID' => $param) )->row();
	}
	
	public function getPasien($param = 0)
	{
		return $this->db->get_where('pasien', array('id' => $param) )->row();
	}

	public function getKecamatan($fasyankes = 0, $kecamatan = 0)
	{
		return $this->db->get_where('fasyankes', array('ID' => $fasyankes, 'kecamatan' => $kecamatan) )->row();
	}

	public function updateFasyankes($param = 0)
	{
		$fasyankes = $this->getFasyankes($param);

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = $fasyankes->photo; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'description' => $this->input->post('description'),
			'kecamatan' => $this->input->post('kecamatan')
			
		);

		$this->db->update('fasyankes', $object, array('ID' => $param));
		
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}
	
	public function updateDataFasyankes($param = 0)
	{
		$fasyankes = $this->getFasyankes($param);
		$object = array(
			'name' => $this->input->post('nama'),
			'SO2020' => $this->input->post('P_SO2020'),
			'RO2020' => $this->input->post('P_RO2020'),
			'SO2021' => $this->input->post('P_SO2021'),
			'RO2021' => $this->input->post('P_RO2021')
			
		);

		$this->db->update('fasyankes', $object, array('ID' => $param));
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}
	
	public function updatePasien($param = 0)
	{
		$fasyankes = $this->getPasien($param);
		$object = array(
			'nama' => $this->input->post('nama'),
			'umur' => $this->input->post('umur'),
			'jenis_kelamin' => $this->input->post('kelamin'),
			'batuk' => $this->input->post('batuk'),
			'penurunan_bb' => $this->input->post('penurunan'),
			'sesak_nafas' => $this->input->post('sesak'),
			'berkeringat_malam' => $this->input->post('berkeringat'),
			'batuk_darah' => $this->input->post('batukd'),
			'demam' => $this->input->post('demam'),
			'tbc' => $this->input->post('tbc')
		);

		$this->db->update('pasien', $object, array('id' => $param));
		
		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function getAllFasyankes($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			return $this->db->get('fasyankes')->num_rows();
		} else {
			return $this->db->get('fasyankes', $limit, $offset)->result();
		}
	}
	
	public function getAllMetode($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'asc');

		if($type == 'num')
		{
			return $this->db->get('fasyankes')->num_rows();
			   	
		} else {
			
			$this->db->select('*');
			$this->db->from('fasyankes');
			$this->db->join('kecamatan', 'kecamatan.id_kecamatan = fasyankes.kecamatan');
			return 
			$this->db->get()->result();
				
		}
	}
	
	public function getAllBayes($limit = 50, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('nama', $this->input->get('q'));

		$this->db->order_by('id', 'asc');

		if($type == 'num')
		{
			return $this->db->get('pasien')->num_rows();
			   	
		} else {
			
			return $this->db->get('pasien', $limit, $offset)->result();
				
		}
	}
	
	
	public function getAllPasien($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('nama', $this->input->get('q'));

		$this->db->order_by('id', 'asc');

		if($type == 'num')
		{
			return $this->db->get('pasien')->num_rows();
			   	
		} else {
			
			return $this->db->get('pasien', $limit, $offset)->result();
				
		}
	}

	public function deleteFasyankes($param = 0)
	{
		$fasyankes = $this->getAllFasyankes($param);

		if( $fasyankes->photo != '')
			@unlink(".pulbic/image/{$fasyankes->photo}");

		$this->db->delete('fasyankes', array('ID' => $param));
		$this->session->set_flashdata('message', "Data Fasyankes berhasil dihapus");
	}
	
	public function deletePasien($param = 0)
	{
		$fasyankes = $this->getAllPasien($param);

		$this->db->delete('pasien', array('id' => $param));
		$this->session->set_flashdata('message', "Data Pasien berhasil dihapus");
	}

	public function setAccount()
	{
		$user = $this->getAccount();

		$object = array(
			'fullname' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email')
		);

		if( $this->input->post('new_pass') != '')
			$object['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);
		
		$this->db->update('users', $object, array('ID' => $user->ID));

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan.");
	}

	public function getAccount()
	{
		return $this->db->get_where('users', array('ID' => $this->session->userdata('user')->ID) )->row();
	}
}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */