<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <!-- nav bar of the website -->
    <?php include("header.inc.php"); ?>

    <div class="container">
        <div class="contents">
            <h1>Aperçu du clavier</h1>
<?php

// KEYBOARD INFO CONTAINER
echo '<div class="keyboard">';

echo '<div class="flex-row">'; // rows

echo '<div class="flex-column">'; // column 1
// NOM
echo '<div class="nom">' . $_GET["nom"] . '</div>';
// marque
echo '<div class="marque"> Marque : ' . $_GET["marque"] . '</div>';
// prix
echo '<div class="prix"> Prix : ';
if ($_GET["prix"] == '') {
    echo "<em>inconnu</em></div>";
} else {
    echo $_GET["prix"];
    echo ' € </div>';
}
// nombre de touches
echo '<div class="nb_touches">' . $_GET["nombre_touches"] . ' touches </div>';
// site original du clavier
/* echo '<div class="site_original"> Site du clavier : <a href="' . $_GET['hlink'] . '"></a> </div>'; */

// LISTE DES PROPRIÉTÉS
echo '<ul class="propriétés">';
// propriétés vraies
if ($_GET["mécanique"])    { echo '<li> Mécanique    </li>'; }
if ($_GET["split"])        { echo '<li> Split        </li>'; }
if ($_GET["deux_parties"]) { echo '<li> Deux parties </li>'; }
if ($_GET["columnar"])     { echo '<li> Columnar     </li>'; }
if ($_GET["orthogonal"])   { echo '<li> Orthogonal   </li>'; }
if ($_GET["manuform"])     { echo '<li> Manuform     </li>'; }
if ($_GET["programmable"]) { echo '<li> Programmable </li>'; }
if ($_GET["bluetooth"])    { echo '<li> Bluetooth    </li>'; }
// propriétés fausses
if (!$_GET["mécanique"])    { echo '<li class="line_through"> Mécanique    </li>'; }
if (!$_GET["split"])        { echo '<li class="line_through"> Split        </li>'; }
if (!$_GET["deux_parties"]) { echo '<li class="line_through"> Deux parties </li>'; }
if (!$_GET["columnar"])     { echo '<li class="line_through"> Columnar     </li>'; }
if (!$_GET["orthogonal"])   { echo '<li class="line_through"> Orthogonal   </li>'; }
if (!$_GET["manuform"])     { echo '<li class="line_through"> Manuform     </li>'; }
if (!$_GET["programmable"]) { echo '<li class="line_through"> Programmable </li>'; }
if (!$_GET["bluetooth"])    { echo '<li class="line_through"> Bluetooth    </li>'; }
echo '</ul>';

echo '<div class="hlink"><a href="' . $_GET["hlink"] . '">Site du clavier</a></div>';

echo '</div>'; // end of column 1

echo '<div class="flex-column">'; // column 2

// show the image
if (file_exists("DB/images/clavier/" . $_GET["nom"] . '.png')) {
    echo '<img src="DB/images/clavier/' . $_GET["nom"] . '.png">'; // the image is named the same as the keyboard
} else {
    echo 'aucune image';  // if the image file isn't found
}

/* echo '</div>'; */
echo '</div>'; // end of column 2

echo '</div>'; // end of row
echo '</div>'; // end of .keyboard


/* ⣏⡱ ⡇⢸ ⡇ ⡇  ⡏⢱   ⢎⡑ ⡎⢱ ⡇    ⡇ ⡷⣸ ⢎⡑ ⣏⡉ ⣏⡱ ⢹⠁   ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸ */
/* ⠧⠜ ⠣⠜ ⠇ ⠧⠤ ⠧⠜   ⠢⠜ ⠣⠪ ⠧⠤   ⠇ ⠇⠹ ⠢⠜ ⠧⠤ ⠇⠱ ⠸    ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇ */
$query = "INSERT INTO `CLAVIER`(nom, marque, prix, nombre_touches, mécanique, split, deux_parties, columnar, orthogonal, manuform, programmable, bluetooth, hlink) VALUES (";

// nom
$query .= "'" . $_GET["nom"] . "', ";
// marque
$query .= "'" . $_GET["marque"] . "', ";
// prix
if ($_GET["prix"] == "") { $query .= 'NULL, '; }
else { $query .= $_GET["prix"]; }
// nombre_touches
$query .= $_GET["nombre_touches"] . ', ';


// PROPERTIES
// mécanique ?
$query .= $_GET["mécanique"] ? "true, " : "false, ";
// split ?
$query .= $_GET["split"] ? "true, " : "false, ";
// deux_parties ?
$query .= $_GET["deux_parties"] ? "true, " : "false, ";
// columnar ?
$query .= $_GET["columnar"] ? "true, " : "false, ";
// orthogonal ?
$query .= $_GET["orthogonal"] ? "true, " : "false, ";
// manuform ?
$query .= $_GET["manuform"] ? "true, " : "false, ";
// programmable ?
$query .= $_GET["programmable"] ? "true, " : "false, ";
// bluetooth ?
$query .= $_GET["bluetooth"] ? "true, " : "false, ";

// hlink to the keyboard website
$query .= "'" . $_GET["hlink"] . "'";

// end of the request
$query .= ");";

echo $query;


// the session is used to keep the query when reloading the page
session_start();
if (isset($_SESSION['query'])) {

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

    $result = mysqli_query($mysqli, $query); // get the RESULTS OF THE QUERY

    echo "<br/>";
    echo "query results :";
    echo $results;
    echo "<br/>";
    echo "query done";

    unset($_SESSION['query']);

} else { // when the used has not confirmed yet
    // store the query in the session variables
    $_SESSION['query'] = $query;
    // show the confirm button
    echo '<form action="insert_clavier.php" class="submit"> <input type="submit" name="action" value="Confirmer"> </form>';
}

?>

        </div>
    </div>
</body>
</html>
