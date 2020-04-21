<?php

include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'gender');
$sheet->setCellValue('D1', 'nisn');
$sheet->setCellValue('E1', 'nik');
$sheet->setCellValue('F1', 'tmpt_lahir');
$sheet->setCellValue('G1', 'tgl_lahir');
$sheet->setCellValue('H1', 'no_akta');
$sheet->setCellValue('I1', 'agama');
$sheet->setCellValue('J1', 'kwn');
$sheet->setCellValue('K1', 'khusus');
$sheet->setCellValue('L1', 'alamat');
$sheet->setCellValue('M1', 'RT');
$sheet->setCellValue('N1', 'RW');
$sheet->setCellValue('O1', 'dusun');
$sheet->setCellValue('P1', 'kelurahan');
$sheet->setCellValue('Q1', 'kecamatan');
$sheet->setCellValue('R1', 'kode_pos');
$sheet->setCellValue('S1', 'tempat_tinggal');
$sheet->setCellValue('T1', 'transportasi');
$sheet->setCellValue('U1', 'kks');
$sheet->setCellValue('V1', 'anake');
$sheet->setCellValue('W1', 'kps');
$sheet->setCellValue('X1', 'no_kps');
 
$query = mysqli_query($koneksi,"select * from form");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nama']);
	$sheet->setCellValue('C'.$i, $row['gender']);
	$sheet->setCellValue('D'.$i, $row['nisn']);	
	$sheet->setCellValue('E'.$i, $row['nik']);
	$sheet->setCellValue('F'.$i, $row['tmpt_lahir']);
	$sheet->setCellValue('G'.$i, $row['tgl_lahir']);	
	$sheet->setCellValue('H'.$i, $row['no_akta']);
	$sheet->setCellValue('I'.$i, $row['agama']);
	$sheet->setCellValue('J'.$i, $row['kwn']);	
	$sheet->setCellValue('K'.$i, $row['khusus']);
	$sheet->setCellValue('L'.$i, $row['alamat']);
	$sheet->setCellValue('M'.$i, $row['RT']);	
	$sheet->setCellValue('N'.$i, $row['RW']);
	$sheet->setCellValue('O'.$i, $row['dusun']);
	$sheet->setCellValue('P'.$i, $row['kelurahan']);	
	$sheet->setCellValue('Q'.$i, $row['kecamatan']);
	$sheet->setCellValue('R'.$i, $row['kode_pos']);
	$sheet->setCellValue('S'.$i, $row['tempat_tinggal']);	
	$sheet->setCellValue('T'.$i, $row['transportasi']);
	$sheet->setCellValue('U'.$i, $row['kks']);
	$sheet->setCellValue('V'.$i, $row['anake']);	
	$sheet->setCellValue('W'.$i, $row['kps']);
	$sheet->setCellValue('X'.$i, $row['no_kps']);	
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:X'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pendaftaran.xlsx');

?>