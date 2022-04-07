<?php
require_once 'config.php'; 

?>
<!DOCTYPE html>
<html>
<head>
<style>


</style>

</head>

<body>
<?php

    $id = $_POST["hide"];

    echo $id;
    $result1 = $conn->query("SELECT id FROM zak where id_ucitel=$id");

        if($result1->num_rows > 0){ 
            while($row = $result1->fetch_assoc()){  
                $jmeno = ($row['id']);
            } 
        } 

    $sql = "DELETE from dochazka where id_zak = $jmeno;
    DELETE FROM zak WHERE id_ucitel=$id;
    DELETE FROM ucitel WHERE id=$id;  
         ";

$conn->multi_query($sql);

do {
    if ($result = $conn->store_result()) {
        var_dump($result->fetch_all(MYSQLI_ASSOC));
        $result->free();
    }
} while ($conn->next_result());

   

    ?>
    <script>
        window.location.href = "vgvegvbnmknbjbhbvgvwbjnjbuz45476754FHBKHVGcvhvzgcugiu67564556456CGFXDXFUF7645435465E4E566.php";
    </script>


</body>
</html>