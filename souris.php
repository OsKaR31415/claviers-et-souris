<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ergoscar - Souris</title>
</head>
<body>
    <?php include('header.inc.php') ?>
    <div class="container">
        <div class="contents">
        <h1>Souris</h1>
        <?php include('form_souris.inc.php') ?>


<?php

/* ⡎⠑ ⡎⢱ ⡷⣸ ⡷⣸ ⣏⡉ ⡎⠑ ⢹⠁   ⢹⠁ ⡎⢱   ⡏⢱ ⣎⣱ ⢹⠁ ⣎⣱ ⣏⡱ ⣎⣱ ⢎⡑ ⣏⡉ */
/* ⠣⠔ ⠣⠜ ⠇⠹ ⠇⠹ ⠧⠤ ⠣⠔ ⠸    ⠸  ⠣⠜   ⠧⠜ ⠇⠸ ⠸  ⠇⠸ ⠧⠜ ⠇⠸ ⠢⠜ ⠧⠤ */
// database variables
$db_host = 'localhost'; // hostname
$db_user = 'root';  // username
$db_password = 'root';  // password
$db_db = 'CLAVIERS_ET_SOURIS';  // Database Name

$mysqli = @new mysqli($db_host, $db_user, $db_password, $db_db);

if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno . '<br>' . 'Error: '.$mysqli->connect_error;
    exit();
}



/* ⣏⡱ ⡇⢸ ⡇ ⡇  ⡏⢱   ⢎⡑ ⡎⢱ ⡇    ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸ */
/* ⠧⠜ ⠣⠜ ⠇ ⠧⠤ ⠧⠜   ⠢⠜ ⠣⠪ ⠧⠤   ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇ */

if (empty($_GET) || $_GET['action'] == 'Tous les claviers') {
    $query = "SELECT * FROM SOURIS;";
} elseif ($_GET['action'] == 'Rechercher') {

    $query = "SELECT * FROM SOURIS WHERE true ";

    // conditions on the attributes of `SOURIS`
    if ($_GET['bluetooth'])    { $query .= " AND bluetooth "; }

    // condition on the type of mouse (mouse/trackpad/trackball)
    if ($_GET['type_souris'] == "souris") {
        $query .= " AND (NOT trackpad) AND (NOT trackball) ";
    } elseif ($_GET['type_souris'] == "trackpad") {
        $query .= " AND trackpad ";
    } elseif ($_GET['type_souris'] == "trackball") {
        $query .= " AND trackball ";
    } elseif ($_GET['type_souris'] != "any") {  // "any" is the only possibility last. else there is a problem
        echo "ERROR: error on the form for selecting the type of mouse<br/>";
    }

    // condition on where is the mouse : alone, on a keyboard or on a computer
    if ($_GET['position'] == 'seule') {
        $query .= " AND id NOT IN (SELECT id_souris FROM SOURIS_SUR_ORDINATEUR) AND id NOT IN (SELECT id_souris FROM SOURIS_SUR_CLAVIER) ";
    } elseif ($_GET['position'] == 'sur_clavier') {
        $query .= " AND id IN (SELECT id_souris FROM SOURIS_SUR_CLAVIER) ";
    } elseif ($_GET['position'] == 'sur_ordinateur') {
        $query .= " AND id IN (SELECT id_souris FROM SOURIS_SUR_ORDINATEUR) ";
    } else {
        echo "ERROR: error on the form for selecting the mouse position";
    }

    // condition on the OS compatibility
    if ($_GET['linux'])   { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='Linux')"; }
    if ($_GET['windows']) { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='Windows')"; }
    if ($_GET['macos'])   { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='MacOS')"; }


    $query .= " ORDER BY ABS(prix - " . $_GET['prix'] . ')';

    // this line is very important
    $query .= ';';
}


echo $query;


$result = mysqli_query($mysqli, $query); // get the RESULTS OF THE QUERY


// if there are no tuples in the result
if (mysqli_num_rows($result) < 0) {
    echo '<div class="mouse">';
    echo '<div class="no_result"> Aucun résultat ! <div/>';
    echo 'peut être que votre recherche est trop précise...';
    echo '</div>';
} else {

    /* ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸   ⣏⡱ ⣏⡉ ⢎⡑ ⡇⢸ ⡇  ⢹⠁ ⢎⡑ */
    /* ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇   ⠇⠱ ⠧⠤ ⠢⠜ ⠣⠜ ⠧⠤ ⠸  ⠢⠜ */
    while ($row = mysqli_fetch_assoc($result)) {  // iterate over result tuples
        echo '<div class="mouse">'; // MOUSE INFO CONTAINER
        echo '<div class="flex-row">'; // beginning of the row
        echo '<div class="flex-column">'; // beginnin of the column

        // NOM
        echo '<div class="nom">' . $row['nom'] . '</div>';
        // marque
        echo '<div class="marque">' . $row['marque'] . '</div>';
        // prix
        echo '<div class="prix">';
        if ($row['prix'] == '') {
            echo 'inconnu';
        } else {
            echo $row['prix'] . '€ ';
        }
        echo ' </div>';

        // mouse type : trackpad, trackball or mouse
        echo '<div class="type">';
        echo "Type : ";
        if (!$row['trackball'] && !$row['trackpad']) {
            echo 'Souris';
        } elseif ($row['trackball']) {
            echo 'Trackball';
        } elseif ($row['trackpad']) {
            echo 'Trackpad';
        }
        echo '</div>';

        // bluetooth ?
        echo '<div ' . ($row['bluetooth'] ? '' : 'class="line_through"') . '>Bluetooth</div>';

        echo '</div>'; // end of the column
        echo '<div class="flex-column">'; // beginning of the image column

        $image_path = "DB/images/souris/" . $row['nom']. ".png";
        if (file_exists($image_path)) {
            echo '<img src="DB/images/souris/' . $row['nom'] . '.png">';
        } else {
            echo '<div class="no_image">Pas d\'image disponible</div>';
        }

        echo '</div>'; // end of the image column
        echo '</div>';  // end of the row
        echo '</div>';  // end of the mouse info container
    }
}


?>


        </div>
    </div>

</body>
</html>

