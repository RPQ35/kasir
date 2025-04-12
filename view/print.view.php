<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page Example</title>
    <style>
        @keyframes poping{
            0%{opacity:50% ;scale: 2%;transform: translateY(-15px);}
            50%{scale: 100%;}
        }


        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .print-button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .print-button:hover {
            background-color: #0056b3;
        }

        /* Print-specific styles */
        @media print {
            .print-button {
                display: none;
                /* Hide button when printing */
            }

            .no-print {
                display: none;
                /* Hide elements with this class */
            }

            body {
                font-size: 14px;
                color: black;
            }

            .content {
                border: 1px solid #000;
                padding: 10px;
            }
        }

        body {
            height: 90vb;
        }

        header {
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 10%;
        }

        h1 {
            margin: 0 auto;
        }

        main {
            height: 80%;
        }

        footer {
            height: 10%;
        }

        div {
            display: flex;
            justify-content: space-between;
        }

        li {
            display: flex;
            flex-direction: column;
            gap: -5px;
        }

        section#pop_up{
            background-color: #fdd744;
            z-index: 4;
            position:absolute;
            top: 35%;left: 40%;right: 40%; bottom: 35%;
            border-radius: 36px;
            display: flex;
            flex-direction: column;
            box-shadow: 5px 10px 20px black;
            font-size: 3vb;
            height: 30vb;
            width: 40vb;
            text-align: center;
            justify-content: space-around;
            background-image: url("../aset/question-sign.png");
            background-size: 40%;
            background-blend-mode: soft-light;
            background-position: center;
            background-repeat: no-repeat;
            animation: poping .5s linear;
            

            div{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                margin-bottom: 1vb;
            }
            
            button:hover{
                background-color:rgb(61, 167, 65);
            }

            button{
                background-color: #7dcb80;
                border: none;
                border-radius: 36px;
                width: 16vb;
                height: 5vb;
                cursor: pointer;
                transform: translateY(3vb);
            }
        }
    </style>
</head>
<?php include '../table_used_in_data.php'; ?>



<body>
    

    <section id="pop_up" style="display: none;">
        <h3>done printing?</h3>
    <div>
    <button id="back">done</button>
    <button id="re_print">re-print</button>
    </div>
    </section>
    
   

    <header>
        <h1>TukSirBat</h1>
        <p>jl.kung , menuju kebenaran</p>
        ========================================
    </header>

    <main>

        <?php
        $total = 0;
        $printers=explode("!",$_SESSION['yellow']);
        foreach ($printers as $a) {
            if($a==null){continue;}
            $a=unserialize($a);
            $e= $a[2] * $a[1];
            $es=number_format($e,2,",",".") ;
            $a[2]=number_format($a[2],2,",",".") ;
            echo "<div>
            <li>
                <h4>$a[0]</h4>
                <p>X$a[1]</p>
            </li>
            <li>
                <p>$a[2]</p>
                <h4>Rp.$es</h4>
            </li>    
            </div>";
            $total += $e;
        }
        $d = date("Y-M-d");
        ?>
    </main>

    <footer>
        <div>
            <h1>total</h1>
            <h1><?= number_format($total,2,",",".") ?></h1>
        </div>
        ========================================
        <div>
            <h3>stang seher</h3>
            <h3 id="fater"><?= $d ?></h3>
        </div>
        <div>
            <h3>cahier : <?=$user?></h3>
            <h3>no struk :<?=$onlog?> </h3>
        </div>
    </footer>



    <script>
        window.onload = function() {
            window.print();
        };
        window.onafterprint = function() {
            console.log("Printing completed...");

            document.getElementById("pop_up").style.display="block";
            document.querySelector("header").style.display="none";
            document.querySelector("main").style.display="none";
            document.querySelector("footer").style.display="none";

            document.getElementById('back').addEventListener("click",function(){
                window.location.href = "../index.php";
            })
            document.getElementById('re_print').addEventListener("click",function(){
                document.getElementById("pop_up").style.display="none";
                document.querySelector("header").style.display="block";
                document.querySelector("main").style.display="block";
                document.querySelector("footer").style.display="block";
                window.print();
            })
        }
    </script>

</body>

</html>