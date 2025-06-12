<style>
    /*---------------adder-----*/
div.addering{
    background-color: #fdd744;
    z-index: 4;
    position:absolute;
    top: 35%;left: 40%;right: 40%; bottom: 35%;
    border-radius: 36px;
    display: flex;
    flex-direction: column;
    box-shadow: 5px 10px 20px black;
    font-size: 3vb;
    height: 35vb;
    width: 50vb;
    text-align: center;
    justify-content: space-around;
    background-size: 40%;
    background-position: center;
    background-repeat: no-repeat;
    animation: poping .5s linear;

    button{
        background-color: #7dcb80;
        border: none;
        border-radius: 36px;
        width: 20vb;
        height: 5vb;
        margin: 0 auto;
        transform: translateY(3vb);
    }
    form{
        display: flex;
        flex-direction: column;
        padding: 2px;
        text-align: start;
    }
}
/* =================================== */
</style>
<?php
include 'db.php';
// $_SESSION['adder']=false;
var_dump($_SESSION['adder']);
if ($_SESSION['adder'] == true) {
?>

    <div class="addering">
        <h3>input barang baru</h3>
        <form action="" method="post">
            <label for="">kode produk</label>
            <input type="text" name="code_p" id="" required>
            <label for="">harga produk</label>
            <input type="text" name="harga_p" id="" required>
            <button name="new_add">add</button>
        </form>

    </div>

    <?php

    if($_SERVER['REQUEST_METHOD']==="POST"){
        if(isset($_POST['new_add'])){
            $code_p = $_POST['code_p'];
            $harga_p = $_POST['harga_p'];
            $zero=0;
            $new=$connetion->prepare("INSERT INTO `product` VALUES (null,:kode_produk, :harga_produk, :stok)");
            $new-> bindParam(':kode_produk', $code_p);
            $new-> bindParam(':harga_produk', $harga_p);
            $new-> bindParam(':stok', $zero);
            $new->execute();
            $_SESSION['adder'] = false;
            unset($_GET['newadd']);
        }
    }

    ?>
<?php
} else {
?>

    <?php
    function alert()
    { ?>

        <div class="alert">
            hmm.. looks like wrong username or pass

            <form action="" method="post">
                <button name="try">Try Again</button>
            </form>
        </div>

    <?php
    };
    function pssst()
    {
    ?>
        <script>
            document.querySelector("#log").style.display = "none";
        </script>;
    <?php
    }
    ?>



    <div class="login_tab">
        <h1>Login admin</h1>
        <form action="" method="post">
            <label for="password">password</label>
            <input type="text" id="password" name="password_ing" placeholder="12@9" required>

            <button name="login" id="log">Let's in</button>
        </form>
    </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['login'])) {
            $password = htmlspecialchars($_POST['password_ing']);

            if ($password == "123@k") {
                $_SESSION['adder'] = true;
            }
        }
    }
    ?>


<?php
}

?>