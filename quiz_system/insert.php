<?php

include 'include/header.php';

?>

</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $GRADE = $_POST["GRADE"];
  $STATUS = $_POST["STATUS"];
 

  $sql = "INSERT INTO complete (GRADE,STATUS) VALUES ('$GRADE','$STATUS')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Data</title>
 
  <link rel="stylesheet" href="css/style_foo.css"> <style>
    /* Improved CSS for a clean and visually appealing form */
    
    body {
        background-color: #393e46; /* */
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      width: 50%;
      margin: 0 auto; /* Center the form horizontally */
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px; /* Add rounded corners */
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px; /* Add rounded corners to input fields */
    }

    input[type="submit"] {
      background-color: #4CAF50; /* Green button */
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px; /* Add rounded corners to button */
      cursor: pointer;
      float: right; /* Align button to the right */
    }

    input[type="submit"]:hover {
      background-color: #45a049; /* Green button hover effect */
    }
  </style>
</head>
<body>
  <h2>Insert Data</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label style="background-color: #00adb5;" for="GRADE">GRADE:</label>
    <input type="text" id="GRADE" name="GRADE" required><br><br>

    <label style="background-color: #00adb5;" for="STATUS">STATUS:</label>
    <input type="text" id="STATUS" name="STATUS" required><br><br>

    
    <input type="submit" value="Submit">
  </form>
</body>
</html>

<?php

include 'include/footer.php';

?>
