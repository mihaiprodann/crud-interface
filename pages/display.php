<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See records from database</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>

<?php include_once "../database/connection.php"; ?>
<div class="container">
    <div class="sidebar">
        <?php include_once "../components/sidebar.php"; ?>
    </div>
    <div class="main-content">
        <h1>See records from database</h1>

        <?php
        include_once "../components/tables_select.php";

        if (!isset($_GET['table'])):
            ?>
            <h3>Please select a table</h3>
        <?php
        else:
        ?>
        <br><br>
        <div id="table">
            <table>
                <tr>
                    <?php
                    global $connection;
                    $table = $_GET['table'];
                    $sql = "DESCRIBE $table";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<th>$row[0]</th>";
                    }
                    ?>
                </tr>
                <?php
                $sql = "SELECT * FROM $table";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    for ($i = 0; $i < count($row); $i++) {
                        echo "<td>$row[$i]</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <?php

            endif;
            ?>
        </div>
    </div>
    <script src="../scripts/add.js"></script>
</div>
</body>
</html>