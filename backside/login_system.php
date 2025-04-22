<?php




        $login_check=$connetion->prepare("SELECT * FROM {$user_table_databases} WHERE  `username` = '$username'  AND `password`='$password'");
        $login_check->execute();

        if($login_check->rowCount()!==0){
            $login_check=$login_check->fetch(PDO :: FETCH_ASSOC);
        
            if($login_check['tipe']=="karyawan"){
                $_SESSION['login']=true;
                $_SESSION['user']=$username;
                header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                $_POST['cashier']='a';
                $_SESSION['lupakan']="cashier";
            }
            elseif($login_check['tipe']=='admin'){
                $_SESSION['login']=true;
                $_SESSION['user']=$username;
                header('Location:administrator.php');
            };
            
        }else{
            alert();
            pssst();
        }


?>