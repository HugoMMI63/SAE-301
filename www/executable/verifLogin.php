<?php

$mp = $_POST["mp"];
$login = $_POST["login"];

if ($mp =="admin" && $login =="admin") {
    header('Location:../stageAdmin.php');  
    exit();
}
else {
    header('Location:../LoginAdmin.php');
    exit();
}
?>