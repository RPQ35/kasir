<?php
include 'db.php';


$data_all=$connetion->prepare("SELECT * FROM `{$log_table_databases}` ORDER BY `tanggal` DESC");
$data_all->execute();


?>