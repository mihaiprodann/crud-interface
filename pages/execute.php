<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See records from database</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/tables.css">

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
            <input type="submit" value="Execute" name="execute">
        </form>
    </div>
    <?php
        if (isset($_POST['execute'])) {
            global $connection;
            $query = $_POST['query'];
            // if the first word is SELECT, show the result in a table
            if (strtoupper(substr($query, 0, 6)) == "SELECT") {
                try {
                    $result = mysqli_query($connection, $query);
                    echo "<div id='table'>";
                    echo "<table>";
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<tr>";
                        for ($i = 0; $i < count($row); $i++) {
                            echo "<td>$row[$i]</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                } catch (Exception $e) {
                    echo "<div class='error'>Error executing query: " . $e->getMessage() . "</div>";
                }
            } else {
                // if the first word is not SELECT, execute the query
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo "<div class='success'>Query executed successfully</div>";
                } else {
                    echo "<div class='error'>Error executing query</div>";
                }
            }
        }

    ?>
</div>
</body>
</html>