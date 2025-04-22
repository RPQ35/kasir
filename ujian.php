<?php

// $data=[["data1"],["data2"]];
// echo($data[1][0]);

include 'db.php';
include 'table_used_in_data.php';

$login_check=$connetion->prepare("SELECT * FROM {$user_table_databases} WHERE  `username` = 'ani'  AND `password`='123'");
$login_check->execute();


if($login_check->rowCount()!==0){
    $login_check=$login_check->fetch(PDO :: FETCH_ASSOC);
    var_dump($login_check);

}

else{
    echo "nama tidak ada ";
}





?>