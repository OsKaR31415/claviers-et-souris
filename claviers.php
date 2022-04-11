<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ergoscar - Claviers</title>
</head>
<body>

    <?php include("header.inc.php"); ?>
    <div class="container">
        <div class="contents">

            <h1> Claviers </h1>

            <form action="claviers.php" method="get">
                <div class="flex-container">
                    <div>
                        <input type="range" name="nb_touches"
                        value="60" min="0" max="120" step="10"
                        list="label_touches"
                        oninput="this.nextElementSibling.value = this.value"
                        />
                        <output>60</output>
                        <label for="nb_touches"> touches </label>
                    </div>
                    <div>
                        <input type="submit" class="submit" value="Rechercher"/>
                    </div>
                </div>
            </form>

<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'CLAVIERS_ET_SOURIS';

$mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}



echo '<br>';

$result = mysqli_query($mysqli, 'SELECT * FROM CLAVIER ');
if (mysqli_num_rows($result) < 0) {
    // if there is no data
    echo "0 results";
} else {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="sql_result">';
        echo '<div class="nom">' . $row["nom"] . '</div>';
        echo '<div class="nb_touches">' . $row["nombre_touches"] . ' touches </div>';
        echo '<br/>';
        echo '<div/>';
    }
}

$mysqli->close();

?>

        </div>
    </div>
</body>
</html>

