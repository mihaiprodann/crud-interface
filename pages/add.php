<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add records to database</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>

<?php include_once "../database/connection.php"; ?>
<div class="container">
    <div class="sidebar">
        <?php include_once "../components/sidebar.php"; ?>
    </div>
    <div class="main-content">
        <h1>Add records to database</h1>
        <label for="tables">Choose table:</label>
        <select id="tables" name="tables">
            <?php
                $sql = "SHOW TABLES";
                global $connection;
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_row($result)) {
                    echo "<option value='$row[0]'";

                    if(isset($_GET['table']) && $_GET['table'] == $row[0]) {
                        echo "selected>";
                    } else {
                        echo ">";
                    }
                    echo $row[0]. "</option>";
                }
            ?>
        </select>

        <div id="form">
            <?php
                if(!isset($_GET['table'])):
            ?>
            <h3>No table selected</h3>
            <?php
                else:
            ?>
            <form action="" method="post">
                <?php
                    $table = $_GET['table'];
                    $sql = "DESCRIBE $table";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<label for='$row[0]'>$row[0]</label>";
                        echo "<input type='text' name='$row[0]' id='$row[0]'>";
                    }
                ?>
                <input type="submit" value="Add" name="submitBtn">
            </form>
            <?php
                endif;

                if(isset($_POST['submitBtn'])) {
                    $values = array_values($_POST);
                    $sql = "INSERT INTO $table VALUES(";
                    for ($i = 0; $i < count($_POST) - 1; $i++) {
                        $sql .= "'".$values[$i]."',";
                    }
                    $sql = rtrim($sql, ",") . ")";
                    $result = mysqli_query($connection, $sql);
                    if($result) {
                        echo "<h3>Record added successfully</h3>";
                    } else {
                        echo "<h3>Record not added</h3>";
                    }
                }
            ?>
        </div>
    </div>
    <script src="../scripts/add.js"></script>
</div>
</body>
</html>