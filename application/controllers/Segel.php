<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Segel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Segel_model');
        $this->load->library('excel');
        // $this->load->helper(array('url', 'html', 'form'));
    }

    public function index()
    {
        // ambil data user pada session
        $data['title'] = 'Segel';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        // query data menu
        $data['row'] = $this->Segel_model->get();
        // $data['count'] = $this->Barang_m->get_count();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcumb', $data);
        $this->load->view('segel/index', $data);
        $this->load->view('templates/footer');
    }

    public function saveimport()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $tgl = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nopb = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $awal = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $masuk = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $keluar = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sisa = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $devisi = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $keterangan = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $data[] = array(
                        'name_type_segels'  => $name,
                        'tgl'               => $tgl,
                        'no_pb_nota'        => $nopb,
                        'awal'              => $awal,
                        'masuk'             => $masuk,
                        'keluar'            => $keluar,
                        'sisa'              => $sisa,
                        'devisi'            => $devisi,
                        'keterangan'        => $keterangan
                    );
                }
            }
            $this->Segel_model->insertimport($data);
            redirect('Segel');
        }
    }


    public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('Segel');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'name_type_segels'  => $row['name'],
                        'tgl'               => $row['tgl'],
                        'no_pb_nota'        => $row['no_pb_no_nota'],
                        'awal'              => $row['awal'],
                        'masuk'             => $row['masuk'],
                        'keluar'            => $row['keluar'],
                        'sisa'              => $row['sisa'],
                        'devisi'            => $row['devisi'],
                        'keterangan'        => $row['keterangan']
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('segels', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('import/');
        }
    }
}
