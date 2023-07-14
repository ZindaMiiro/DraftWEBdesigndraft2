<?php
require_once("connect.php"); // Assuming "connect.php" contains the database connection code

$username = $_GET['username']; // Retrieve the username from the query parameter

// Prepare and execute the SQL query to retrieve the doctor's info
$sql = "SELECT * FROM doctor WHERE UserName = '$username'";
$result = $conn->query($sql);

$response = array();

if ($result) {
  if ($result->num_rows > 0) {
    // Doctor found, retrieve the information
    $row = $result->fetch_assoc();
    $response['success'] = true;
    $response['doctorInfo'] = $row;
  } else {
    // Doctor not found
    $response['success'] = false;
  }
} else {
  // Error in executing the query
  $response['success'] = false;
  $response['error'] = $conn->error;
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$conn->close();
?>
