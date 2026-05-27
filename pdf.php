<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

date_default_timezone_set("Asia/Kolkata");

exec("php index.php", $output);
file_put_contents('index.html', str_replace("   ", "", $output));

$html = file_get_contents('index.html');
$html = str_replace('background-color: #f9f9f9;', 'background-color: white !important;', $html);
$html = str_replace('padding: 0 20px;', 'padding: 0 0;', $html);
$html = str_replace('margin: 20px auto;', 'margin: auto auto;', $html);

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait', true, null, 0, 0, 0, 0); // Set margin to 0
$dompdf->render();

// Download PDF
// $dompdf->stream("Sandip Baliram Tawhare - Resume.pdf", array("Attachment" => false));
// return '';


// Save file
file_put_contents("Sandip Baliram Tawhare - Resume.pdf", $output);
// file_put_contents( date("Y-m-d-h-i-s-A") . "-Sandip Baliram Tawhare - Resume.pdf", $output);

echo "PDF saved successfully!";