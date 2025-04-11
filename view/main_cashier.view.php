<?php
include 'backside/cahier-system.php';
$panggil=new Cahier_system;
include "db.php";
$panggil->inputer($connetion,$produk_table_databases);
$panggil->minus();
$panggil->navigator();
?>




<table>
    <thead>
        <tr>
            <th class="top-left">no</th>
            <th>nama barang</th
            ><th>unit</th>
            <th class="top-right">harga(pcs)</th>
        </tr>
        <tr class="faker"></tr>
    </thead>
    <tbody>
        <tr style="height: 10px;">
            <td class="top-left"></td>
            <td></td>
            <td></td>
            <td class="top-right"></td>
        </tr>
        
        <?php



        ?>
        
        <!-- <tr>
            <td>
                <form action="" method="post">
                    <button value="00012 12"></button>
                    1
                </form>
            </td>
            <td>00012 12</td>
            <td>2</td>
            <td>20.000</td>
        </tr> -->

        <?php $panggil->show(); ?>
        
        <tr>
            <td class="bottom-left"></td>
            <td></td>
            <td></td>
            <td class="bottom-right"></td>
        </tr>

    </tbody>
    <tr class="faker"></tr>

    <tfoot>
            <tr class="inp">
                <td class="top-left">kode:</td>
                <form action="" method="post">
                    <td>
                        <input type="text" name="code-in" id="code-in">
                    </td>
                    <td>
                        <button class="plus" name="plus"></button>
                    </td>
                </form>
                <td class="top-right"></td>
            </tr>
    </tfoot>
</table>

<section>
    <form action="" method="get">
        <button class="receipt" name="reciept"></button>
        <button class="cancel-all" name="cancel-all"></button>
    </form>
</section>