<?php
if (!defined('ABSPATH')) exit;

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'WaterClarity-db';

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Chyba připojení k databázi: ' . mysqli_connect_error());
}

$db = "SHOW TABLES FROM `$db_name`";
$result_db = mysqli_query($conn, $db);
?>

<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <style>
        .wrap {
            max-width: 800px;
            padding: 20px;
        }

        nav {
            display: flex;
            flex-direction: column;
            gap: 5px; /* adds space between buttons */
            max-width: 200px; /* limits the width of the navigation */
        }

        #headline {
            text-align: center;
            font-size: 3rem;
            font-weight: bold;
        }

        #para {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 0;
        }

        #choose {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .location {
            width: 100%;
            padding: 10px 20px;
            margin: 0;
            font-size: 1rem;
            cursor: pointer;
        }

        #new {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #7a7474;
        }

        .data-output {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="wrap">
    <h1 id="headline">Water Monitor – Administrace</h1>
    <p id="para">Toto je admin stránka pluginu.</p>
    <p id="choose">Vyberte lokaci:</p>

    <?php
    if ($result_db) {
        while ($row = mysqli_fetch_array($result_db)) {
            $table_name = htmlspecialchars($row[0]);
            echo "<nav><form method='post' action=''>
                    <input type='submit' name='loc_btn' class='location' value='$table_name'>
                  </form></nav>";
        }
    } else {
        echo "<p>Chyba při načítání tabulek: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
    }
    ?>

    <form method="post" action="">
        <input type="submit" id="new" name="new" value="Nové místo">
    </form>

    <div class="data-output">
        <?php
        if (isset($_POST['loc_btn'])) {
            // Zahrnutí podstránky s výpisem dat
            require WM_PLUGIN_DIR . 'admin/views/data-expand.php';
        }
        ?>
    </div>
</div>

</body>
</html>