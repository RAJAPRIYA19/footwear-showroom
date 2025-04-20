<?php
// Include DB connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Sanitize and validate inputs
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = (int)$_POST['price'];

  // Prepare the SQL query
  $sql = "INSERT INTO cart (name, price) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $name, $price);

  // Execute the query and check for errors
  if ($stmt->execute()) {
    echo "Item added to cart!";
  } else {
    echo "Error: " . $stmt->error;  // Display more detailed error message from prepared statement
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>
