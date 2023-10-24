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
    $password = $_POST['password'];

    // Check if the admin exists
    $sql = "SELECT * FROM admin WHERE index_number='$indexNumber' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['indexNumber'] = $indexNumber;
        header("Location: home.php");
        exit();
    } else {
        echo "Invalid index number or password!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<body>

    <h2>Admin Login</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Index Number:<br>
        <input type="text" name="indexNumber">
        <br><br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Login">
    </form>

</body>

</html>