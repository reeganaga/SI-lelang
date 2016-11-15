<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog_barang extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	var $id_user;
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
		$this->load->library('template_back');
        $this->has_permission('admin');
		$this->id_user = $this->session->userdata('id_user');
		date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{	
		$arr_barang = $this->Barang_model->getBarang();
		$this->template_back->display(
			array(
				'content'=>'back/barang/content',
				'stylesheet'=>'back/barang/custom_css',
				'javascript'=>'back/barang/custom_js'
			),
			array(
				'arr_barang'=>$arr_barang
			)
		);	
	}

	public function tambah()
	{	
		$arr_kategori = $this->Kategori_model->getKategoriDropdown();
		foreach ($arr_kategori as $dropdown) {
			$options[$dropdown['id_kategori']] = $dropdown['nama_kategori'];
		}
		$this->template_back->display(
			array(
				'content'=>'back/barang/tambah',
				'stylesheet'=>'back/barang/custom_css',
				'javascript'=>'back/barang/custom_js'
			),
			array(
				'arr_kategori'=>$options
			)
		);	
	}

	public function tambah_proses(){
		// $id_user=$this->input->post('id_user');
		
		// konfigurasi validasi gambar
		if (empty($_FILES['gambar']['name']))
		{
		    $this->form_validation->set_rules('gambar', 'Gambar', 'required', array('required' => '%s Perlu diisi'));
		}
		$config = array(
		        array(
		                'field' => 'nama_barang',
		                'label' => 'Nama barang',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'jumlah_barang',
		                'label' => 'jumlah_barang',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'berat',
		                'label' => 'berat',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'tinggi',
		                'label' => 'tinggi',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'lebar',
		                'label' => 'lebar',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'panjang',
		                'label' => 'panjang',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'deskripsi',
		                'label' => 'deskripsi',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' =>
		                         ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'harga',
		                'label' => 'harga',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),

		);
		$this->form_validation->set_rules($config);		
		if ($this->form_validation->run()==false) {
			//jika tidak valid
			$this->tambah();
		}else{
			//jika valid maka proses update
			$this->upload();

			$data=array(
				'nama_barang'=>$this->input->post('nama_barang'),
				'jumlah_barang'=>$this->input->post('jumlah_barang'),
				'berat'=>$this->input->post('berat'),
				'tinggi'=>$this->input->post('tinggi'),
				'lebar'=>$this->input->post('lebar'),
				'panjang'=>$this->input->post('panjang'),
				'deskripsi'=>$this->input->post('deskripsi'),
				'id_kategori'=>$this->input->post('id_kategori'),
				'gambar'=>$this->upload->data('file_name'),
				'slug'=>$this->input->post('slug'),
				// 'tgl_expired'=>date("Y-m-d H:i:s"),
				'status'=>'open',
				'harga'=>$this->input->post('harga'),
			);
			// $this->Galeri_model->insertGaleri($data);

			$this->Barang_model->insertBarang($data);
			$this->session->set_flashdata('msg_success','Data Barang berhasil ditambah');
			redirect('admin/katalog_barang/');
		}
	}
	public function detail($id_barang){
		$barang = $this->Barang_model->getBarangById($id_barang);
		$arr_kategori = $this->Kategori_model->getKategoriDropdown();
		foreach ($arr_kategori as $dropdown) {
			$options[$dropdown['id_kategori']] = $dropdown['nama_kategori'];
		}
		$this->template_back->display(
			array(
				'content'=>'back/barang/content_detail'
			),
			array(
				'barang'=>$barang,
				'arr_kategori'=>$options
			)
		);

	}

	public function status($id,$status){
		$data = array(
			'status'=>$status,
			);
		if ($this->Barang_model->updateBarang($id,$data)) {
			$this->session->set_flashdata('msg_error','Data Barang Gagal diubah');
		}else{
			$this->session->set_flashdata('msg_success','Data Barang berhasil diubah');
		}
		redirect('admin/katalog_barang');
		
	}

	public function edit_proses(){
		$id_barang=$this->input->post('id_barang');
		// konfigurasi validasi gambar
		$config = array(
		        array(
		                'field' => 'nama_barang',
		                'label' => 'Nama barang',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'jumlah_barang',
		                'label' => 'jumlah_barang',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'berat',
		                'label' => 'berat',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'tinggi',
		                'label' => 'tinggi',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		        array(
		                'field' => 'lebar',
		                'label' => 'lebar',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => ' %s Perlu diisi.')
		        ),
		);
		$this->form_validation->set_rules($config);		
		if ($this->form_validation->run()==false) {
			//jika tidak valid
			$this->detail($id_barang);
		}else{
			//jika valid maka proses update
			// $tgl_lahir = $this->input->post('tahun')."-".$this->input->post('bulan')."-".$this->input->post('tanggal');
			if ($_FILES["gambar"]["error"] == 4) {// jika tidak ada gambar yang diupload
				$gambar=$this->input->post('gambar_temp');
			}else{
				$this->upload($id_barang);
				$gambar=$this->upload->data('file_name');

			}
			$now = date_create(date("Y-m-d 00:00:00"));
			// $date = date_create('20-02-2012 19:30:20');
			$next_day = date_add($now, date_interval_create_from_date_string('1 days'));
			$data=array(
				'nama_barang'=>$this->input->post('nama_barang'),
				'jumlah_barang'=>$this->input->post('jumlah_barang'),
				'berat'=>$this->input->post('berat'),
				'tinggi'=>$this->input->post('tinggi'),
				'lebar'=>$this->input->post('lebar'),
				'panjang'=>$this->input->post('panjang'),
				'deskripsi'=>$this->input->post('deskripsi'),
				'id_kategori'=>$this->input->post('id_kategori'),
				'gambar'=>$gambar,
				'slug'=>$this->input->post('slug'),
				// 'tgl_expired'=>date_format($next_day, 'Y-m-d H:i:s'),
				'harga'=>$this->input->post('harga'),
			);
			$this->Barang_model->updateBarang($id_barang,$data);
			$this->session->set_flashdata('msg_success','Data Barang berhasil diubah');
			redirect('admin/katalog_barang/detail/'.$id_barang);
		}
	}

	public function hapus($id_barang){
		$barang = $this->Barang_model->getBarangById($id_barang);
		// foreach ($arr_barang as $barang) {
			$gambar = $barang->gambar;
		// }
		// $this->Barang_model->deleteBarang($id_barang);
		// echo $error_message;
		if ($this->Barang_model->deleteBarang($id_barang)==FALSE) {
		//jika gagal hapus data
			$this->session->set_flashdata('msg_error','Barang gagal dihapus, masih digunakan di transaksi');
		}else{
			unlink('./assets/uploads/barang/'.$gambar);
			$this->session->set_flashdata('msg_success','Data Barang telah dihapus');
		}
		redirect('admin/katalog_barang');
	}

	public function username_check($str){
		$cek_data=array(
			'username'=>$this->input->post('username'),
			'id_user !='=>$this->input->post('id_user')
		);
        $hasil = $this->Barang_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('username_check', ' {field} : '.set_value('username').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}
	public function email_check($str){
		$cek_data=array(
			'email'=>$this->input->post('email'),
			'id_user !='=>$this->input->post('id_user')
		);
        $hasil = $this->Barang_model->cek_user($cek_data);

		if ($hasil->num_rows() >= 1) {
			$this->form_validation->set_message('email_check', ' {field} : '.set_value('email').' Sudah digunakan');
            return FALSE;
		}else{
			return TRUE;
		}
	}

	public function upload($id=null){
		$config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['encrypt_name']        = TRUE;
        $config['max_size']             = 1000;
        $this->load->library('upload', $config);
        
        if ($id==null) {
        	//jika tidak terdapat id atau jika posisi tambah
        	if ( ! $this->upload->do_upload('gambar'))
             {
                $this->session->set_flashdata('msg_error',$this->upload->display_errors().$config['upload_path']);
				redirect('admin/katalog_barang/tambah');
             }
        }else{
        	//jika terdapat id atau posisji edit
			// $arr_hto = $this->Barang_model->getBarang();
			//jika data isi
			if ($this->upload->do_upload('gambar')) {
            	unlink($config['upload_path'].$this->input->post('gambar_temp'));
			}else{
                $this->session->set_flashdata('msg_error',$this->upload->display_errors());
				redirect('admin/katalog_barang/detail/'.$id);
			}
        }
	}	
}
