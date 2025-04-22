<?php

include "table_used_in_data.php";
include "db.php";
// include 'db.php';
ini_set('display_errors', 0);       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="aset/logo.png" type="image/x-icon">
</head>

<body>

    <?php
    // var_dump(explode("!",$_SESSION['yellow']));
    if ($_SESSION['login'] == true) { 
        // ->
        if($_SERVER['REQUEST_METHOD']==="POST"){
            // ->
                if(isset($_POST['data'])){$_SESSION['lupakan']="data";}
                    elseif(isset($_POST['log-out'])) {$_SESSION['lupakan']="log-out";}
                        elseif(isset($_POST['cashier'])){$_SESSION['lupakan']="cashier";}
        }
        ?>

        <nav>
            <section class="up">
                <img src="" alt="" class="hexagon">
                <h2><?=$_SESSION['user'] ?></h2>
            </section>
            <form action="" method="post"  class="bottom">
                <button></button>
                <button class="<?= $_SESSION['seelct'] ?>" name="<?= $_SESSION['seelct'] ?>" value="2"></button>
                <button class="leave" name="log-out" value="1"></button>
            </form>
        </nav>

        <main>

            <?php
            require "caller.view.php";
            ?>


        </main>
    <?php } else {
        include 'view/login_page.view.php';
    }
    ?>

</body>

</html>