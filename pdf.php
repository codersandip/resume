<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

date_default_timezone_set("Asia/Kolkata");
$html = file_get_contents('index.html');
$html = str_replace('background-color: #f9f9f9;', 'background-color: white !important;', $html);
$html = str_replace('padding: 0 20px;', 'padding: 0 0;', $html);
$html = str_replace('margin: 20px auto;', 'margin: auto auto;', $html);
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
// $dompdf->setPaper('A4', 'portrait');
$dompdf->setPaper('A4', 'portrait', true, null, 0, 0, 0, 0); // Set margin to 0
$dompdf->render();

// Download PDF
// $dompdf->stream("file.pdf", array("Attachment" => true));

// Get PDF content
$output = $dompdf->output();

// Save file
file_put_contents("Sandip Baliram Tawhare - Resume.pdf", $output);
// file_put_contents( date("Y-m-d-h-i-s-A") . "-Sandip Baliram Tawhare - Resume.pdf", $output);

echo "PDF saved successfully!";