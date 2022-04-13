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
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'CLAVIERS_ET_SOURIS';

$mysqli = @new mysqli($db_host, $db_user, $db_password, $db_db);

if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno . '<br>' . 'Error: '.$mysqli->connect_error;
    exit();
}



/* ⣏⡱ ⡇⢸ ⡇ ⡇  ⡏⢱   ⢎⡑ ⡎⢱ ⡇    ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸ */
/* ⠧⠜ ⠣⠜ ⠇ ⠧⠤ ⠧⠜   ⠢⠜ ⠣⠪ ⠧⠤   ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇ */

$query = "SELECT * FROM CLAVIER WHERE true ";
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


// condition on the OS compatibility
if ($_GET['linux'])   { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='Linux')"; }
if ($_GET['windows']) { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='Windows')"; }
if ($_GET['macos'])   { $query .= " AND id IN (SELECT id_souris FROM SOURIS_COMPATIBLE WHERE os='MacOS')"; }


$query .= " ORDER BY prix - " . $_GET['prix'];

// this line is very important
$query .= ';';

echo $query;


$result = mysqli_query($mysqli, $query); // get the RESULTS OF THE QUERY


if (mysqli_num_rows($result) < 0) {
    // si il
    echo '<div class="mouse">';
    echo '<div class="no_result"> Aucun résultat ! <div/>';
    echo 'peut être que votre recherche est trop précise...';
    echo '</div>';
} else {
    /* ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸   ⣏⡱ ⣏⡉ ⢎⡑ ⡇⢸ ⡇  ⢹⠁ ⢎⡑ */
    /* ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇   ⠇⠱ ⠧⠤ ⠢⠜ ⠣⠜ ⠧⠤ ⠸  ⠢⠜ */

    while ($row = mysqli_fetch_assoc($result)) {  // iterate over result tuples
        // MOUSE INFO CONTAINER
        echo '<div class="mouse">';

        echo '<div class="flex-row">';

        echo '<div class="flex-column">';
        echo '</div>';

        echo '</div>';

        echo '</div>';
    }
}


?>


        </div>
    </div>

</body>
</html>

