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
?>

<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <style>
        body {
            background-color: floralwhite;
        }

        .wrap {
            padding: 20px;
            background-color: whitesmoke;
            min-height: 70vh;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 93.5%;
        }

        .header {
            padding: 50px;
            background: linear-gradient(135deg, #4a90e2, #357abd);
            margin: 0 auto;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            width: 90%;
            color: white;
        }

        nav {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 200px;
            margin-left: 100px;
            margin-right: 100px;

        }

        #headline {
            text-align: center;
            font-size: 2.8rem;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #para {
            text-align: center;
            font-size: 1.3rem;
            margin-top: 10px;
            margin-bottom: 0;
            opacity: 0.9;
        }

        #choose {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        #headline, #para, #choose {
            width: 100%;
        }


        .location {
            width:;
            padding: 12px 24px;
            margin: 5px;
            font-size: 1rem;
            cursor: pointer;
            background: none;
            color: #333333;
            border: 1px solid #dddddd;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: 400;
        }

        .location:hover {
            background-color: #e8e8e8;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .location:active {
            transform: scale(0.4);
            transition: 0.3s;
            background-color: #357abd;
        }



        #new {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 1rem;
            cursor: pointer;
            width: 200px;
            margin-left: 105px;
            margin-right: 100px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #new:hover {
            background-color: #357abd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        #new:active {
            transform: translateY(1px);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .data-output {
            margin: 30px;
            position: relative;
            bottom: 400px;
            left: 400px;

        }
        footer {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #4a90e2, #357abd);
            color: white;
            width: 92.5%;
            margin-left: auto;
            margin-right: auto;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="header">
    <h1 id="headline">Administrace - Clarity Monitor</h1>
    <p id="para">Toto je admin dashboard.</p>
</div>
<div class="wrap">
    <p id="choose">Vyberte lokaci:</p>

    <?php
    $db = "SHOW TABLES FROM `$db_name`";
    $result_db = mysqli_query($conn, $db);


    // TODO: ruční přidávání nových dat (přidat do db přes kod) ->
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

    if (isset($_POST['new'])) {
        // TODO: ruční přidávání nových míst (přidat do db přes kod) ->
    }
    ?>
    <form method="post" action="">
        <input type="submit" id="new" name="new" value="Nové místo">
    </form>

    <div class="data-output">
        <?php
        if (isset($_POST['loc_btn'])) {
            require WM_PLUGIN_DIR . 'admin/views/data-expand.php';
        }
        ?>
    </div>
</div>
<footer>
    <p>© 2025 Water Clarity Monitor | Admin Dashboard</p>
</footer>

</body>
<script>
    $( ".location" ).click(function() {
        $( ".location" ).css('background', 'green');
    });
</script>
</html>