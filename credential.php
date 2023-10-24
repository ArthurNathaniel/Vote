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

// Fetch all records from the admin table
$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

$credentials = array();
if ($result->num_rows > 0) {
    // output data of each row
    $credentials = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Credentials</h2>

    <table>
        <tr>
            <th>Index Number</th>
            <th>Password</th>
        </tr>
        <?php foreach ($credentials as $credential) { ?>
            <tr>
                <td><?php echo $credential['index_number']; ?></td>
                <td><?php echo $credential['password']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>