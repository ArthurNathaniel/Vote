<?php
session_start();

if (!isset($_SESSION['indexNumber'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<body>

    <h2>Welcome to the Home Page</h2>

    <!-- Your home page content here -->

</body>

</html>