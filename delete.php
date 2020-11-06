<?php 
    require "confly.php";
    
    $pdostatement = $pdo -> prepare("DELETE FROM todo WHERE id=".$_GET['id']);
    $pdostatement -> execute();

    header("Location: index.php");


?>