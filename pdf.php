<?php

include '../config.php';
	function generateRow(){
		$contents = '';
		$sql="SELECT * FROM reclamation";
		$db = config::getConnexion();
	
		$list = $db->query($sql);
	
		while($row = $list->fetch(PDO::FETCH_ASSOC)){
			$contents .= "
			<tr>
				<td>".$row['Id_R']."</td>
				<td>".$row['id_Client']."</td>
				<td>".$row['Email']."</td>
				<td>".$row['Sujet_R']."</td>
				<td>".$row['Message_R']."</td>
                <td>".$row['Statut_R']."</td>
			</tr>
			";
			
		}
		
		
		

		return $contents;
	}
	

	require_once('../views/tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Generated PDF using TCPDF");
	
    $pdf->setHeaderData('./logo.png',100, 'Sweat Society', 'Tableau des Réclamations ' , array(100,100,100), array(255,255,255));
	
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$pdf->Line(10, 70, 200, 70, array('width' => 0.5, 'color' => array(0,0,0)));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
 $pdf->SetMargins(20, 20, 20, true);
 $pdf->setPrintHeader(true);
 $pdf->setPrintFooter(true);

    $pdf->SetAutoPageBreak(TRUE, 10);
	$pdf->SetFont('times', 'BI', 20);
    $pdf->AddPage();
	
	

	
	
    $content = '';
    $content .= '

	
	
	
	 
		   
    <h1 style=" color: purple; " >Sweat Society</h1>
    <table border="1" cellspacing="0" cellpadding="3">
     <tr>
  <th style=" color: purple; background-color: #D6EEEE; " width="10%">Id réclamation</th>
          
         
          <th style=" color: purple; background-color: #D6EEEE;" width="15%">Id Client</th>
          <th style=" color: purple; background-color: #D6EEEE;" width="20%">Email</th>
          <th style=" color: purple; background-color: #D6EEEE;"  width="15%">Sujet</th>
          <th style=" color: purple; background-color: #D6EEEE;" width="25%">Message</th>
          <th style=" color: purple; background-color: #D6EEEE;"  width="20%">Statut</th>
        
          
     </tr>
		  
      ';
      ob_clean();
    $content .= generateRow();
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('reclamation.pdf', 'I');
    ob_clean();

	



?>