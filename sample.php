  GNU nano 6.2                                                                                      index.php                                                                                               
<?php
$servername = "localhost";
$username = "tenisha";
$password = "Teni*2007";
$dbname = "challenge";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_input = $_GET['id'];

$disallowed = ["'", "\"", "=", "OR", "AND", "--", "#", "/*", "*/", " "];
foreach ($disallowed as $char) {
    if (stripos($user_input, $char) !== false) {
        die("Disallowed character or keyword detected!");
    }
}

$sql = "SELECT * FROM users WHERE id = '$user_input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User exists!";
} else {
    echo "User does not exist!";
}

$conn->close();
?>

