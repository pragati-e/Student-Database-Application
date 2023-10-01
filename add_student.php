<!DOCTYPE html>
<html>
  <head>
    <title>Student Database</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      // Connect to the database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Testing";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert new student into the database
        $name = $_POST["name"];
        $date_of_birth = $_POST["date_of_birth"];
        $grade_level = $_POST["grade_level"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        $sql = "INSERT INTO Students (name, date_of_birth, grade_level, phone_number, email, address)
                VALUES (:name, :date_of_birth, :grade_level, :phone_number, :email, :address)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':grade_level', $grade_level);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->execute();

        echo "<p>New student added successfully.</p>";
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

      // Close database connection
      $conn = null;
    ?>
    <a href="index.html">Back to Student Database</a>
  </body>
</html>
