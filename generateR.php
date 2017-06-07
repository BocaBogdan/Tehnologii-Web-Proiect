<?php
require_once 'core/init.php';
admin_protect();
require_once 'fpdf.php';

function generate($query)
{
    $result = mysql_query($query);
    if($result){ // daca query-ul nu contine erori
        while($row = mysql_fetch_assoc($result)){ // atat timp cat exista randuri in tabela, le salvez ca un array in $row
            $results_post[] = $row;
        }
    }
    ob_start();
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('times', 'B', 10);
    $pdf->Cell(50, 7, "Description");
    $pdf->Cell(30, 7, "Anounce type");
    $pdf->Cell(40, 7, "Anounce categori");
    $pdf->Cell(40, 7, "Date");
    $pdf->Cell(40, 7, "Anounce city");
    $pdf->Ln();
    $pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    $pdf->Ln();
    foreach ($results_post as $pdf_row) {
        $desc = $pdf_row["description"];
        $type_Add = $pdf_row["Type_Add"];
        $type_Cat = $pdf_row["Type_Categori"];
        $date = $pdf_row["Date"];
        $cityName = $pdf_row["Name_City"];
        $pdf->Cell(50, 7, $desc);
        $pdf->Cell(30, 7, $type_Add);
        $pdf->Cell(40, 7, $type_Cat);
        $pdf->Cell(40, 7, $date);
        $pdf->Cell(40, 7, $cityName);
        $pdf->Ln();
    }
    $pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    $pdf->Output('F', 'filename.pdf');
    ob_end_flush();

    $fp = fopen('results.json', 'w');
    $csv = fopen('results.csv', 'w');
    fwrite($fp, json_encode($results_post));
    foreach ($results_post as $fields) {
        $res_array = (array)$fields;
        fputcsv($csv, $res_array);
    }
    fgets($csv, 4096);
    fclose($csv);
    fclose($fp);

    $fh = fopen('output.html', 'w') or die("can't open file");
    fwrite($fh, '<html><body>');
    fwrite($fh, '<table><tr><th>Description</th><th>Anounce type</th><th>Anounce categori</th><th>Date</th><th>Anounce city</th></tr>');
    foreach ($results_post as $row_html) {
        fwrite($fh, "<tr><td>" . $row_html["description"] . "</td><td>" . $row_html["Type_Add"] . "</td><td>" . $row_html["Type_Categori"] . "</td><td>" . $row_html["Date"] . "</td><td>" . $row_html["Name_City"] . "</td><td></tr>");
    }
    fwrite($fh, "</table>");
    fwrite($fh, '</body></html>');
    fclose($fh);
    //header('Location: admin.php');
}
?>

