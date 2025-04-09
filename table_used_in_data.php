<?php

// ========== sql thing ===================//
$username="root";
$password="live";
// ========================================//

$system_databses="kasir";
// databases used in app

// =========== table =============//

$produk_table_databases="produk";
// -> id   (int ,AI ,PK)
// -> kode_produk (varchar[255],not null)
// -> harga(int,not null)
// -> stok(int,not null)
// 
// ==> $SESSSION['yellow'] 


$user_table_databases="user";
// id   (int ,AI ,PK)
// -> username(varchar[255],not null)
// -> password(varchar[255],not null)



$log_table_databases="log";
// -> id   (int ,AI ,PK)
// -> kode_produk (varchar[255],not null)
// -> harga int,not null)
// -> tanggal (timestamp)
// -> kode_struk(int ,not null)
// -> kasir(varchar[255])


?>