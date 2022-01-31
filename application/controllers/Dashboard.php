<?php 
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->model('Mlogin');
	}

	public function index(){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['produk'] = $this->Mcrud->get_all_data('tbl_produk')->result();
		$data['ads'] = $this->Mcrud->get_joinwhere('tbl_iklan i','tbl_produk p','i.idProduk=p.idProduk',array('stat' => 'Y'))->result();
		$this->template->load('user/layout_nolog','user/main_nolog',$data);
	}

	public function q_kategori($id){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['cek'] = $this->Mcrud->get_by_id('tbl_produk',array('idKat' => $id))->num_rows();
		$data['produk'] = $this->Mcrud->get_by_id('tbl_produk',array('idKat' => $id))->result();
		$this->template->load('user/layout_nolog','user/hasil',$data);
	}

	public function q_cari(){
		$q = $this->input->post('cari');
		$data['query'] = $q;
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['cek'] = $this->Mcrud->cari('tbl_produk',array('namaProduk' => $q))->num_rows();
		$data['produk'] = $this->Mcrud->cari('tbl_produk',array('namaProduk' => $q))->result();
		$this->template->load('user/layout_nolog','user/hasil_cari',$data);
	}
}