<?php
require_once 'config.php'; 

if(!isset($_SESSION["sesA"])){
  header("location:../index.php?err=1");
}
           
        $query = $conn->query("SELECT zak.id as idecko,zak_jmeno,trida FROM ucitel inner join zak on id_ucitel = ucitel.id ORDER BY ucitel.trida");
 
if($query->num_rows > 0){ 
    $delimiter = ";"; 
    $filename = "mexport_zaku" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id zaka','jmeno','trida','prichod'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $array ="prichody:";
        $id = $row['idecko'];
        $jmeno = $row['zak_jmeno'];
        $trida = $row['trida'];

        $query2 = $conn->query("SELECT prichod FROM dochazka where id_zak='$id'");
        if($query2->num_rows > 0){ 
            while($row = $query2->fetch_assoc()){ 
                $prichod = $row['prichod'];
                $array=$array.";".$prichod;
            }
        }

        $lineData = array($id,$jmeno, $trida,$array); 
        fputcsv($f, $lineData, $delimiter); 
        $array = "";
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
    exit;
} 

    
    header("location:vgvegvbnmknbjbhbvgvwbjnjbuz45476754FHBKHVGcvhvzgcugiu67564556456CGFXDXFUF7645435465E4E566.php");
    exit;

?>