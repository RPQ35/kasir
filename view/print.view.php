<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page Example</title>
    <style>
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
    </style>
</head>
<?php include 'db.php'; ?>
<body>

    <header>
        <h1>test print area</h1>
        <p>jl.kung , menuju kebenaran</p>
        ========================================
    </header>

    <main>

        <?php
        $total = 0;
 
        foreach ($stmtred->fetchAll(PDO::FETCH_ASSOC) as $a) {
            $e= $a['price'] * $a['jumlah'];$es=number_format($e,2,",",".") ;
            $a['price']=number_format($a['price'],2,",",".") ;
            echo "<div>
            <li>
                <h4>$a[unit]</h4>
                <p>X$a[jumlah]</p>
            </li>
            <li>
                <p>$a[price]</p>
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
            <h3>nuklir compeny</h3>
            <h3 id="fater"><?= $d ?></h3>
        </div>
        <div>
            <h3>cahier : <?=$user?></h3>
            <h3>no struk :<?=$onlog?> </h3>
        </div>
    </footer>



    <script>
        // Trigger print when the page has loaded
        window.onload = function() {
            window.print();
            console.log("Start");
            setTimeout(() => {
                console.log("This runs after 3 seconds");
                window.location.href = "../backside/reset.php";
            }, 3000);
            console.log("End");

        };
        window.onafterprint = function() {
            console.log("Printing completed...");
        }
    </script>

</body>

</html>
<!-- pass oracle lu anomali1 -->