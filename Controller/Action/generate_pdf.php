<?php

require_once('mpdf60/mpdf.php');

$mpdf = new mPDF('c','A4');




$htmlPdfContent = '<head> <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
<style>
h4{
    margin-bottom: 40px;
}

</style></head>';

$htmlPdfContent .= $_POST['pdfContent'];


$mpdf->writeHTML($htmlPdfContent);


// ---------------------------------------------------------

//Close and output PDF document
$mpdf->Output('example_002.pdf', 'I');







?>