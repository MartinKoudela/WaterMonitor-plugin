<?php

if (!defined('ABSPATH')) exit;

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'WaterClarity-db';
$conn = '';

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo 'Database connection error';
}

if ($conn) {
    echo 'Database connection successful';
}

$selected_table = $_POST['loc_btn'];

$db_data = "SELECT * FROM `$selected_table`";
$result_data = mysqli_query($conn, $db_data);

?>

<div class="data-expand">
    <section class="data-expand-section">
        <div class="data-expand-content">
            <?php
            if ($result_data) {
                $first_row = mysqli_fetch_assoc($result_data);
                if ($first_row) {
                    echo "<table border='1' cellpadding='8' cellspacing='2' style='width: 60%;'>";
                    echo "<tr>";
                    foreach ($first_row as $column => $value) {
                        echo "<th>" . htmlspecialchars($column) . "</th>";
                    }
                    echo "</tr>";

                    // Output the first row
                    echo "<tr>";
                    foreach ($first_row as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";

                    // Output the rest of the rows
                    while ($row = mysqli_fetch_assoc($result_data)) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No data found in the table.";
                }
            } else {
                echo "Error retrieving data: " . mysqli_error($conn);
            }
            ?>
        </div>
    </section>
</div>
