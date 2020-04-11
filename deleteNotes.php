<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);

    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'vtssc');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

        // Fetch the file information
        $query = "
            DELETE FROM `notes`
            WHERE `id` = {$id}";
        $result = $dbLink->query($query);
        @mysqli_close($dbLink);
        header("Refresh:0; url=manageNotes.php");
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>
