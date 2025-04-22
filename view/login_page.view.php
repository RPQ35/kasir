<?php
function alert(){?>

    <div class="alert">
        hmm.. looks like wrong username or pass

        <form action="" method="post">
            <button name="try">Try Again</button>
        </form>
    </div>

<?php
    };
  function pssst(){
    ?>
    <script>
            document.querySelector("#log").style.display="none";
    </script>;
<?php
}
?>

 

<div class="login_tab">
    <h1>Login User</h1>
    <form action="" method="post">
        <label for="">Username</label>
        <input type="text" id="username" name="username" placeholder="Anomali ajaib"> 
        <label for="password">password</label>
        <input type="text" id="password" name="password" placeholder="12@9" required>

        <button name="login" id="log" >Let's in</button>
    </form>
</div>


<?php
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['login'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        include 'backside/login_system.php';
    }
}
?>
