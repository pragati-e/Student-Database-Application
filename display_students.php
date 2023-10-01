<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Testing";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve data from the "Students" table
  $sql = "SELECT * FROM Students";
  $result = mysqli_query($conn, $sql);

  // Display the data in an HTML table
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Grade Level</th><th>Phone Number</th><th>Email</th><th>Address</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["grade_level"] . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["email"] . "</td><td>" . $row["address"] . "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
?>
<a href="index.html">Back to Student Database</a>
