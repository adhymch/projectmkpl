<?php

/**
 * Description of C_KirimBarang
 *
 * @author acer
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_KirimBarang extends CI_Controller {

    public function __construct() {
        parent::__Construct();
        $this->load->helper('string');
        $this->load->helper('date');
        $this->load->model('M_Barang');
    }

    public function checkFormKirim() {
        $this->form_validation->set_rules('Divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('SerialNumber', 'SerialNumber', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('TipeBarang', 'TipeBarang', 'required');
        $this->form_validation->set_rules('NamaBarang', 'NamaBarang', 'trim|required|min_length[5]|max_length[64]');
        $this->form_validation->set_rules('Lokasi1', 'Lokasi1', 'required');
        $this->form_validation->set_rules('Lokasi2', 'Lokasi2', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');
        $this->form_validation->set_rules('Pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('Penerima', 'Penerima', 'required');
    }

    public function getID() {
        $ID = random_string('numeric', 4);
        return $ID;
    }

    public function getDivisi() {
        $Divisi = filter_input(INPUT_POST, "Divisi");
        return $Divisi;
    }

    public function getSerialNumber() {
        $SerialNumber = strtoupper(filter_input(INPUT_POST, "SerialNumber"));
        return $SerialNumber;
    }

    public function getTipeBarang() {
        $TipeBarang = strtoupper(filter_input(INPUT_POST, "TipeBarang"));
        return $TipeBarang;
    }

    public function getNamaBarang() {
        $NamaBarang = strtoupper(filter_input(INPUT_POST, "NamaBarang"));
        return $NamaBarang;
    }

    public function getLokasi1() {
        $Lokasi1 = filter_input(INPUT_POST, "Lokasi1");
        return $Lokasi1;
    }

    public function getLokasi2() {
        $Lokasi2 = filter_input(INPUT_POST, "Lokasi2");
        return $Lokasi2;
    }

    public function getLastUpdate() {
        $LastUpdate = mdate('%Y-%m-%d %h:%i:%s', now());
        return $LastUpdate;
    }

    public function getTanggalKirim() {
        $TanggalKirim = mdate('%Y-%m-%d %h:%i:%s', now());
        return $TanggalKirim;
    }

    public function getPengirim() {
        $Pengirim = strtoupper(filter_input(INPUT_POST, "Pengirim"));
        return $Pengirim;
    }

    public function getPenerima() {
        $Penerima = strtoupper(filter_input(INPUT_POST, "Penerima"));
        return $Penerima;
    }

    public function getStatus() {
        $Status = 'Pindah';
        return $Status;
    }

    public function checkResult($result1, $result2) {
        if ($result1 && $result2) {
            $result['query'] = $this->M_Barang->ShowBarang();
            redirect('C_Barang/index');
        } else {
            echo "<div class='success'>";
            echo "Gagal";
            echo "<a href='" . base_url('index.php/C_Barang/UbahStatus') . "'>Kembali ke Halaman Utama</a>";
            echo "</div>";
        }
    }

    public function HistoryTransfer() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_Menu');
        $result['query'] = $this->M_Barang->GetHistoryTransfer();
        $this->load->view('V_Kiriman', $result);
        $this->load->view('Foot/V_Footer');
    }

    public function HistoryTransferAdmin() {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_MenuAdmin');
        $this->load->view('Head/V_Toggle');
        $result['query'] = $this->M_Barang->GetHistoryTransfer();
        $this->load->view('V_KirimanAdmin', $result);
        $this->load->view('Foot/V_Footer');
    }

    public function KirimBarang($SerialNumber) {
        $this->load->view('Head/V_Header');
        $this->load->view('Head/V_Menu');
        $result['data'] = $this->M_Barang->GetDataBarang($SerialNumber);
        if (filter_input(INPUT_POST, "cancel")) {
            redirect('C_Barang/index');
        } else if (filter_input(INPUT_POST, "submit")) {
            $this->checkFormKirim();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('V_KirimBarang');
            } else {
                $ID = $this->getID();
                $SerialNumber = $this->getSerialNumber();
                $Divisi = $this->getDivisi();
                $TipeBarang = $this->getTipeBarang();
                $NamaBarang = $this->getNamaBarang();
                $Lokasi1 = $this->getLokasi1();
                $Lokasi2 = 'Sedang Dikirim';
                $LokasiTujuan = $this->getLokasi2();
                $LastUpdate = $this->getLastUpdate();
                $Penerima = $this->getPenerima();
                $Pengirim = $this->getPengirim();
                $TanggalKirim = $this->getTanggalKirim();
                $Status = $this->getStatus();

                $result1 = $this->M_Barang->Update($SerialNumber, $Divisi, $TipeBarang, $NamaBarang, $Lokasi1, $Lokasi2, $LastUpdate, $Status);
                $result2 = $this->M_Barang->Transfer($ID, $SerialNumber, $Divisi, $TipeBarang, $NamaBarang, $Lokasi1, $LokasiTujuan, $TanggalKirim, $Pengirim, $Penerima);

                $this->checkResult($result1, $result2);
            }
        } else {
            $this->load->view('V_KirimBarang', $result);
        }
        $this->load->view('Foot/V_Footer');
    }

}