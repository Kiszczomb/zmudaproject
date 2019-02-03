<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Newsletter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Newsletter</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "ZAQ!2wsx";
$dbname = "newsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <hr>";

// Get data from database
$sql = "SELECT id, title, content FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br>Tytuł: " . $row["title"]. "<br>Treść: " . $row["content"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>
    
</body>
</html>