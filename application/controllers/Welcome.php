<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 *	$x['i']=$this->model->get_name($kode);

	public function __construct(){
		parent::__construct();
		$this->load->model('m_padmin');
		$this->load->library('Pdf');
	foreach ($data->result_array() as $i) :
	$i=$data->row_array(); 
	}
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function invoice()
	{

		$kode=$this->uri->segment(3);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Pdf.pdf";
		$this->pdf->load_view('pdfdata');
		$this->pdf->render();
		$this->pdf->stream();
	}

}
