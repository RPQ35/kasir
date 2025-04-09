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

}

?>