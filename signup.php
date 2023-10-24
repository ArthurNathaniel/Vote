<?php
// Change these to your own settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vote";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $indexNumber = $_POST['indexNumber'];

    // Check if the index number already exists
    $check_sql = "SELECT * FROM admin WHERE index_number='$indexNumber'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "Index number already exists. Please use a different index number.";
    } else {
        // Generate a random password
        $password = substr(bin2hex(random_bytes(4)), 0, 5); // Generate 5-character password

        // Insert the admin data
        $sql = "INSERT INTO admin (index_number, password) VALUES ('$indexNumber', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Admin created successfully. Password: $password";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<body>

    <h2>Admin Sign Up</h2>

    <form method="post" action="signup.php">
        Index Number:<br>
        <input type="text" name="indexNumber">
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>