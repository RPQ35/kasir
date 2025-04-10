<?php
class Cahier_system{

    function show(){
        $tes=serialize($tes=["12345","4","45000"]);
        $tes=[$tes,$tes];
        $SESSSION['yellow']=implode("!",$tes);

        if($SESSSION['yellow']!=null) {
            $data_in=explode("!",$SESSSION['yellow']);
            $i=1;
            foreach($data_in as $row){
                $row=unserialize($row);
                ?>
                <tr>
                    <td> 
                        <form action="" method="post">
                                <button value="00012 12"></button>
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
        // =====================eror anjir ga ada ini
        $SESSSION['yellow']=1;
        // ==================================================

        if($_SERVER['REQUEST_METHOD']==="POST"){
            $input_code=$_POST['code_in'];
            
            if($SESSSION['yellow']!==null) {

                $SESSSION['id_compare']=null;
            if(is_array(unserialize($SESSSION['yellow']))){
                $preparer=explode("!",$SESSSION['yellow']);
                $index_compare=0;
                foreach($preparer as $row){
                    $row=unserialize($row);
                    if($preparer==$row[0]){
                        $SESSSION['id_compare']=$index_compare;
                        break;
                    }
                $index_compare++;
                };
            }

                if($SESSSION['id_compare']!==null){
                    $change=unserialize($preparer[ $SESSSION['id_compare'] ]);
                    $change=$change[1]++;
                    $preparer[ $SESSSION['id_compare'] ]=serialize($change);
                    $SESSSION['yellow']=implode("!",$preparer);
                    $SESSSION['id_compare']=null;
                }
        
                else{
                    $statemet=$connection->prepare("SELECT * FROM {$produk_table_databases} WHERE `kode_produk`=$input_code ");
                    $statemet->execute();
                    $ready=$statemet->fetch(PDO::FETCH_ASSOC);
                    // kode,unit,harga
                    $go_may=["$ready[kode_produk]",1,$ready['harga']];
                    $go_may=serialize($go_may);
                    $SESSSION['yellow']=$SESSSION['yellow']."!".$go_may;
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
                $SESSSION['yellow']=null;
            }
        }
    }
}
?>