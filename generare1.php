<?php
require_once 'core/init.php';
admin_protect();
mysql_query( "DROP TABLE `generate`" );
mysql_query("CREATE TABLE `generate` ( user_id INT, username VARCHAR(255), total INT )");
$result = mysql_query("SELECT lpost.user_id, users.username, COUNT(lpost.user_id) AS total FROM lpost JOIN users ON lpost.user_id=users.user_id WHERE lpost.type = 1 GROUP BY lpost.user_id LIMIT 0,5");
while ($row = mysql_fetch_array($result)) {
    $query = "INSERT INTO `generate` VALUES( " . $row["user_id"] . ", '" . $row["username"] . "'," . $row["total"]. ")";
    mysql_query( $query );
}
$result = mysql_query("SELECT * FROM `generate`");
echo '<pre>';
$results_post = [];
if($result){ // daca query-ul nu contine erori
    while($row = mysql_fetch_assoc($result)){ // atat timp cat exista randuri in tabela, le salvez ca un array in $row
        $results_post[] = $row;
    }
}

ob_start();
require_once 'fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(25,7,"User id");
$pdf->Cell(30,7,"Username title");
$pdf->Cell(40,7,"Anounces number");
$pdf->Ln();
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
foreach ($results_post as $pdf_row) {

    $user_id = $pdf_row["user_id"];
    $username =  $pdf_row["username"];
    $total =  $pdf_row["total"];
    $pdf->Cell(25,7,$user_id);
    $pdf->Cell(30,7,$username);
    $pdf->Cell(40,7,$total);
    $pdf->Ln();
}
$pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
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
fwrite($fh, '<table><tr><th>User id</th><th>Username</th><th>Total</th></tr>');
foreach ($results_post as $row_html){
    fwrite($fh, "<tr><td>".$row_html["user_id"]."</td><td>".$row_html["username"]."</td><td>".$row_html["total"]."</td><td></tr>");
}
fwrite($fh, "</table>");
fwrite($fh, '</body></html>');
fclose($fh);
?>
<script type="text/javascript">
    window.location.href = 'admin.php';
</script>