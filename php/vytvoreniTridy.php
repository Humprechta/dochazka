<?php
require_once 'config.php'; 
echo "tady to facha";

    if(isset($_POST["submit"])){ 
        echo "za submit ";
        $tRida = $_POST['trida'];
        $jMeno0 = $_POST['fname'];
        $hEslo0 = $_POST['psswd'];

        $sql = "INSERT INTO ucitel (trida, ucitel_jmeno, ucitel_psswd)
        VALUES ('$tRida', '$jMeno0', '$hEslo0')";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
            alert("Třída <?php echo $tRida;?> uspěšně vytvořena...");
            history.back();
        </script>
        <?php
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>