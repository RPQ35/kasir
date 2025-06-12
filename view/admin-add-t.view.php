<?php
include('backside/admin-e.php');
?>




    <form action="" method="get">
        <button name="newadd">add</button>
    </form>


    <style>
        form.kode_adderi{
    background-color: #4CAF50;
    width: 8vw;
    height: 10vw;
    margin: auto 10;
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 4vb;
    flex-direction: column;
    input{width: 7vw;}
}
    </style>
<table>
    <thead>
        <th>no</th>
        <th>kode_produk</th>
        <th>harga</th>
        <th>unit</th>
    </thead>
    <tbody>
        <?php
        $num=1;
            foreach(explode("!",$_SESSION['list']) as $out){
                $out=unserialize($out);
                if($out==null){continue;}
                ?>
                
                <tr>
                    <td><?=$num?></td>
                    <td><?=$out['kode_produk']?></td>
                    <td><?=$out['harga']?></td>
                    <td><?=$out['stok']?></td>
                </tr>

                <?php
        $num++;    
        }
        ?>
    </tbody>
</table>

<form action="" method="post" class="kode_adderi">
    <div>
        <label for="kode">kode</label>
        <input type="text" name="kode_ad" id="" autofocus>
    </div>
    <button name="add_bum"> add </button>
</form>