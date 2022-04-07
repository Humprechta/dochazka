<?php
require_once 'config.php'; 
    ?> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    .flex{
        display: flex;
        text-align:center;
        justify-content: center;
	}
    a{
        color:green;
        font-size:22px;
    }
    .error{
        color:red;
        font-size:22px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
	}
    .hesloZak{
         display: none;
}
</style>
<?php

    if(isset($_POST["prihlasit"])){ 
        $jmeno = $_POST['fname'];
        $heslo = $_POST['psswd'];

        $shheslo = sha1($heslo);

        $ad = $conn->query("SELECT jmeno,heslo FROM admin where jmeno='$jmeno' and heslo ='$shheslo'");

        if($ad->num_rows > 0){ ?> 
            <?php while($row = $ad->fetch_assoc()){ 
                $_SESSION["sesA"] = "adminos44";
                ?>
               <script>
               window.location.href = "vgvegvbnmknbjbhbvgvwbjnjbuz45476754FHBKHVGcvhvzgcugiu67564556456CGFXDXFUF7645435465E4E566.php";
           </script>
           <?php
            }  
     }
            $sql = "insert into dochazka(id_zak,prichod) values
            ((select id from zak 
            where zak_jmeno ='$jmeno' and zak_psswd ='$heslo'),Now());";

            if ($conn->query($sql) === TRUE) {
            ?> <a> <?php echo "Uspesne zaznamenáno.";?> </a>

                <form style="margin: 0;" action="config.php" method="post"> 
                <input type="submit" name="odlasit" value="odhlasit se">
                </form>
            
        
            
            <?php
            } else {

                $ucitele = $conn->query("SELECT trida,id FROM ucitel where ucitel_jmeno = '$jmeno' and ucitel_psswd = '$heslo'");

                 if($ucitele->num_rows > 0){ ?> 
                    <?php while($row = $ucitele->fetch_assoc()){ ?> 
                      <?php $id_ucitel = $row['id']; $trida = $row['trida']; ?>
                      <p class="">Prihlasen jako: <?php  echo $jmeno;echo" (";echo $trida;echo")"; ?> </p> 
                        <form style="margin: 0;" action="config.php" method="post"> 
                        <input type="submit" name="odlasit" value="odhlasit se">
                        </form>
                    
                    <?php } ?> 
            <?php

                $zaci = $conn->query("SELECT * FROM zak where id_ucitel = '$id_ucitel'");

                ?>
                <div class="flex">
                    <div style="margin:20px;">
                        <table>
                        <tr>
                            <th>Jmeno zaka</th> 
                            <th>Heslo zaka</th>
                            <th>Docházka</th>
                            <th>smazat záznam</th>
                        </tr>
                        <tr>
                    <?php

                    if($zaci->num_rows > 0){ ?> 
                        <?php while($row = $zaci->fetch_assoc()){ ?> 
                        
                            <tr> <td><?php echo $row['zak_jmeno']; ?></td>  <td><r class="hesloZak"><?php echo $row['zak_psswd']; ?></r><input type="checkBox" class="zaskrtnuto"></td><td><form style="margin: 0;" action="ukazAbsenci.php" method="post"> <input type="hidden" id="" value ="<?php echo $row['id']; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="Docházka"></form></td> <td><form style="margin: 0;" action="smazatZakodUcitelePotvrzeni.php" method="post"> <input type="hidden" id="" value ="<?php echo $row['id']; ?>" class ="hide" name="hide" size="1"><input type="submit" name="submit" value="smazat záznam"></form> </td></tr>
                        <?php } ?> 
                <?php }else{ ?> 
                    <p class="status error">err...</p> 
                <?php } ?>
                </table>
                        <br>
                        <button onclick="ukazZak()">Ukaz psswd</button>
                        <button onclick="hideZak()">Schovej psswd</button>
                        </div>
                        <hr style="margin:15px;">
                        <div style="margin:20px;">
                            <p>Zápis studenta:</p>
                            <form action="zapisStudenta.php" method="post">
                            <label for="">Jmeno zaka</label>
                            <input type="zakJmeno" id="" name="zakJmeno" required><br><br>
                            <label for="psswdZak">Heslo Zaka</label>
                            <input type="password" id="" name="psswdZak" minlength="4" required><br><br>
                            <select name="tridos" id="tridos">
                            
                                    <option value="<?php echo $trida;?>"><?php echo $trida;?></option>
                             
                            </select>
                            <br><br>
                            <input type="submit" name="submit" value="Ulozit">
                            </form>
                            </div>
                        </div>
                <?php
                
            }else{ ?> 
                <p class="status error">spatne jmeno/heslo, zkuste to znovu...</p> 
            <?php } 
            } 
        

    }

    ?>
        <script>
            
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
        for(var i = 0; i < numClassZak;i++){
        var skrtnuto = document.getElementsByClassName("zaskrtnuto")[i].checked;
        console.log(skrtnuto);
        if(skrtnuto == true){
        document.getElementsByClassName("hesloZak")[i].style.display = "none";
        }
        }
        }
        </script>
    <?php

$conn->close();

?>