<?php
require_once 'config.php'; 

    if(isset($_POST["submit"])){ 
        $tRida = $_POST['tridos'];
        $jMeno0 = $_POST['zakJmeno'];
        $hEslo0 = $_POST['psswdZak'];

        $sql = "insert into zak(id_ucitel,zak_jmeno,zak_psswd) values
        ((select id from ucitel 
        where trida ='$tRida'),'$jMeno0','$hEslo0');";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        ?>
        
        <script>
            alert("Student <?php echo $jMeno0;?> uspěšně zapsáan...");
            history.back();
        </script>
        
        <?php
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$conn->close();

?>