<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('username')) and $this->session->userdata('level') != 'member' ){
			redirect('login');
		}
	}

	public function index(){
		$ids = $this->session->userdata('nomor');
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['produk'] = $this->Mcrud->get_all_data('tbl_produk')->result();
		$data['ads'] = $this->Mcrud->get_joinwhere('tbl_iklan i','tbl_produk p','i.idProduk=p.idProduk',array('stat' => 'Y'))->result();
		// $this->template->load('user/layout_user','user/profil',$data);
		$this->template->load('user/layout','user/main',$data);
	}

	// ============================Profil============================

	public function profil(){
		$ids = $this->session->userdata('nomor');
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$data['member'] = $this->Mcrud->get_by_id('tbl_member',array('idKonsumen' => $ids))->row();
		$this->template->load('user/layout','user/profil',$data);
	}

	public function update_profil(){
		$id = $this->input->post('id');
		$usr = $this->input->post('username');
		$nama = $this->input->post('nama');
		$almt = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$em = $this->input->post('email');
		$tlp = $this->input->post('tlpn');
		$pass = $this->input->post('passwd');
		$dataUpdate = array('username' => $usr,
							'namaKonsumen' => $nama,
							'alamat' => $almt,
							'idKota' => $kota,
							'email' => $em,
							'tlpn' => $tlp,
							'passwd' => $pass
					);
		$this->Mcrud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
		$this->session->set_flashdata('alert', 'diubah');
		redirect('user/profil');
	}
	// =========================Keranjang==================================

	public function keranjang(){
		$ids = $this->session->userdata('nomor');
		$w = array('o.idKonsumen' => $ids );
		$wbb = array('statusOrder' => 'Belum Bayar');
		$wkm = array('statusOrder' => 'Dikemas');
		$wkr = array('statusOrder' => 'Dikirim');
		$wtr = array('statusOrder' => 'Diterima');
		$ws = array('statusOrder' => 'Selesai');
		$wbt = array('statusOrder' => 'Dibatalkan');
		$j1 = 'o.idOrder=do.idOrder';
		$j2 = 'do.idProduk=p.idProduk';
		$data['kwbb'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$wbb)->result();
		$data['kwkm'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$wkm)->result();
		$data['kwkr'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$wkr)->result();
		$data['kwtr'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$wtr)->result();
		$data['kws'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$ws)->result();
		$data['kwbt'] = $this->Mcrud->join_where('tbl_detail_order do','tbl_order o','tbl_produk p',$j1,$j2,$w,$wbt)->result();
		$this->template->load('user/layout','user/keranjang',$data);
	}

	public function add_keranjang($id){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$ids = $this->session->userdata('nomor');
		$date = date('Y-m-d H:i:s');
		$dataInsert = array('idKonsumen' => $ids,
							'tglOrder' => $date,
							'statusOrder' => 'Belum Bayar');
		$this->Mcrud->insert('tbl_order',$dataInsert);
		$w1 = array('tglOrder' => $date,
					'idKonsumen' => $ids,
					'statusOrder' => 'Belum Bayar');
		$w2 = array('idProduk' => $id);
		$data['order'] = $this->Mcrud->get_by_id('tbl_order',$w1)->result();
		$data['produk'] = $this->Mcrud->get_by_id('tbl_produk',$w2)->result();
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$this->template->load('user/layout','user/add_keranjang',$data);
	}

	public function masuk_keranjang(){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$jml = (int)$this->input->post('jumlah');
		$idP = $this->input->post('idP');
		$idO = $this->input->post('idO');
		$kota = $this->input->post('kota');
		$hrg = (int)$this->input->post('harga');
		$ttl = $jml*$hrg;
		$dataInsert = array('idProduk' => $idP,
							'idOrder' => $idO,
							'jumlah' => $jml,
							'idKota' => $kota,
							'subtotal' => $ttl);
		$this->Mcrud->insert('tbl_detail_order',$dataInsert);
		$this->session->set_flashdata('alert','ditambahkan');
		redirect('user');
	}

	public function batal($id){
		$dataUpdate = array('statusOrder' => 'Dibatalkan');
		$this->Mcrud->update('tbl_order',$dataUpdate,'idOrder',$id);
		$this->session->set_flashdata('alert','diubah');
		redirect('user/keranjang');
	}

	public function checkout($id){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$dok = $this->Mcrud->get_by_id('tbl_detail_order',array('idDetailOrder' => $id))->row_object();
		$idp = 'o.idProduk=p.idProduk';
		$w1 = array('idDetailOrder' => $id);
		$w2 = array('idKotaTujuan' => $dok->idKota);
		$id1 = 'b.idKurir=k.idKurir';
		$id2 = 'b.idKotaTujuan=kt.idKota';
		$id3 = 'd.idKota=kt.idKota';
		$data['do'] = $this->Mcrud->jointiga_where('tbl_detail_order do','tbl_produk p','tbl_kota k','do.idProduk=p.idProduk','do.idKota=k.idKota',$w1)->result();
		$data['krm'] = $this->Mcrud->jointiga_where('tbl_biaya_kirim b','tbl_kurir k','tbl_kota kt',$id1,$id2,$w2)->result();
		$this->template->load('user/layout','user/checkout',$data);
	}

	public function pembayaran(){
		$ids = $this->session->userdata('nomor');
		$w1 = array('pb.idKonsumen' => $ids);
		$data['byr'] = $this->Mcrud->jointiga_where('tbl_pembayaran pb','tbl_detail_order do','tbl_produk p','do.idDetailOrder=pb.idDetailOrder','do.idProduk=p.idProduk',$w1)->result();
		$this->template->load('user/layout','user/pembayaran',$data);
	}

	public function detail_pembayaran(){
		$ids = $this->session->userdata('nomor');
		$almt = $this->input->post('almt');
		$iddo = $this->input->post('idDO');
		$w1 = array('idDetailOrder' => $iddo);
		$sub = (int)$this->input->post('sub');
		$krm = (int)$this->input->post('krm');
		$total = $sub+$krm;
		$dataUpdate = array('almt' => $almt);
		$this->Mcrud->update('tbl_detail_order',$dataUpdate,'idDetailOrder',$iddo);
		$cek = $this->Mcrud->get_by_id('tbl_pembayaran',array('idDetailOrder' => $iddo))->num_rows();
		if($cek > 0){
			$data['bayar'] = $this->Mcrud->get_by_id('tbl_pembayaran', array('idDetailOrder' => $iddo,'idKonsumen' => $ids))->row_object();
			$data['do'] = $this->Mcrud->jointiga_where('tbl_detail_order do','tbl_produk p','tbl_kota k','do.idProduk=p.idProduk','do.idKota=k.idKota',$w1)->row_object();
			$this->template->load('user/layout','user/detail_pembayaran',$data);
		}
		else{
			$dataInsert = array('idDetailOrder' => $iddo,
								'idKonsumen' => $ids,
								'total' => $total);
			$this->Mcrud->insert('tbl_pembayaran',$dataInsert);
			$data['bayar'] = $this->Mcrud->get_by_id('tbl_pembayaran', array('idDetailOrder' => $iddo,'idKonsumen' => $ids))->row_object();
			$data['do'] = $this->Mcrud->jointiga_where('tbl_detail_order do','tbl_produk p','tbl_kota k','do.idProduk=p.idProduk','do.idKota=k.idKota',$w1)->row_object();
			$this->template->load('user/layout','user/detail_pembayaran',$data);
		}
	}

	// =========================Wishlist=====================================

	public function wishlist(){
		$ids = $this->session->userdata('nomor');
		$data['wl'] = $this->Mcrud->get_joinwhere('tbl_wish w','tbl_produk p','p.idProduk=w.idProduk',array('idKonsumen' => $ids))->result();
		$this->template->load('user/layout','user/wishlist',$data);
	}

	public function add_wishlist($id){
		$ids = $this->session->userdata('nomor');
		$dataInsert = array('idProduk' => $id,
							'idKonsumen' => $ids
							);
		$this->Mcrud->insert('tbl_wish',$dataInsert);
		$this->session->set_flashdata('alert','ditambahkan');
		redirect('user');
	}

	public function delete_wish($id){
		$where = array('idWish' => $id);
		$this->Mcrud->deletekat($where,'tbl_wish');
        $this->session->set_flashdata('alert','dihapus');
		redirect('user/wishlist');
	}

	public function q_kategori($id){
		$data['jns'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
		$data['cek'] = $this->Mcrud->get_by_id('tbl_produk',array('idKat' => $id))->num_rows();
		$data['produk'] = $this->Mcrud->get_by_id('tbl_produk',array('idKat' => $id))->result();
		$this->template->load('user/layout','user/hasil',$data);
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