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

    $sql = "DELETE FROM dochazka WHERE id_zak=$id;
    DELETE FROM zak WHERE id=$id;";

$conn->multi_query($sql);

do {
    if ($result = $conn->store_result()) {
        var_dump($result->fetch_all(MYSQLI_ASSOC));
        $result->free();
    }
} while ($conn->next_result());

   

    ?>
    <script>
        history.go(-2);
    </script>


</body>
</html>