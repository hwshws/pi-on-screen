<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h4><b> Speiseplan - <?php
                $zeit = date("H") > "14";
                if ($zeit) {
                    echo 'Abendessen';
                } else {
                    echo 'Mittagessen';
                }
                ?> </b></h4>
    </div>
    <div class="panel-body" style=" padding: !important;0px;">

        <!--                        <h3 id="mensa"></h3>-->

        <h3 id="mensa" style="margin-top: 6px; margin-bottom: 2px;">
            <?php
            define('__ROOT__', dirname(__FILE__));
            require(__ROOT__ . '/config.php');
            $date = date('d.m.Y');
            $pdo = new PDO('mysql:host=localhost;dbname=usb', $user, $pass);

            $result = $pdo->query('SELECT * FROM mensa WHERE Datum = "' . $date . '" LIMIT 1;');
            if ($result == null) {
                echo "Bite Aushang beachten!";
            } else {
                $row = $result->fetch();
                if ($zeit) {
                    echo $row["Abend"] . '<br>';
                } else {
                    echo $row["Mittagessen"] . '<br>';
                    echo $row["Vegetarisch"] . '<br>';
                    echo $row["Nachtisch"] . '<br>';
                }
            }

            $pdo = null; ?>
        </h3>

    </div>
</div>
</body>
</html>
