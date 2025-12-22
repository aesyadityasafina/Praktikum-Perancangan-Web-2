<?php
require __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>mPDF BERHASIL 🎉</h1><p>Instalasi sukses.</p>');
$mpdf->Output();
