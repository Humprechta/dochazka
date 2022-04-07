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

    $result = $conn->query("SELECT zak_jmeno FROM zak where id=$id");

     if($result->num_rows > 0){ ?> 
        <?php while($row = $result->fetch_assoc()){ ?> 
         <?php $jmeno = $row['zak_jmeno']; ?>
        <?php } ?> 
<?php }else{ ?> 
    <p class="status error">err...</p> 
<?php } ?>

    



<form style="margin: 0;" action="smazatZak.php" method="post"> <input type="hidden" id="" value ="<?php echo $id; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="<?php echo "smazat ".$jmeno?>"></form>




    <button  id ="demo"> zpět</button>

    <script>

document.getElementById("demo").onclick = function() {myFunction()};


    function myFunction() {

    history.back();
    }

    </script>

    <?php

   // $sql = "DELETE FROM zak WHERE id=$id";
   // $sql = "DELETE FROM dochazka WHERE id_zak=$id";


 ?>
</body>
</html>