<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public $amenities;

	public $page;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url'));

		if($this->session->has_userdata('admin_login')==FALSE) 
			redirect(site_url());

		$this->amenities = array('Wifi','AC','TV kabel','Telepon','Shower Panas & Dingin','Smooking Area');

		$this->load->model('madmin');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->data = array(
			'title' => "Home Administrator"
		);	

		$this->load->view('main-admin', $this->data);
	}

	public function addfasyankes()
	{	
		$this->data['title'] = "Tambah Fasyankes";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createfasyankes();

			redirect(current_url());
		}

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = '1.4015562,99.2546512';
		$config['zoom'] = '12';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '1.3898173293770766,99.26398834484996';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('add-fasyankes', $this->data);
	}
	
	
	
	public function metode()
	{
		
		$config['base_url'] = site_url("admin/metode?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 15;
		$config['total_rows'] = $this->madmin->getAllMetode(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Metode K-Means",
			'fasyankes' => $this->madmin->getAllMetode($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-metode', $this->data);
	}
	
	public function hitung()
	{
		$this->form_validation->set_rules('tkecamatan1', 'tkecamatan1', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->simpanK();

			redirect(current_url());
		}
			
		
		$this->data = array(
			'title' => "Diagnosa",
			'fasyankes' => $this->madmin->getAllMetode()
		);

		$this->load->view('data-hitung', $this->data);
	
	}
	
	public function hitung_bayes()
	{
		

		$this->load->view('diagnosa-gejala-admin');
		
	}
	
	public function hitung_bayes_detail()
	{
		$this->data = array(
			'title' => "Diagnosa"
		);

		$this->load->view('data-hitung-bayes', $this->data);
		
	}
	
	public function addPasien()
	{	
		$this->data['title'] = "Tambah Pasien";

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createPasien();

			redirect(current_url());
		}

		

		$this->load->view('add-pasien', $this->data);
	}
	
	public function pasien()
	{
		
		$config['base_url'] = site_url("admin/pasien?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllPasien(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
			$this->data = array(
			'title' => "Data Pasien",
			'pasien' => $this->madmin->getAllPasien($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-pasien', $this->data);
	
	}
	
	public function bayes()
	{
		
		$config['base_url'] = site_url("admin/bayes?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllPasien(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Metode Naive Bayes",
			'Pasien' => $this->madmin->getAllPasien($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-Metode-bayes', $this->data);
	}
	
	public function fasyankes()
	{
		$config['base_url'] = site_url("admin/fasyankes?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllMetode(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data Fasyankes",
			'fasyankes' => $this->madmin->getAllMetode($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-fasyankes', $this->data);
	}

	public function updatefasyankes($param = 0)
	{
		$this->data['title'] = "Update Fasyankes";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateFasyankes($param);

			redirect(current_url());
		}

		$this->data['fasyankes'] = $this->madmin->getFasyankes($param);

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = $this->data['fasyankes']->latitude.','.$this->data['fasyankes']->longitude;
		$config['zoom'] = '14';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $this->data['fasyankes']->latitude.','.$this->data['fasyankes']->longitude;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('update-fasyankes', $this->data);
	}
	
	public function updateData_fasyankes($param = 0)
	{
		$this->data['title'] = "Update Data Fasyankes";

		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateDataFasyankes($param);

			redirect(current_url());
		}

		$this->data['fasyankes'] = $this->madmin->getFasyankes($param);
		$this->load->view('update-data-fasyankes', $this->data);
	}

	public function updatePasien($param = 0)
	{
		$this->data['title'] = "Update Pasien";

		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updatePasien($param);

			redirect(current_url());
		}

		$this->data['pasien'] = $this->madmin->getPasien($param);
		$this->load->view('update-pasien', $this->data);
	}
	
	public function deleteFasyankes($param = 0)
	{
		$this->madmin->deleteFasyankes($param);

		redirect('admin/fasyankes');
	}
	
	public function deletePasien($param = 0)
	{
		$this->madmin->deletePasien($param);

		redirect('admin/pasien');
	}

	public function account()
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->madmin->getAccount()
		);	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		if ($this->form_validation->run() == TRUE) 
		{
			$this->madmin->setAccount();
			
			redirect(current_url());
		}
		$this->load->view('account', $this->data);
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$user = $this->madmin->getAccount();

		if(password_verify($this->input->post('old_pass'), $user->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */