<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See records from database</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/tables.css">
    <link rel="stylesheet" href="../styles/execute.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php include_once "../database/connection.php"; ?>
<div class="container">
    <div class="sidebar">
        <?php include_once "../components/sidebar.php"; ?>
    </div>
    <div class="main-content">
        <form action="" method="POST">
            <h1><i class="fa-solid fa-person-running"></i>Execute query</h1>
            <label>
                <input type="text" name="query"/>
            </label>
            <input class="btn" type="submit" value="Execute" name="execute">
        </form>
            <?php
            if (isset($_POST['execute'])) {
                global $connection;
                $query = $_POST['query'];
                // if the query returns a table, display it
                try {
                    $result = mysqli_query($connection, $query);
                    if (gettype($result) == "boolean") {
                        echo "<h3 class='success'>Query executed successfully</h3>";
                    } else {
                        echo "<table>";

                        // if it's a select query, display the table header
                        if (strpos($query, "SELECT") !== false) {
                            $table = explode(" ", $query)[3];
                            $sql2 = "DESCRIBE $table";
                            $result2 = mysqli_query($connection, $sql2);
                            echo "<tr>";
                            while ($row2 = mysqli_fetch_row($result2)) {
                                echo "<th>$row2[0]</th>";
                            }
                            echo "</tr>";
                        }

                        while ($row = mysqli_fetch_row($result)) {
                            echo "<tr>";
                            for ($i = 0; $i < count($row); $i++) {
                                echo "<td>$row[$i]</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } catch (Exception $e) {
                    echo "<h3>Query failed</h3>";
                }
            }

            ?>



    </div>

</div>
</body>
</html>