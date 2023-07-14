<?php
require_once("connect.php");

// Get the values from the HTML form
$username = $_POST['username'];
$column = $_POST['column'];
$newValue = $_POST['new_value'];

// Prepare the update query
$sql = "UPDATE patients SET $column = '$newValue' WHERE Username = '$username'";

if (mysqli_query($conn, $sql)) {
    echo "Patient record updated successfully.";
} else {
    echo "Error updating patient record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
