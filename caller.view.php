<?php
    
    if($_SESSION['lupakan']=='data'){
        if($_SESSION['seelct']!=="cashier"){header('Location: '.$_SERVER["PHP_SELF"], true, 303);}
        include 'view/data_daily.view.php';
        $_SESSION['seelct']="cashier";
    }
    

    elseif($_SESSION['lupakan']=="log-out") {
        $_SESSION['login'] = false;
        session_unset();
    }

    elseif($_SESSION['lupakan']=="cashier"){
        if($_SESSION['seelct']!=="data"){header('Location: '.$_SERVER["PHP_SELF"], true, 303);}
        include 'view/main_cashier.view.php';
        $_SESSION['seelct']="data";
    }

?>
            
            
       