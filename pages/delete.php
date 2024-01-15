<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See records from database</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/tables.css">
    <script src="scripts/add.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php include_once "../database/connection.php"; ?>
<div class="container">
    <div class="sidebar">
        <?php include_once "../components/sidebar.php"; ?>
    </div>
    <div class="main-content">
        <h1><i class="fa-solid fa-eye"></i>Delete records from database</h1>

        <?php
        include_once "../components/tables_select.php";

        if (!isset($_GET['table'])):
            ?>
            <h3>Please select a table</h3>
        <?php
        else:
        ?>
        <div id="table">
            <table>
                <tr class="c1">
                    <th colspan="100%">Table: <?php echo $_GET['table']; ?> <a class="addBtn" href="add.php?table=<?php echo $_GET['table']?>" id="create_link">Add a record</a></th>
                </tr>
                <tr>
                    <?php
                    global $connection;
                    $column = "";
                    $table = $_GET['table'];
                    $sql = "DESCRIBE $table";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<th>$row[0]</th>";
                        if ($column == "") {
                            $column = $row[0];
                        }
                    }
                    echo "<th>Actions</th>"
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
                    echo "<td><a href='delete.php?table=$table&id=$row[0]&column=$column'>Delete</a>";
                    echo "</tr>";
                }
                endif;

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $column = $_GET['column'];
                    $table = $_GET['table'];
                    $sql = "DELETE FROM $table WHERE $column = $id";
                    try {
                        $result = mysqli_query($connection, $sql);
                        if ($result) {
                            echo "<script>alert('Record deleted successfully')</script>";
                        } else {
                            echo "<script>alert('Error deleting record')</script>";
                        }
                        echo "<script>window.location.href='delete.php?table=$table'</script>";
                    }
                    catch (Exception $e) {
                        echo "<script>alert('Error deleting record')</script>";
                        echo "<script>window.location.href='delete.php?table=$table'</script>";
                    }
                }
                ?>
            </table>

        </div>
    </div>
    <script src="../scripts/add.js"></script>
</div>
</body>
</html>