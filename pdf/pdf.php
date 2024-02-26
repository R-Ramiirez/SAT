
<?php
    //Configuracion de documento en PDF
    ob_start();

    require('formatopdf.php');

    $html = ob_get_clean();

    require '../vendor/autoload.php';
    use Dompdf\Dompdf;

    $dompdf = new Dompdf('p','A4','es','true','UTF-8');

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');

    $dompdf->render();

    $dompdf->stream("../includes/inicio.php", array("Attachment" => false));

?>