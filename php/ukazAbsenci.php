<?php
require_once 'config.php'; 

?>
<!DOCTYPE html>
<html>
<head>
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
	}
  li{border: 1px solid red;}
</style>

</head>

<body>
<?php

$id = $_POST["hide"];

$result1 = $conn->query("SELECT zak_jmeno FROM zak where id=$id");

if($result1->num_rows > 0){ 
    while($row = $result1->fetch_assoc()){  
        $jmeno = ($row['zak_jmeno']);
    } 
} 

$result2 = $conn->query("SELECT prichod FROM dochazka where id_zak=$id");

if($result2->num_rows > 0){ 
  ?>
  <table style="width:100%"><tr>
    <td><a>Pro studenta: </a>"<?php echo $jmeno; ?>"</td>
  </tr></table><ol><?php
     while($row = $result2->fetch_assoc()){ ?> 
      <li> <?php echo ($row['prichod']); ?></li>
    <?php } ?> </ol>
<?php }else{ ?> 
<p class="status error">zatím tu jest prázdno...</p> 
<?php } ?>
</body>