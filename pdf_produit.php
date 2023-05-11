<?php

include '../config.php';

function getProductsTableRows()
{
    $db = config::getConnexion();
    $stmt = $db->query('SELECT * FROM produit');
    $rows = '';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows .= "<tr><td>{$row['nom_produit']}</td><td>{$row['prix_produit']}</td></tr>";
    }

    return $rows;
}

require_once 'tcpdf/tcpdf.php';

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Tableau des Produits');
$pdf->SetHeaderData('tcpdf/logo.jpg', 1, 'SWEAT SOCIETY', 'Tableau des Produits', array(100, 100, 100), array(255, 255, 255));
$pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(20, 20, 20, true);
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();
// Load the logo image
$logo = 'logo.jpg';

// Set the header data
$pdf->setHeaderData($logo, 70, 'SWEAT SOCIETY', 'Tableau des Produits', array(100, 100, 100), array(255, 255, 255));
// Set the position of the logo
$pdf->Image($logo, $pdf->getPageWidth() - 35, 0, 30, 0, '', '', '', false, 300, '', false, false, 0, false, false, false);







$content = '
    <h4></h4>
    <div style="text-align:center;">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr style="background-color: #ddd;">
                    <th width="50%">Nom produit</th>
                    <th width="50%">Prix produit</th>
                </tr>
            </thead>
            <tbody>
                ' . getProductsTableRows() . '
            </tbody>
        </table>
    </div>
';
ob_clean();

$pdf->SetFont('times', 'BI', 20);
$pdf->writeHTML($content);
$pdf->Output('livreurs.pdf', 'I');
ob_clean();
