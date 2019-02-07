<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Newsletter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link href='https://fonts.googleapis.com/css?family=Roboto Mono' rel='stylesheet'>
    </head>
    <body>
        <?php
        $mysqli = new mysqli("localhost", "root", "ZAQ!2wsx", "newsdb");
        ?>
        <div class="navbar">
            <a1>Newsletter</a1>
            <a href="#home">Home</a>
            <a href="#form">Dodaj wpis</a>
            <?php
            /* check connection to DB */
            if (mysqli_connect_errno()) {
                printf('<a class="notification">Connetion failed: %s</a> ', mysqli_connect_error());
                exit();
            }
            /*
            printf('<a class="notification">Initial character set: %s</a> ', $mysqli->character_set_name());
            */
        
            /* change character set to utf8mb4 */
            if (!$mysqli->set_charset("utf8mb4")) {
                printf('<a class="notification">Error loading character set utf8: %s', $mysqli->error);
                exit();
            } else {
                printf('<a class="notification">Current character set: %s', $mysqli->character_set_name());
            }
            ?>
        </div>
            <?php
            /* make SQL request*/
            $sql = "SELECT id, title, content FROM news";
            $result = $mysqli->query($sql);
            echo ('
            <div class="main">
            ');
            if ($result->num_rows > 0) {
                /* output data of each row */
                while($row = $result->fetch_assoc()) {
                    echo ('
                        <div class="title"><p class="title">' . $row["id"]. ": " . $row["title"]. '</p></div>
                        <div class="content">' . $row["content"]. "</div>"
                    );
                }
            } else {
                echo "0 results";
            }
            echo ('</div>');
            
            $mysqli->close();
            ?>
    </body>
</html>