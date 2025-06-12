<?php
include 'db.php';
// include 'table_used_in_data.php';

if ($_SESSION['login'] == true) {

    if (($_SERVER['REQUEST_METHOD'] === "POST") && isset($_POST['log-out'])) {
        session_destroy();
        header('Location: ' . $_SERVER["PHP_SELF"], true, 303);
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admin</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <nav>
            <section class="up">
                <img src="" alt="" class="hexagon">
                <h2><?= $_SESSION['user'] ?></h2>
            </section>
            <form action="" method="post" class="bottom">
                <div></div>
                <div></div>
                <button class="leave" name="log-out" value="1"></button>
            </form>
        </nav>

        <main>

        <?php
        if(isset($_GET['newadd'])){
            include ('view/new-t.view.php');
        }

        else{
            include 'view/admin-add-t.view.php';
        
        
        }
        ?>

        </main>



    </body>

    </html>


<?php

} else {
    header('location:index.php');
}

?>