<?php
	class Poli extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Superdmin/Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Poli';
			$data['description'] = 'Ini adalah description Poli';
			$data['keywords'] = 'Ini adalah keywords Poli';

          	$data['list'] = $this->M_superadmin_poli->get_data_list();
			
			$this->load->view('Backend/Superadmin/V_poli',$data);
		}

		function Tambah_poli()
		{
			$data['title'] = 'Ini adalah title Tambah Data Poli';
			$data['description'] = 'Ini adalah description Tambah Data Poli';
			$data['keywords'] = 'Ini adalah keywords Tambah Data Poli';
			
			$this->load->view('Backend/Superadmin/V_tambah_poli',$data);
		}

		function Tambah_data()
		{
			$nama = $this->input->post('nama');
			$data = array(
                "nama_poli" => $nama
            ); 

            $this->M_superadmin_poli->add_poli($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil dibuat</div>');
            redirect('Superadmin/Poli/Tambah_poli');
			
		}

		function Edit_poli($id_poli)
		{
			$data['title'] = 'Ini adalah title Edit Data Poli ';
			$data['description'] = 'Ini adalah description Edit Data Poli';
			$data['keywords'] = 'Ini adalah keywords Edit Data Poli';
			
			$data['data_poli'] = $this->M_superadmin_poli->get_data_poli($id_poli);

			$this->load->view('Backend/Superadmin/V_edit_poli',$data);
		}

		function Edit_data()
		{
			$id_poli = $this->input->post('id_poli');
			$nama = $this->input->post('nama');

			$data = array(
                "nama_poli" => $nama
            ); 

            $this->M_superadmin_poli->edit_poli($data,$id_poli);

            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
			redirect('Superadmin/Poli/Edit_poli/'.$id_poli);
		}

		function Delete_poli()
		{
            $id_poli = $this->input->post('id_poli');
            $nama = $this->input->post('nama_poli');
            $this->M_superadmin_poli->delete_all_data_poli_booking($nama_poli);
            $this->M_superadmin_poli->delete_all_data_poli_jadwal_dokter($nama_poli);
            $this->M_superadmin_poli->delete_all_data_poli($id_poli);
			redirect('Superadmin/Poli');
		}
	}
?>	