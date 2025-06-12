<?php

include '../db.php';

$loggers=explode("!",$_SESSION['yellow']);
foreach($loggers as $loge){
    if($loge==null){continue;}
    $loge=unserialize($loge);
    var_dump($loge);
    $log_into=$connetion->prepare("INSERT INTO {$log_table_databases} VALUES (null,:kode_p ,:harga ,now(),:kode_s ,:kasir)");
    $log_into-> bindParam(':kode_p',$loge['0']);
    $log_into-> bindParam(':harga',$loge['1']);
    $log_into-> bindParam(':kode_s',$_SESSION['struk']);
    $log_into-> bindParam(':kasir',$_SESSION['user']);
    $log_into-> execute();


    $kode = $loge['0'];
        $check_bum = $connetion->prepare("SELECT * FROM {$produk_table_databases} WHERE `kode_produk` = '$kode'");
        $check_bum->execute();
        if ($check_bum->rowCount() > 0) {

            foreach ($check_bum->fetchAll(PDO::FETCH_ASSOC) as $z) {
                if ($z == null) {
                    continue;
                }
                $stok = $z['stok'];
                $stok--;
                echo "<script>console.log('$stok');</script>";
                $pushadd = $connetion->prepare("UPDATE {$produk_table_databases} SET `stok` = '{$stok}' WHERE `kode_produk` = '$kode'");
                $pushadd->execute();
            }
        }
}

header("location:../");

?>