<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perkembangan extends CI_Controller {
	
	public function __construct() {
    parent::__construct();

    $this->load->model('Client_model');
    $this->load->model('Perkembangan_client_model');
    $this->load->library('Pdf');
  }

	public function index() {
    $id_client = $this->session->userdata('id_client');
    $data['perkembangan'] = $this->Perkembangan_client_model->getPerkembanganByIdClient($id_client);
    $data['client'] = $this->Client_model->getClientById($id_client);
  		$this->load->view('client/V_perkembangan_client',$data);
  	}

    public function preview ($id_perkembanganclient) {
      $id_client = $this->session->userdata('id_client');
      $data['client'] = $this->Client_model->getClientById($id_client);
      $data['preview'] = $this->Perkembangan_client_model->getPerkembanganById($id_perkembanganclient);

      $this->load->view('client/V_preview_perkembangan', $data);
    }

  	public function detail() {
  	 $waktu = $this->input->get('bulan');
     $id_client = $this->session->userdata('id_client');
     $data['perkembangan'] = $this->Perkembangan_client_model->getPerkembanganByIdClient($id_client);
     $data['client'] = $this->Client_model->getClientById($id_client);
     $data['result'] = $this->Perkembangan_client_model->getPerkembanganByDate($id_client, $waktu);

     $this->load->view('client/V_detail_perkembangan_client', $data);
  	}

    public function cetak($id_perkembanganclient) {
      $perkembangan = $this->Perkembangan_client_model->getPerkembanganById($id_perkembanganclient);

      $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      $pdf->SetTitle('Laporan Perkembangan Client ');

      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
          require_once(dirname(__FILE__).'/lang/eng.php');
          $pdf->setLanguageArray($l);
      }

      $pdf->SetPrintHeader(false);
      $pdf->SetPrintFooter(false);
      $pdf->AddPage('P', 'A4');
      $pdf->Image(base_url().'assets/img/yamet.png', 10, 5, 48, 20, 'png', '', '', true, 150, '', false, false, 0, false, false, false);
      $pdf->SetFont('Calibri', '', 14);
      $pdf->writeHTML('<br /> <br />', true, false, false, false, '');
      $pdf->Write(0, 'YAMET KLINIK TUMBUH KEMBANG ANAK', '', 0, 'C', true, 0, false, false, 0);
      $pdf->SetFont('Calibri', '', 11);
      $pdf->Write(0, 'JL. Kebon Agung 101 Sendang Adi, Mlati, Sleman ', '', 0, 'C', true, 0, false, false, 0);
      $pdf->Write(0, 'Telp. (0274) 4530535 / 0822 25503447', '', 0, 'C', true, 0, false, false, 0);
      $pdf->Write(0, 'YOGYAKARTA', '', 0, 'C', true, 0, false, false, 0);
      $garisheader = '<hr style="height:3px; color:#000; background-color:#000;margin-bottom: 100px; border:none;">';
      $pdf->writeHTML($garisheader, true, false, false, false, '');
      $pdf->setFont('Calibri', 'BU', '16');
      $pdf->Write(0, 'LAPORAN PERKEMBANGAN SISWA', '', 0, 'C', true, 0, false, false, 0);

      $pdf->setFont('Calibri', '', '12');
        $tbl_head = '<br /> <br /><table>
            <tr>
              <td style="width: 4cm;">Nama Siswa</td>
              <td style="width: 60%;">: '.$perkembangan->nama_client.'</td>
              <td rowspan="4"><img src="'.base_url('assets/upload/client/'.$perkembangan->gambar_client).'" width="90" height="100"></td>
            </tr>
           <tr>
              <td>Diagnosa Awal</td>
              <td>: '.$perkembangan->diagnosis_client.'</td>
            </tr>
            <tr>
              <td>Nama Terapis</td>
              <td>: '.$perkembangan->nama_pegawai.'</td>
            </tr>
            <tr>
            <td>Tanggal Terapi</td>
            <td>: '.$perkembangan->tanggal_perkembangan.'</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>Perkembangan Siswa</td>
            <td>:</td>
            </tr>
            <tr>
            <td colspan="2">'.$perkembangan->laporan_perkembanganclient.'</td>
            </tr>
        <div style="float:right;"></div>';
      $pdf->writeHTML($tbl_head, false, true, false, false, '');
      $pdf->setY(-15);
      $pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

      $js = "function Print() {print();}";

      $pdf->IncludeJS($js);

      $pdf->Output('Laporan Perkembangan.pdf', 'I');

    }

    public function cetaklaporan() {
      $id_client = $this->session->userdata('id_client');
      $perkembangan = $this->Perkembangan_client_model->getPerkembanganByIdClient($id_client);

      $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      $pdf->SetTitle('Laporan Perkembangan Client ');

      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
          require_once(dirname(__FILE__).'/lang/eng.php');
          $pdf->setLanguageArray($l);
      }

      $pdf->SetPrintHeader(false);
      $pdf->SetPrintFooter(false);
      $pdf->AddPage('P', 'A4');
      $pdf->Image(base_url().'assets/img/yamet.png', 10, 5, 48, 20, 'png', '', '', true, 150, '', false, false, 0, false, false, false);
      $pdf->SetFont('Calibri', '', 14);
      $pdf->writeHTML('<br /> <br />', true, false, false, false, '');
      $pdf->Write(0, 'YAMET KLINIK TUMBUH KEMBANG ANAK', '', 0, 'C', true, 0, false, false, 0);
      $pdf->SetFont('Calibri', '', 11);
      $pdf->Write(0, 'JL. Kebon Agung 101 Sendang Adi, Mlati, Sleman ', '', 0, 'C', true, 0, false, false, 0);
      $pdf->Write(0, 'Telp. (0274) 4530535 / 0822 25503447', '', 0, 'C', true, 0, false, false, 0);
      $pdf->Write(0, 'YOGYAKARTA', '', 0, 'C', true, 0, false, false, 0);
      $garisheader = '<hr style="height:3px; color:#000; background-color:#000;margin-bottom: 100px; border:none;">';
      $pdf->writeHTML($garisheader, true, false, false, false, '');
      $pdf->setFont('Calibri', 'BU', '16');
      $pdf->Write(0, 'LAPORAN PERKEMBANGAN SISWA', '', 0, 'C', true, 0, false, false, 0);

      $pdf->setFont('Calibri', '', '12');
        $tbl_head = '<br /> <br /><table>
            <tr>
              <td style="width: 4cm;">Nama Siswa</td>
              <td style="width: 60%;">: '.$perkembangan[0]->nama_client.'</td>
              <td rowspan="4"><img src="'.base_url('assets/upload/client/'.$perkembangan[0]->gambar_client).'" width="90" height="100"></td>
            </tr>
           <tr>
              <td>Diagnosa Awal</td>
              <td>: '.$perkembangan[0]->diagnosis_client.'</td>
            </tr>
            <tr>
              <td>Nama Terapis</td>
              <td>: '.$perkembangan[0]->nama_pegawai.'</td>
            </tr>';

        foreach ($perkembangan as $perkembangan) {
          $tbl_head .= '
            <tr><td></td></tr>
            <tr>
            <td>Tanggal Terapi</td>
            <td>: '.$perkembangan->tanggal_perkembangan.'</td>
            </tr>
            <tr>
            <td>Perkembangan Siswa</td>
            <td>:</td>
            </tr>
            <tr>
            <td colspan="2">'.$perkembangan->laporan_perkembanganclient.'</td>
            </tr>';
        }

      $pdf->writeHTML($tbl_head, false, true, false, false, '');
      $pdf->setY(-15);
      $pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

      $js = "function Print() {print();}";

      $pdf->IncludeJS($js);

      $pdf->Output('Laporan Perkembangan.pdf', 'I');
    }

}
