<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_padmin extends CI_Model{


	function cekadminlogin($user_username,$user_password){
		$hasil=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
		return $hasil;
	}

	function get_all_produk(){
		$hasil=$this->db->query("SELECT * FROM produk");
		return $hasil;
	}
	
	function get_all_produk_hasil_eoq(){
		$this->db->select('produk.produk_nama, produk.produk_kode, produk.produk_harga, MAX(persediaan.persediaan_eoq) AS max_eoq');
        $this->db->from('produk');
        $this->db->join('persediaan', 'produk.produk_kode = persediaan.produk_kode');
        $this->db->group_by('produk.produk_kode');
				$this->db->order_by('max_eoq', 'DESC');
        $query = $this->db->get();

        return $query;
	}

	function get_all_produk_hasil_rop(){
		$this->db->select('produk.produk_nama, produk.produk_kode, produk.produk_harga, MAX(persediaan.persediaan_rop) AS max_rop');
        $this->db->from('produk');
        $this->db->join('persediaan', 'produk.produk_kode = persediaan.produk_kode');
        $this->db->group_by('produk.produk_kode');
				$this->db->order_by('max_rop', 'DESC');
        $query = $this->db->get();

        return $query;
	}

	function cek_username($user_username){
		$hasil=$this->db->query("SELECT * FROM user where user_username='$user_username'");
		return $hasil->num_rows();
	}

	function cek_password($kode,$oldpassword){
		$hasil=$this->db->query("SELECT * FROM user where user_password=md5('$oldpassword') && user_id='$kode'");
		return $hasil->num_rows();
	}

	function get_pemesanan(){
		$hasil=$this->db->query("SELECT * FROM pemesanan where pemesanan_status='selesai' order by pemesanan_tanggal asc");
		return $hasil->result_array();
	}

	function last_5_pemesanan(){
		$hasil=$this->db->query("SELECT * FROM pemesanan where pemesanan_status='selesai' OR pemesanan_status='batal' order by pemesanan_tanggal desc limit 5");
		return $hasil->result_array();
	}
	function count_produk(){
		$hasil=$this->db->query("SELECT count(*) as cproduk from produk ");
		return $hasil->row_array();
	}
	function count_permintaan(){
		$hasil=$this->db->query("SELECT count(*) as cpermintaan from permintaan ");
		return $hasil->row_array();
	}
	function count_pemesanan(){
		$hasil=$this->db->query("SELECT count(*) as cpemesanan from pemesanan ");
		return $hasil->row_array();
	}

	function count_pemesanan_batal(){
		$hasil=$this->db->query("SELECT count(*) as pembatal from pemesanan where pemesanan_status='batal'");
		return $hasil->row_array();
	}
	function count_pemesanan_selesai(){
		$hasil=$this->db->query("SELECT count(*) as pemselesai from pemesanan where pemesanan_status='selesai'");
		return $hasil->row_array();
	}
	function count_pemesanan_pending(){
		$hasil=$this->db->query("SELECT count(*) as pempending from pemesanan where pemesanan_status='pending'");
		return $hasil->row_array();
	}

	function get_all_permintaan(){
		$hasil=$this->db->query("SELECT * FROM permintaan inner join produk on permintaan.produk_kode=produk.produk_kode inner join supplier on permintaan.supplier_id=supplier.supplier_id order by permintaan.permintaan_tanggal desc");
		return $hasil;
	}

	function get_persediaan_by_kode($produk_kode){
		$hasil=$this->db->query("SELECT * FROM persediaan where produk_kode='$produk_kode' order by persediaan_id  desc limit 1");
		return $hasil;
	}

	function get_all_persediaan(){
		$hasil=$this->db->query("SELECT * FROM persediaan inner join produk on persediaan.produk_kode=produk.produk_kode order by persediaan.persediaan_tanggal desc");
		return $hasil;
	}

	function get_all_pemesanan(){
		$hasil=$this->db->query("SELECT * FROM pemesanan inner join produk on pemesanan.produk_kode=produk.produk_kode order by pemesanan.pemesanan_tanggal desc");
		return $hasil;
	}

	function get_produk_detail($kode){
		$hasil=$this->db->query("SELECT * FROM produk inner join persediaan on produk.produk_kode=persediaan.produk_kode where produk.produk_kode='$kode' order by persediaan.persediaan_id desc limit 1");
		return $hasil;
	}

	function get_produk_by_kode($produk){
		$hasil=$this->db->query("SELECT * FROM produk where produk_kode='$produk'");
		return $hasil;
	}

	function get_all_bahan(){
		$hasil=$this->db->query("SELECT * FROM bahan_baku");
		return $hasil;
	}
	function get_all_user(){
		$hasil=$this->db->query("SELECT * FROM user");
		return $hasil;
	}

	function get_all_supplier(){
		$hasil=$this->db->query("SELECT * FROM supplier");
		return $hasil;
	}

	function get_user($user_id){
		$hasil=$this->db->query("SELECT * FROM user where user_id='$user_id'");
		return $hasil;
	}

	function save_persediaan($produk,$eoq,$rop,$SS){
		$hasil=$this->db->query("INSERT INTO persediaan VALUES(null,'$produk','$eoq','$rop','$SS',NOW())");
		return $hasil;
	}

	function update_user($kode,$user_nama,$user_email,$user_tel,$user_alamat,$user_role,$gambar){
		$hasil=$this->db->query("UPDATE user set user_nama='$user_nama',user_email='$user_email',user_tel='$user_tel',user_alamat='$user_alamat',user_role='$user_role',user_foto='$gambar'  where user_id='$kode'");
		return $hasil;
	}
	function update_user_wo_img($kode,$user_nama,$user_email,$user_tel,$user_alamat,$user_role){
		$hasil=$this->db->query("UPDATE user set user_nama='$user_nama',user_email='$user_email',user_tel='$user_tel',user_alamat='$user_alamat',user_role='$user_role' where user_id='$kode'");
		return $hasil;
	}

	function update_persediaan($persediaan_id,$kode,$eoq,$rop,$SS){
		$hasil=$this->db->query("UPDATE persediaan SET permintaan_id='$kode',persediaan_eoq='$eoq',persediaan_rop='$rop',persediaan_ss='$SS' where persediaan_id='$persediaan_id'");
		return $hasil;
	}
	function save_user($user_username,$user_password,$user_nama,$user_email,$user_tel,$user_alamat,$user_role,$gambar){
		$hasil=$this->db->query("INSERT INTO user values(null,'$user_username',md5('$user_password'),'$user_nama','$user_email','$user_tel','$user_alamat','$user_role','$gambar')");
		return $hasil;
	}
	function save_produk($kode,$nama,$harga,$stok,$bsimpan,$bpesan,$leadtime){
		$hasil=$this->db->query("INSERT INTO produk VALUES ('$kode','$nama','$harga','$stok','$bpesan','$bsimpan','$leadtime')");
		return $hasil;
	}
	function update_produk($kode,$nama,$harga,$stok,$bsimpan,$bpesan,$leadtime){
		$hasil=$this->db->query("UPDATE produk SET produk_nama='$nama',produk_harga='$harga',produk_stok='$stok',produk_bpesan='$bpesan',produk_bsimpan='$bsimpan',produk_leadtime='$leadtime' where produk_kode='$kode'");
		return $hasil;
	}
	function update_password($kode,$newpassword){
		$hasil=$this->db->query("UPDATE user SET user_password=md5('$newpassword') where user_id='$kode'");
		return $hasil;
	}

	function delete_produk($kode){
		$hasil=$this->db->query("DELETE FROM produk where produk_kode='$kode'");
		return $hasil;
	}

	function delete_user($kode){
		$hasil=$this->db->query("DELETE FROM user where user_id='$kode'");
		return $hasil;
	}

	function save_pemesanan($kode,$produk,$jumlah){
		$hasil=$this->db->query("INSERT INTO pemesanan VALUES ('$kode','$produk','$jumlah','pending',NOW())");
		return $hasil;
	}

	function save_permintaan($kode,$produk,$supplier,$jumlah,$biaya){
		$hasil=$this->db->query("INSERT INTO permintaan VALUES ('$kode','$produk','$supplier','$jumlah','$biaya',NOW())");
		return $hasil;
	}
	function update_permintaan($kode,$produk,$jumlah){
		$hasil=$this->db->query("UPDATE permintaan SET produk_kode='$produk',permintaan_jumlah='$jumlah' where permintaan_id='$kode'");
		return $hasil;
	}
	function delete_permintaan($kode){
		$hasil=$this->db->query("DELETE FROM permintaan where permintaan_id='$kode'");
		return $hasil;
	}

	function save_supplier($nama,$tel,$alamat){
		$hasil=$this->db->query("INSERT INTO supplier VALUES (null,'$nama','$tel','$alamat')");
		return $hasil;
	}
	function update_supplier($kode,$nama,$tel,$alamat){
		$hasil=$this->db->query("UPDATE supplier SET supplier_nama='$nama',supplier_tel='$tel',supplier_alamat='$alamat' where supplier_id='$kode'");
		return $hasil;
	}

	function update_stok_produk($produk,$newstok) {
		$hasil=$this->db->query("UPDATE produk set produk_stok='$newstok' where produk_kode='$produk'");
	}

	function delete_supplier($kode){
		$hasil=$this->db->query("DELETE FROM supplier where supplier_id='$kode'");
		return $hasil;
	}

	function update_pemesanan_status($kode,$status){
		$hasil=$this->db->query("UPDATE pemesanan set pemesanan_status='$status' where pemesanan_id='$kode'");
		return $hasil;
	}
	function update_stock_produk($produk,$jumlah){
		$hasil=$this->db->query("UPDATE produk set produk_stok=(produk_stok)+$jumlah where produk_kode='$produk'");
		return $hasil;
	}
	function save_bahan($kode,$nama,$jumlah,$satuan){
		$hasil=$this->db->query("INSERT INTO bahan_baku VALUES ('$kode','$nama','$jumlah','$satuan')");
		return $hasil;
	}
	function update_bahan($kode,$nama,$jumlah,$satuan){
		$hasil=$this->db->query("UPDATE bahan_baku SET bb_nama='$nama',bb_jumlah='$jumlah',bb_satuan='$satuan' where bb_kode='$kode'");
		return $hasil;
	}
	function delete_bahan($kode){
		$hasil=$this->db->query("DELETE FROM bahan_baku where bb_kode='$kode'");
		return $hasil;
	}


	function save_produk_detail($produk,$bahan,$jumlah){
		$hasil=$this->db->query("INSERT INTO produk_detail (produk_kode,bb_kode,produk_detail_jumlah) VALUES ('$produk','$bahan','$jumlah')");
		return $hasil;
	}
	function update_produk_detail($kode,$produk,$bahan,$jumlah){
		$hasil=$this->db->query("UPDATE produk_detail SET produk_kode='$produk',bb_kode='$bahan',produk_detail_jumlah='$jumlah' where produk_detail_id='$kode'");
		return $hasil;
	}
	function delete_produk_detail($kode){
		$hasil=$this->db->query("DELETE FROM produk_detail where produk_detail_id='$kode'");
		return $hasil;
	}
}