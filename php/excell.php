<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Classes/PHPExcel.php");

// Обрабатываем хэши выгрузки
$hash = $_GET['hash'];
if($hash=='all') {
      date_default_timezone_set('Europe/Moscow');
      if (PHP_SAPI == 'cli')
      	die('This example should only be run from a Web Browser');
      require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
      $objPHPExcel = new PHPExcel();
      // Set document properties
      $objPHPExcel->getProperties()->setCreator("Мониторинг-штрафов.РФ")
      							 ->setLastModifiedBy("AV")
      							 ->setTitle("Office 2007 XLSX")
      							 ->setSubject("Office 2007 XLSX Test Document")
      							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
      							 ->setKeywords("office 2007 openxml php")
      							 ->setCategory("Test result file");
      // Add some data
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'Hello')
                  ->setCellValue('B2', 'Привет!!! world!')
                  ->setCellValue('C1', 'Hello')
                  ->setCellValue('D2', 'world!');
      // Miscellaneous glyphs, UTF-8
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A4', 'Miscellaneous glyphs')
                  ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
      // Rename worksheet
      $objPHPExcel->getActiveSheet()->setTitle('Экспорт всех найденных штрафов');
      // Set active sheet index to the first sheet, so Excel opens this as the first sheet
      $objPHPExcel->setActiveSheetIndex(0);
      // Redirect output to a client’s web browser (Excel5)
      header('Content-Type: application/vnd.ms-excel');
      $date_now = date('d.m.Y', time());
      header('Content-Disposition: attachment;filename="Отчет по всем найденным штрафам, '.$date_now.'.xls"');
      header('Cache-Control: max-age=0');
      header('Cache-Control: max-age=1');
      header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
      header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header ('Pragma: public'); // HTTP/1.0
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $objWriter->save('php://output');
      exit;
} else {
  // echo $hash;
  $q_excell_export_objects = sprintf("SELECT * FROM excell_export_objects WHERE hashick = '".$hash."' AND user_id = '".$_SESSION['user_id']."'");
  $r_excell_export_objects = mysql_query($q_excell_export_objects);
  $n_excell_export_objects = mysql_numrows($r_excell_export_objects);

  if ($n_excell_export_objects > 0) {
      for ($i = 0; $i < $n_excell_export_objects; $i++) {
          $excell_export_objects_objs = htmlspecialchars(mysql_result($r_excell_export_objects, $i, "excell_export_objects.objs"));
          $excell_export_objects_id = htmlspecialchars(mysql_result($r_excell_export_objects, $i, "excell_export_objects.id"));
      }
  };
  date_default_timezone_set('Europe/Moscow');
  if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');
  require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
  $objPHPExcel = new PHPExcel();
  // Set document properties
  $objPHPExcel->getProperties()->setCreator("Мониторинг-штрафов.РФ")
                 ->setLastModifiedBy("AV")
                 ->setTitle("Office 2007 XLSX")
                 ->setSubject("Office 2007 XLSX Test Document")
                 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                 ->setKeywords("office 2007 openxml php")
                 ->setCategory("Test result file");
  // Add some data
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A1', 'Hello')
              ->setCellValue('B2', 'Привет!!! world!')
              ->setCellValue('C1', 'Hello')
              ->setCellValue('D2', 'world!');
  // Miscellaneous glyphs, UTF-8
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A4', 'Miscellaneous glyphs')
              ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
  // Rename worksheet
  $objPHPExcel->getActiveSheet()->setTitle('Экспорт всех найденных штрафов');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="01simple.xls"');
  header('Cache-Control: max-age=0');
  header('Cache-Control: max-age=1');
  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header ('Pragma: public'); // HTTP/1.0
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
  $objWriter->save('php://output');
  exit;
}
 ?>
