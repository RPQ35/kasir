<?php

$caller_list = $connetion->prepare("SELECT * FROM {$produk_table_databases} ORDER BY `id` DESC ");
$caller_list->execute();
$_SESSION['list'] = null;
foreach ($caller_list->fetchAll(PDO::FETCH_ASSOC) as $a) {
    $_SESSION['list'] = $_SESSION['list'] . "!" . serialize($a);
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['add_bum'])) {
        $kode = $_POST['kode_ad'];
        $check_bum = $connetion->prepare("SELECT * FROM {$produk_table_databases} WHERE `kode_produk` = '$kode'");
        $check_bum->execute();
        if ($check_bum->rowCount() > 0) {

            foreach ($check_bum->fetchAll(PDO::FETCH_ASSOC) as $z) {
                if ($z == null) {
                    continue;
                }
                $stok = $z['stok'];
                $stok++;
                echo "<script>console.log('$stok');</script>";
                $pushadd = $connetion->prepare("UPDATE {$produk_table_databases} SET `stok` = '{$stok}' WHERE `kode_produk` = '$kode'");
                $pushadd->execute();
                header('Location: '.$_SERVER["PHP_SELF"], true, 303);
            }
        }
    }
}
