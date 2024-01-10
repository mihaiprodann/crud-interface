<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add records to database</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/add.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php include_once "../database/connection.php"; ?>
<div class="container">
    <div class="sidebar">
        <?php include_once "../components/sidebar.php"; ?>
    </div>
    <div class="main-content">
        <h1><i class="fa-regular fa-plus"></i>Add records to database</h1>
        <?php
            include_once "../components/tables_select.php";


            if (!isset($_GET['table'])):
        ?>
            <h3>Please select a table</h3>
        <?php
            else:
        ?>
        <br><br>
        <div id="form">
            <form action="" method="post">
                <div class="label-container">
                <?php
                    global $connection;
                    $table = $_GET['table'];
                    $sql = "DESCRIBE $table";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<label for='$row[0]'>$row[0]</label>";
                        echo "<input type='text' name='$row[0]' id='$row[0]'/><br><br>";
                    }
                ?>
                        <input class="button" type="submit" value="Add" name="submitBtn">
                </div>
            </form>
            <?php
                if(isset($_POST['submitBtn'])) {

                    $table = $_GET['table'];
                    $sql = "DESCRIBE $table";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        if($_POST[$row[0]] == "") {
                            echo "<h3>Please fill all fields</h3>";
                            return;
                        }
                    }

                    $values = array_values($_POST);
                    $sql = "INSERT INTO $table VALUES(";
                    for ($i = 0; $i < count($_POST); $i++) {
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
                endif;
            ?>
        </div>
    </div>
    <script src="../scripts/add.js"></script>
</div>
</body>
</html>