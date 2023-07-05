<?php
defined('BASEPATH')OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_excel extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    function export_data_siswa()
    {
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

         // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ]
        ];
        
        // manually set table data value
        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A1:H1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ffea00');

        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($style_col);

        $spreadsheet
            ->getActiveSheet()
            ->getStyle('A1:H1')->applyFromArray($style_row);
            
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(TRUE);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(TRUE);

        $sheet->setCellValue('A1', 'Nama Siswa'); 
        $sheet->setCellValue('B1', 'Kelas');
        $sheet->setCellValue('C1', 'Telepon');
        $sheet->setCellValue('D1', 'Alamat Siswa');
        $sheet->setCellValue('E1', 'Nama Perusahaan');
        $sheet->setCellValue('F1', 'Alamat Perusahaan');
        $sheet->setCellValue('G1', 'Surat Permohonan');
        $sheet->setCellValue('H1', 'Surat Balasan');

        //Load Model M_siswa
        $this->load->model('M_siswa');
        $siswa = $this->M_siswa->get_semua_siswa();
        $no = 2;
        foreach($siswa->result() as $row){
            $sheet->setCellValue('A'.$no, $row->siswa_nama); 
            $sheet->setCellValue('B'.$no, $row->siswa_kelas);
            $sheet->setCellValue('C'.$no, $row->siswa_telepon);
            $sheet->setCellValue('D'.$no, $row->siswa_alamat);
            $sheet->setCellValue('E'.$no, $row->nama_perusahaan);
            $sheet->setCellValue('F'.$no, $row->alamat_perusahaan);
            $sheet->setCellValue('G'.$no, $row->surat_permohonan);
            $sheet->setCellValue('H'.$no, $row->surat_balasan);

            $no += 1;
        }
        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'data-siswa'.date("YmdHis"); // set filename for excel file to be exported
 
        // header('Content-Type: application/vnd.ms-excel'); // generate excel file
        // header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        // header('Cache-Control: max-age=0');
        
        $path = 'assets/'.$filename.".xlsx";
        // file_put_contents($path);
        $writer->save($path);	// download file 
        
        redirect($path);
    }
}