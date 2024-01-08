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