<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

date_default_timezone_set("Asia/Kolkata");
$html = file_get_contents('index.html');

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Download PDF
// $dompdf->stream("file.pdf", array("Attachment" => true));

// Get PDF content
$output = $dompdf->output();

// Save file
file_put_contents("Sandip Baliram Tawhare - Resume.pdf", $output);
file_put_contents( date("Y-m-d-h-i-s-A") . "-Sandip Baliram Tawhare - Resume.pdf", $output);

echo "PDF saved successfully!";