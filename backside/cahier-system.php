<?php
class Cahier_system{

    function show (){

        if($_SESSION['yellow']!==null) {
            $data_in=explode("!",$_SESSION['yellow']);
            $i=1;
            foreach($data_in as $row){
                $row=unserialize($row);
                if (!$row){continue;}
                ?>
                <tr>
                    <td> 
                        <form action="" method="post">
                                <button name="minus" value="<?=$i?>"></button>
                                <?=$i?>
                        </form>
                    </td>
                    <td><?=$row[0]?></td>
                    <td><?=$row[1]." pcs"?></td>
                    <td><?=number_format($row[2],2,",",".")?></td>
                </tr>
                <?php
                $i++;
            }
        
        
        }
       }

    function inputer($connection,$produk_table_databases){
            // ==================================================

        if($_SERVER['REQUEST_METHOD']==="POST"){
            if(isset($_POST['plus'])&&isset($_POST['code-in'])){
                $input_code=$_POST['code-in'];
                
                if($_SESSION['yellow']!==null && $_SESSION['yellow']!=="") {

                    $SESSSION['id_compare']=null;
                if(is_array(explode("!",$_SESSION['yellow']))){
                    $preparer=explode("!",$_SESSION['yellow']);
                    $index_compare=0;
                    foreach($preparer as $row){
                        $row=unserialize($row);
                        if($input_code==$row[0]){
                            $SESSSION['id_compare']=$index_compare;
                            break;
                        }
                    $index_compare++;
                    };
                

                    if($SESSSION['id_compare']!==null){
                        $change=unserialize($preparer[ $SESSSION['id_compare'] ]);
                        $change[1]++;
                        $preparer[ $SESSSION['id_compare'] ]=serialize($change);
                        $_SESSION['yellow']=implode("!",$preparer);
                        $_SESSION['id_compare']=null;
                        header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                    }
                }}
                    else{
                        $statemet=$connection->prepare("SELECT * FROM {$produk_table_databases} WHERE `kode_produk` = '$input_code' ");
                        $statemet->execute();
                        $ready=$statemet->fetch(PDO::FETCH_ASSOC);
                        // kode,unit,harga
                        $go_may=["$ready[kode_produk]",1,$ready['harga']];
                        $go_may=serialize($go_may);
                        $_SESSION['yellow']=$_SESSION['yellow']."!".$go_may;
                        header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                    }


            } 
        }
    }

    function minus(){
        if($_SERVER['REQUEST_METHOD']==="POST"){
            if(isset($_POST['minus'])){
                $minus=$_POST['minus'];
                $preparer_minus=explode("!",$_SESSION['yellow']);

                $charge=unserialize($preparer_minus[$minus]);
                $charge[1]--;
                if($charge[1]==0){
                    array_splice($preparer_minus,$minus,1);
                    $_SESSION['yellow']=implode("!",$preparer_minus);
                    header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                }
                else{
                    $preparer_minus[$minus]=serialize($charge);
                    $_SESSION['yellow']=implode("!",$preparer_minus);
                    header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                }
                
            }
        }
    }

    function navigator(){
        if($_SERVER['REQUEST_METHOD']==="GET"){
            
            if(isset($_GET['reciept'])){
                header("location: view/print.view.php");
            }
            elseif(isset($_GET['cancel-all'])){
                $_SESSION['yellow']='';
                header('Location: '.$_SERVER["PHP_SELF"], true, 303);
            }
            
        }
    }
}
?>