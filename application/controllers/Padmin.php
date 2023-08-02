<?php
class Padmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('m_padmin');
	}
	public function index(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['cprod']=$this->m_padmin->count_produk();
			$x['cperm']=$this->m_padmin->count_permintaan();
			$x['cpem']=$this->m_padmin->count_pemesanan();
			$x['l5pem']=$this->m_padmin->last_5_pemesanan();
			$x['chartpemesanan']=$this->m_padmin->get_pemesanan();
			$x['pembatal']=$this->m_padmin->count_pemesanan_batal();
			$x['pemselesai']=$this->m_padmin->count_pemesanan_selesai();
			$x['pempending']=$this->m_padmin->count_pemesanan_pending();

			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('index',$x);
			$this->load->view('footer');
		}
	}
	public function produk(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['data']=$this->m_padmin->get_all_produk();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('produk/produk',$x);
			$this->load->view('footer');
		}
	}
	public function produk_detail(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$kode=$this->uri->segment(3);
			$x['data']=$this->m_padmin->get_produk_detail($kode);
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('produk/produk_detail',$x);
			$this->load->view('footer');
		}
	}
	public function bahan_baku(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['data']=$this->m_padmin->get_all_bahan();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('produk/bahan_baku',$x);
			$this->load->view('footer');
		}
	}
	public function supplier(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['data']=$this->m_padmin->get_all_supplier();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('supplier/supplier',$x);
			$this->load->view('footer');
		}
	}
	public function laporan(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['permintaan']=$this->m_padmin->get_all_permintaan();
			$x['pemesanan']=$this->m_padmin->get_all_pemesanan();
			$x['persediaan']=$this->m_padmin->get_all_persediaan();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('laporan/laporan',$x);
			$this->load->view('footer');
		}
	}
	public function pemesanan(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['produk']=$this->m_padmin->get_all_produk();
			$x['data']=$this->m_padmin->get_all_pemesanan();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('transaksi/pemesanan',$x);
			$this->load->view('footer');
		}
	}

	public function user(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['data']=$this->m_padmin->get_all_user();
			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('user/user',$x);
			$this->load->view('footer');
		}
	}

	public function permintaan(){
		if(isset($_SESSION['logged_in'])){
			$user_id=$_SESSION['user_id'];
			$x['guser']=$this->m_padmin->get_user($user_id);
			$x['produk']=$this->m_padmin->get_all_produk();
			$x['data']=$this->m_padmin->get_all_permintaan();
			$x['supplier']=$this->m_padmin->get_all_supplier();

			$this->load->view('header');
			$this->load->view('topbar',$x);
			$this->load->view('sidebar',$x);
			$this->load->view('transaksi/permintaan',$x);
			$this->load->view('footer');
		}
	}

	function cetak(){
		$jenis=$this->uri->segment(2);
		if($jenis=='persediaan'){
			$x['persediaan']=$this->m_padmin->get_all_persediaan();
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Persediaan.pdf";
			$this->pdf->load_view('laporan/cetak',$x);
			$this->pdf->render();
			$this->pdf->stream();
		}else if ($jenis=='pemesanan'){
			$x['pemesanan']=$this->m_padmin->get_all_pemesanan();
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Pemesanan.pdf";
			$this->pdf->load_view('laporan/cetak',$x);
			$this->pdf->render();
			$this->pdf->stream();
		}else {
			$x['permintaan']=$this->m_padmin->get_all_permintaan();
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Permintaan.pdf";
			$this->pdf->load_view('laporan/cetak',$x);
			$this->pdf->render();
			$this->pdf->stream();
		}
	}

	function save_user(){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('filefoto'))
		{
			$gbr = $this->upload->data();
			$config['image_library']='gd2';
			$config['source_image']='./assets/images/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '60%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$user_jenis=$this->input->post('user_jenis');
			$user_nama=$this->input->post('user_nama');
			$user_username=$this->input->post('user_username');
			$user_email=$this->input->post('user_email');
			$user_tel=$this->input->post('user_tel');
			$user_role=$this->input->post('user_role');
			$user_alamat=$this->input->post('user_alamat');
			$user_password=$this->input->post('password');
			$user_repassword=$this->input->post('repassword');

			$cek=$this->m_padmin->cek_username($user_username);
			if($cek==0){
				if($user_password==$user_repassword){
					$this->m_padmin->save_user($user_username,$user_password,$user_nama,$user_email,$user_tel,$user_alamat,$user_role,$gambar);
					echo $this->session->set_flashdata('msg','success');
					redirect('user');
				} else {
					echo $this->session->set_flashdata('msg','warning');
					redirect('user');
				}
			}
			else {
				echo $this->session->set_flashdata('msg','warning');
				redirect('user');
			}
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('user');
		}
	}


	function update_user(){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('filefoto'))
		{
			$gbr = $this->upload->data();
			$config['image_library']='gd2';
			$config['source_image']='./assets/images/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '60%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$kode=$this->input->post('kode');
			$user_jenis=$this->input->post('user_jenis');
			$user_nama=$this->input->post('user_nama');
			$user_email=$this->input->post('user_email');
			$user_tel=$this->input->post('user_tel');
			$user_role=$this->input->post('user_role');
			$user_alamat=$this->input->post('user_alamat');
			$this->m_padmin->update_user($kode,$user_nama,$user_email,$user_tel,$user_alamat,$user_role,$gambar);
			echo $this->session->set_flashdata('msg','success');
			redirect('user');
		}else{
			$kode=$this->input->post('kode');
			$user_jenis=$this->input->post('user_jenis');
			$user_nama=$this->input->post('user_nama');
			$user_email=$this->input->post('user_email');
			$user_tel=$this->input->post('user_tel');
			$user_alamat=$this->input->post('user_alamat');
			$user_role=$this->input->post('user_role');
			$this->m_padmin->update_user_wo_img($kode,$user_nama,$user_email,$user_tel,$user_alamat,$user_role);
			echo $this->session->set_flashdata('msg','success');
			redirect('user');
		}
	}


	function save_produk(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$harga=$this->input->post('harga');
		$stok=$this->input->post('stok');
		$bpesan=$this->input->post('bpesan');
		$bsimpan=$this->input->post('bsimpan');
		$leadtime=$this->input->post('leadtime');
		$this->m_padmin->save_produk($kode,$nama,$harga,$stok,$bsimpan,$bpesan,$leadtime);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data kriteria</div>');
		redirect('produk');
	}	

	function update_produk(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$harga=$this->input->post('harga');
		$stok=$this->input->post('stok');
		$bpesan=$this->input->post('bpesan');
		$bsimpan=$this->input->post('bsimpan');
		$leadtime=$this->input->post('leadtime');
		$this->m_padmin->update_produk($kode,$nama,$harga,$stok,$bsimpan,$bpesan,$leadtime);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data kriteria</div>');
		redirect('produk');
	}	


	function delete_produk(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_produk($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('produk');
	}
	function delete_user(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_user($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('user');
	}
	function save_pemesanan(){
		$kode=$this->input->post('kode');
		$produk=$this->input->post('produk');
		$jumlah=$this->input->post('jumlah');
		$this->m_padmin->save_pemesanan($kode,$produk,$jumlah);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data kriteria</div>');
		redirect('pemesanan');
	}
	function save_permintaan(){
		$produk=$this->input->post('produk');
		$jumlah=$this->input->post('jumlah');
		$supplier=$this->input->post('supplier');
		$kode=$this->input->post('kode');
		$gprod=$this->m_padmin->get_produk_by_kode($produk);
		$cgprod=$gprod->row_array();
		$D = $jumlah;
		$S = $cgprod['produk_bpesan']; 
		$I = $cgprod['produk_bsimpan'];
		$C = $cgprod['produk_harga'];
		$H = ($I*$C)/100;
		$L = $cgprod['produk_leadtime'];

		$eoq=sqrt((2*($S*$D))/$H);
		$d=$D/6;
		$SS=(50*ceil($d)*$L)/100;
		$rop=(ceil($d)*$L)+$SS;

		$stok=$cgprod['produk_stok'];
		$newstok=$stok-$jumlah;
		$biaya=$jumlah*$C;
		$ck=$this->m_padmin->save_permintaan($kode,$produk,$supplier,$jumlah,$biaya);
		if($ck){
			$ch=$this->m_padmin->save_persediaan($produk,$eoq,$rop,$SS);
			if($ch){
				$this->m_padmin->update_stok_produk($produk,$newstok);
				echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data permintaan</div>');
				redirect('permintaan');
			}	else {
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data permintaan</div>');
				redirect('permintaan');
			}

		}
		else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data permintaan</div>');
			redirect('permintaan');
		}
		
	}	

	function update_permintaan(){
		$kode=$this->input->post('kode');
		$produk=$this->input->post('produk');
		$jumlah=$this->input->post('jumlah');
		$persediaan_id=$this->input->post('persediaan_id');

		$gprod=$this->m_padmin->get_produk_by_kode($produk);
		$cgprod=$gprod->row_array();

		$D = $jumlah;
		$S = $cgprod['produk_bpesan']; 
		$I = $cgprod['produk_bsimpan'];
		$C = $cgprod['produk_harga'];
		$H = $I*$C;
		$L = $cgprod['produk_leadtime'];

		$eoq=sqrt((2*($S*$D)/$H));
		$d=$D/6;
		$SS=(50*ceil($d)*$L)/100;
		$rop=(ceil($d)*$L)+$SS;
		
		$ck=$this->m_padmin->update_permintaan($kode,$produk,$jumlah);
		if($ck){
			$this->m_padmin->update_persediaan($persediaan_id,$kode,$eoq,$rop,$SS);
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data permintaan</div>');
			redirect('permintaan');
		}
		else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal menambahkan data permintaan</div>');
			redirect('permintaan');
		}
	}	

	function update_pemesanan_status(){
		$kode=$this->input->post('kode');
		$status=$this->input->post('status');
		$jumlah=$this->input->post('jumlah');
		$produk=$this->input->post('produk');

		$ck=$this->m_padmin->update_pemesanan_status($kode,$status);
		if($ck){
			if($status=='selesai'){
				$dd=$this->m_padmin->update_stock_produk($produk,$jumlah);
				if($dd){
					echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil mengupdate data</div>');
					redirect('pemesanan');
				}else {
					echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal mengupdate data stock</div>');
					redirect('pemesanan');
				}

			}else {
				echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Gagal mengupdate data</div>');
				redirect('pemesanan');
			}
		} else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil mengupdate data</div>');
			redirect('pemesanan');
		}
	}
	function update_password(){
		$kode=$this->input->post('kode');
		$oldpassword=$this->input->post('oldpassword');
		$newpassword=$this->input->post('newpassword');
		$repassword=$this->input->post('repassword');

		$cek_password=$this->m_padmin->cek_password($kode,$oldpassword);
		if($cek_password>0){

			if($newpassword==$repassword){
				$this->m_padmin->update_password($kode,$newpassword);
				echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Password anda berhasil dirubah</div>');
				redirect('user');
			} else{
				echo $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Password baru anda tidak sama</div>');
				redirect('user');
			}
		}
		else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Password lama anda tidak sama</div>');
			redirect('user');
		}
	}

	function delete_permintaan(){
		$kode=$this->input->post('kode');
		$cc=$this->m_padmin->delete_permintaan($kode);
		if($cc){
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Berhasil menghapus data</div>');
			redirect('permintaan');
		}else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Gagal menghapus data</div>');
			redirect('permintaan');
		}
	}


	function save_supplier(){
		$nama=$this->input->post('nama');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$this->m_padmin->save_supplier($nama,$tel,$alamat);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data supplier</div>');
		redirect('supplier');
	}	

	function update_supplier(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$this->m_padmin->update_supplier($kode,$nama,$tel,$alamat);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data supplier</div>');
		redirect('supplier');
	}	


	function delete_supplier(){
		$kode=$this->input->post('kode');
		$cc=$this->m_padmin->delete_supplier($kode);
		if($cc){
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Berhasil menghapus data</div>');
			redirect('supplier');
		}else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Gagal menghapus data</div>');
			redirect('supplier');
		}
	}

	function save_bahan(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$jumlah=$this->input->post('jumlah');
		$satuan=$this->input->post('satuan');
		$this->m_padmin->save_bahan($kode,$nama,$jumlah,$satuan);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data Bahan</div>');
		redirect('bahan');
	}	

	function update_bahan(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$jumlah=$this->input->post('jumlah');
		$satuan=$this->input->post('satuan');
		$this->m_padmin->update_bahan($kode,$nama,$jumlah,$satuan);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan data Bahan</div>');
		redirect('bahan');
	}	


	function delete_bahan(){
		$kode=$this->input->post('kode');
		$cc=$this->m_padmin->delete_bahan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		if($cc){
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Berhasil menghapus data</div>');
			redirect('bahan');
		}else {
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Gagal menghapus data</div>');
			redirect('bahan');
		}
	}


	function save_produk_detail(){
		$produk=$this->input->post('produk');
		$bahan=$this->input->post('bahan');
		$jumlah=$this->input->post('jumlah');
		$this->m_padmin->save_produk_detail($produk,$bahan,$jumlah);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan Data</div>');
		redirect('produk/detail/'.$produk);
	}


	function update_produk_detail(){
		$kode=$this->input->post('kode');
		$produk=$this->input->post('produk');
		$bahan=$this->input->post('bahan');
		$jumlah=$this->input->post('jumlah');
		$this->m_padmin->update_bahan($kode,$produk,$bahan,$jumlah);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil menambahkan Data</div>');
		redirect('produk/detail/'.$produk);
	}	



	function delete_produk_detail(){
		$produk=$this->input->post('produk');
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_produk_detail($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('produk/detail/'.$produk);
	}

}		