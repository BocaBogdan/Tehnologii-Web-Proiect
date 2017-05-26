<?php 
require_once 'core/init.php';

$obiecte = $database;
$results_post = ('lpost', $where = array('user_id','LIKE','%'));
ob_start();
	require_once 'fpdf.php';
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('times','B',10);
	$pdf->Cell(25,7,"Post id");
	$pdf->Cell(30,7,"Post title");
	$pdf->Cell(40,7,"Picture name");
	$pdf->Cell(30,7,"Area");
	$pdf->Cell(30,7,"Description");
	$pdf->Cell(30,7,"user_id");
	$pdf->Ln();
	$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
	$pdf->Ln();
	foreach ($results_post as $pdf_row) {
	        
	            $postid = $pdf_row->lpost_id;
	            $title =  $pdf_row->ptitle;
	            $picture =  $pdf_row->image;
	            $desc =  $pdf_row->description;
				$area =  $pdf_row->area;
	            $user_id = $pdf_row->user_id;
	            $pdf->Cell(25,7,$postid);
	            $pdf->Cell(30,7,$title);
	            $pdf->Cell(40,7,$picture);
	            $pdf->Cell(30,7,$area);
	            $pdf->Cell(30,7,$desc);
	            $pdf->Cell(30,7,$user_id); 
	            $pdf->Ln(); 
	        }
	 $pdf->Output('F','filename.pdf');
	 ob_end_flush();



	$fp = fopen('results.json', 'w');
	$csv = fopen('results.csv', 'w');
	fwrite($fp, json_encode($results_post));
	foreach ($results_post as $fields) {
		$res_array = (array) $fields;
	    fputcsv($csv, $res_array);
	
	}
	fgets($csv, 4096);
	fclose($csv);
	fclose($fp);

	$fh = fopen('output.html', 'w') or die("can't open file");
	fwrite($fh, '<html><body>');
	fwrite($fh, '<table><tr><th>Post id</th><th>Post title</th><th>Picture name</th><th>Area</th><th>Description</th><th>User id</th></tr>');
	foreach ($results_post as $row_html){
		fwrite($fh, "<tr><td>$row_html->post_id</td><td>$row_html->post_title</td><td>$row_html->picture</td><td>$row_html->Area</td><td>$row_html->Description</td><td>$row_html->user_id</td></tr>");	
	}
	fwrite($fh, "</table>");
	fwrite($fh, '</body></html>');
	fclose($fh);
	?>
	<script type="text/javascript">
		window.location.href = 'home.php';
	</script>