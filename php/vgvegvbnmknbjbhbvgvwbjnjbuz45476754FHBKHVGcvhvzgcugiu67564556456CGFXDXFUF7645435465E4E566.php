<?php
require_once 'config.php'; 

if(!isset($_SESSION["sesA"])){
  header("location:../index.php?err=1");
}
echo "prihlaseno jako admin";


?>

<form style="margin: 0;" action="config.php" method="post"> 
<input type="submit" name="odlasit" value="odhlasit se">
</form>


<?php



//$resultVSE = $conn->query("SELECT ucitel.trida,zak.zak_jmeno FROM ucitel inner join zak on zak_id = ucitel.id ORDER BY ucitel.trida"); 
$result = $conn->query("SELECT trida,ucitel_jmeno,ucitel_psswd,id FROM ucitel ORDER BY trida"); 
$result2 = $conn->query("SELECT trida FROM ucitel ORDER BY trida");
?>

<!DOCTYPE html>
<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
	.flex{
	display: flex;
  text-align:center;
	 justify-content: center;
	}
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align:center;
	}
	.heslo{
	  display: none;
	}
	.hesloZak{
  display: none;
}
input:invalid:focus {
  background-image: linear-gradient(to right, rgba(255,0,0,0.1), rgba(255,0,0,0.1));
}
</style>

<title>administrace</title>
</head>

<body>



<div class = "ucitel" ></div>

<div class = "admin" >

<div class="vytvoreniTridy">
<div class = "flex">
<div style="margin:20px;">
<p>jiz ulozene tridy</p>

<table>
  <tr>
    <th>Třída</th>
    <th>Počet žáků</th>
    <th>Ucitel</th> 
    <th>Heslo</th>
    <th>Smazat třídu</th>
  </tr>
  
  <?php if($result->num_rows > 0){ ?> 
        <?php while($row = $result->fetch_assoc()){ 
          $pocet = $row['id'];
          $sql = "SELECT COUNT(*) FROM zak where id_ucitel = $pocet";
          $result3 = mysqli_query($conn, $sql);
          $count = mysqli_fetch_assoc($result3)['COUNT(*)'];
          ?> 
          <tr><td><?php echo ($row['trida']); ?></td> <td><?php echo $count; ?></td>  <td><?php echo ($row['ucitel_jmeno']); ?></td> <td ><a class="heslo"><?php echo ($row['ucitel_psswd']); ?></a></td><td><form style="margin: 0;" action="smazatTriduPotvrzeni.php" method="post"> <input type="hidden" id="" value ="<?php echo $row['id']; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="smazat záznam"></form> </td></tr>  
        <?php } ?> 
<?php }else{ ?> 
    <p class="status error">nic se nenaslo...</p> 
<?php } ?>

</table>
<br>
<button onclick="ukaz()">ukaz psswd</button>
<button onclick="hide()">schovej psswd</button>
</div>
<hr style="margin:15px;">
<div style="margin:20px;">
<form action="vytvoreniTridy.php" method="post">
  <fieldset>
  <legend>Vytvoření třídy:</legend>
  <label for="">Třída</label>
  <input type="trida" id="" name="trida" length="3" maxlength="3" minlength="3" required><br><br>
  <label for="fname">Jmeno učitele</label>
  <input type="fname" id="fname" name="fname" required><br><br>
  <label for="lname">Heslo učitele</label>
  <input type="password" id="lname" name="psswd" minlength="4" required><br><br>
  <input type="submit" name="submit" value="Ulozit">
</fieldset>
</form>
</div>
</div>
<hr>
<div class="flex">
<div style="margin:20px;">
<p>Žáci</p>
<table>
  <tr>
    <th>Třída</th>
    <th>Jmeno zaka</th> 
    <th>Heslo zaka</th>
	<th>Docházka</th>
  <th>smazat záznam</th>
  </tr>
  <tr>
 
  <?php
require_once 'config.php'; 

$sql = "SELECT * FROM ucitel inner join zak on id_ucitel = ucitel.id ORDER BY ucitel.trida";
$resultVSE2 = $conn->query($sql);
while($row = mysqli_fetch_array($resultVSE2)){
  
?> <tr><td><?php echo $row['trida']; ?></td> <td><?php echo $row['zak_jmeno']; ?></td>  <td><r class="hesloZak"><?php echo $row['zak_psswd']; ?></r><input type="checkBox" class="zaskrtnuto"></td><td><form style="margin: 0;" action="ukazAbsenci.php" method="post"> <input type="hidden" id="" value ="<?php echo $row['id']; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="Docházka"></form></td> <td><form style="margin: 0;" action="smazatZakPotvrzeni.php" method="post"> <input type="hidden" id="" value ="<?php echo $row['id']; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="smazat záznam"></form> </td></tr> 

<?php
}
?>
</table>
<br>
<button onclick="ukazZak()">Ukaz psswd</button>
<button onclick="hideZak()">Schovej psswd</button>
</div>
<hr style="margin:15px;">
<div style="margin:20px;">
<form action="zapisStudenta.php" method="post">
  <fieldset>
<legend>Zápis studenta:</legend>
<label for="">Jmeno zaka</label>
  <input type="zakJmeno" id="" name="zakJmeno" required><br><br>
  <label for="psswdZak">Heslo Zaka</label>
  <input type="password" id="" name="psswdZak" minlength="4" required><br><br>
  <select name="tridos" id="tridos">
<?php if($result2->num_rows > 0){ ?> 
        <?php while($row = $result2->fetch_assoc()){ ?> 
          <option value="<?php echo ($row['trida']);?>"><?php echo ($row['trida']);?></option>
        <?php } ?> 
<?php }else{ ?> 
    <p class="status error">nic se nenaslo...</p> 
<?php } ?>
</select>
<br><br>
  <input type="submit" name="submit" value="Ulozit">
</fieldset>
</form>
</div>
</div>
</div>



</div>

<div style="">
            <form id="" action="export.php" method="post">
            <input type="submit" value="Export dat">
            </form>
          </div>

<script>
//admin
//hesla ucitelu
var numClass = $('.heslo').length
function ukaz(){
console.log(numClass);
for(var i = 0; i < numClass;i++){
document.getElementsByClassName("heslo")[i].style.display = "block";
}
}
function hide(){
console.log(numClass);
for(var i = 0; i < numClass;i++){
document.getElementsByClassName("heslo")[i].style.display = "none";
}
}
//hesla zaku
var numClassZak = $('.hesloZak').length
function ukazZak(){
for(var i = 0; i < numClassZak;i++){
var skrtnuto = document.getElementsByClassName("zaskrtnuto")[i].checked;
console.log(skrtnuto);
if(skrtnuto == true){
document.getElementsByClassName("hesloZak")[i].style.display = "block";
}
}
}
function hideZak(){
  localStorage.clear();
for(var i = 0; i < numClassZak;i++){
var skrtnuto = document.getElementsByClassName("zaskrtnuto")[i].checked;
console.log(skrtnuto);
if(skrtnuto == true){
document.getElementsByClassName("hesloZak")[i].style.display = "none";
}
}
}



</script>
</body>