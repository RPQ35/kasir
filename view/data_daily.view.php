<?php
include 'backside/data_shower.php';
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<article>

        <section class="s1">
            <div>
                
            </div>
            <div>

            </div>
        </section>
        <section class="s2">
            <table>
                <thead>
                <th class="top-left">no</th>
                <th>nama barang</th>
                <th>harga barang (pcs)</th>
                <th>tanggal</th>
                <th class="top-right">receipt number</th>
                </thead>
                <tbody>
                    <tr style="height: 10px;">
                        <td class="top-left"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="top-right"></td>
                    </tr>

                    <?php
                        $index=1;
                    foreach($data_all->fetchAll(PDO::FETCH_ASSOC) as $f){
                        ?>
                            <tr>
                                <td><?=$index?></td>
                                <td><?=$f['kode_produk']?></td>
                                <td><?=$f['harga']?></td>
                                <td><?=$f['tanggal']?></td>
                                <td><?=$f['kode_struk']?></td>
                            </tr>
                        <?php $index++;
                    }
                    
                    ?>


                    <tr>
                        <td class="bottom-left"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bottom-right"></td>
                    </tr>
                </tbody>
            </table>

            <div class="chart-container">
                
                <canvas id="BarChart">
                    
            </canvas>

            </div>

            
        </section>


</article>

<script src="script.js"></script>

