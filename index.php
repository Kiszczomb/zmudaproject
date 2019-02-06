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
$mysqli = new mysqli("localhost", "root", "ZAQ!2wsx", "newsdb");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n<br/>", mysqli_connect_error());
    exit();
}

printf("Initial character set: %s \n<br/>", $mysqli->character_set_name());

/* change character set to utf8mb4 */
if (!$mysqli->set_charset("utf8mb4")) {
    printf("Error loading character set utf8: %s \n<br/>", $mysqli->error);
    exit();
} else {
    printf("Current character set: %s \n<br/>", $mysqli->character_set_name());
}

/* make SQL request*/
$sql = "SELECT id, title, content FROM news";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    /* output data of each row */
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. "<br> Tytuł: " . $row["title"]. "<br> Treść:  " . $row["content"]. "<br>";
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>

</body>
</html>