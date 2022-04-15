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

            <?php include("form_claviers.inc.php") ?>

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

if (empty($_GET) || $_GET['action'] == 'Tous les claviers') {
    // this is the default request when the user has not used the form
    // also the resquest used whan the used wants all the keyboards listed
    $query = "SELECT * FROM CLAVIER;";
} elseif ($_GET['action'] == 'Rechercher') {
    $query = "SELECT * FROM CLAVIER WHERE true ";
    // conditions on the attributes of `CLAVIER`
    if ($_GET['split'])        { $query .= " AND split "; }
    if ($_GET['deux_parties']) { $query .= " AND deux_parties "; }
    if ($_GET['columnar'])     { $query .= " AND columnar "; }
    if ($_GET['orthogonal'])   { $query .= " AND orthogonal "; }
    if ($_GET['manuform'])     { $query .= " AND manuform "; }
    if ($_GET['programmable']) { $query .= " AND programmable "; }
    if ($_GET['bluetooth'])    { $query .= " AND bluetooth "; }

    // SQL condition for a keyboard to have a trackpad / trackball
    $trackpad_condition  = "id IN (SELECT id_clavier FROM SOURIS_SUR_CLAVIER WHERE id_souris IN (SELECT id FROM SOURIS WHERE trackpad  = true))";
    $trackball_condition = "id IN (SELECT id_clavier FROM SOURIS_SUR_CLAVIER WHERE id_souris IN (SELECT id FROM SOURIS WHERE trackball = true))";
    // if both 'avec_trackpad' and 'avec_trackball' are checked, the keyboards with trackballs OR trackpads are returnec
    if ($_GET['avec_trackpad'] && $_GET['avec_trackball']) {
        $query .= " AND (" . $trackpad_condition . " OR " . $trackball_condition . ") ";
    } elseif ($_GET['avec_trackpad']) {
        $query .= " AND " . $trackpad_condition . " ";
    } elseif ($_GET['avec_trackball']) {
        $query .= " AND " . $trackball_condition . " ";
    }

    if ($_GET['linux'])   { $query .= " AND id IN (SELECT id_clavier FROM CLAVIER_COMPATIBLE WHERE os='Linux')"; }
    if ($_GET['windows']) { $query .= " AND id IN (SELECT id_clavier FROM CLAVIER_COMPATIBLE WHERE os='Windows')"; }
    if ($_GET['macos'])   { $query .= " AND id IN (SELECT id_clavier FROM CLAVIER_COMPATIBLE WHERE os='MacOS')"; }


    // choose what to ORDER BY accroding to : price or number of keys
    if ($_GET['prix_ou_nb_touches'] == "prix" || $_GET['prix_ou_nb_touches'] == '') {
        // here if user selected "prix" or if the used has not selected anything (then the value is '')
        // because the default selection is ordering by price
        $query .= "ORDER BY ABS(prix - " . $_GET["prix"] . ")";
    } elseif ($_GET['prix_ou_nb_touches'] == "nb_touches") {
        $query .= "ORDER BY ABS(nombre_touches - " . $_GET["nb_touches"] . ")";
    } else {
        echo "Error on the form (for prix_ou_nb_touches)<br/>";
        echo $_GET['prix_ou_nb_touches'];
    }

    // this line is very important
    $query .= ';';
} else {
    echo "Error: on the form action : wrong action : " . $_GET['action'];
}


echo $query;


$result = mysqli_query($mysqli, $query); // get the RESULTS OF THE QUERY


if (mysqli_num_rows($result) <= 0) {
    // si il
    echo '<div class="keyboard">';
    echo '<div class="no_result"> Aucun résultat ! <div/>';
    echo 'peut être que votre recherche est trop précise...';
    echo '</div>';
} else {

    // show number of results
    echo '<div class="nb_resultats"> ' . mysqli_num_rows($result) . ' résultats</div>';

    /* ⡎⢱ ⡇⢸ ⣏⡉ ⣏⡱ ⢇⢸   ⣏⡱ ⣏⡉ ⢎⡑ ⡇⢸ ⡇  ⢹⠁ ⢎⡑ */
    /* ⠣⠪ ⠣⠜ ⠧⠤ ⠇⠱  ⠇   ⠇⠱ ⠧⠤ ⠢⠜ ⠣⠜ ⠧⠤ ⠸  ⠢⠜ */
    while ($row = mysqli_fetch_assoc($result)) {  // iterate over result tuples
        // KEYBOARD INFO CONTAINER
        echo '<div class="keyboard">';

        echo '<div class="flex-row">'; // rows

        echo '<div class="flex-column">'; // column 1
        // NOM
        echo '<div class="nom">' . $row["nom"] . '</div>';
        // marque
        echo '<div class="marque"> Marque : ' . $row["marque"] . '</div>';
        // prix
        echo '<div class="prix"> Prix : ';
        if ($row["prix"] == '') {
            echo "<em>inconnu</em></div>";
        } else {
            echo $row["prix"];
            echo ' € </div>';
        }
        // nombre de touches
        echo '<div class="nb_touches">' . $row["nombre_touches"] . ' touches </div>';
        // site original du clavier
        /* echo '<div class="site_original"> Site du clavier : <a href="' . $row['hlink'] . '"></a> </div>'; */

        // LISTE DES PROPRIÉTÉS
        echo '<ul class="propriétés">';
        // propriétés vraies
        if ($row["mécanique"])    { echo '<li> Mécanique    </li>'; }
        if ($row["split"])        { echo '<li> Split        </li>'; }
        if ($row["deux_parties"]) { echo '<li> Deux parties </li>'; }
        if ($row["columnar"])     { echo '<li> Columnar     </li>'; }
        if ($row["orthogonal"])   { echo '<li> Orthogonal   </li>'; }
        if ($row["manuform"])     { echo '<li> Manuform     </li>'; }
        if ($row["programmable"]) { echo '<li> Programmable </li>'; }
        if ($row["bluetooth"])    { echo '<li> Bluetooth    </li>'; }
        // propriétés fausses
        if (!$row["mécanique"])    { echo '<li class="line_through"> Mécanique    </li>'; }
        if (!$row["split"])        { echo '<li class="line_through"> Split        </li>'; }
        if (!$row["deux_parties"]) { echo '<li class="line_through"> Deux parties </li>'; }
        if (!$row["columnar"])     { echo '<li class="line_through"> Columnar     </li>'; }
        if (!$row["orthogonal"])   { echo '<li class="line_through"> Orthogonal   </li>'; }
        if (!$row["manuform"])     { echo '<li class="line_through"> Manuform     </li>'; }
        if (!$row["programmable"]) { echo '<li class="line_through"> Programmable </li>'; }
        if (!$row["bluetooth"])    { echo '<li class="line_through"> Bluetooth    </li>'; }
        echo '</ul>';

        echo '<div class="hlink"><a href="' . $row["hlink"] . '">Site du clavier</a></div>';

        echo '</div>'; // end of column 1

        echo '<div class="flex-column">'; // column 2

        // show the image
        if (file_exists("DB/images/clavier/" . $row["nom"] . '.png')) {
            echo '<img src="DB/images/clavier/' . $row["nom"] . '.png">'; // the image is named the same as the keyboard
        } else {
            echo 'aucune image';  // if the image file isn't found
        }

        /* echo '</div>'; */
        echo '</div>'; // end of column 2

        echo '</div>'; // end of row
        echo '</div>'; // end of .keyboard
    }
}

$mysqli->close();

?>

        </div>
    </div>
</body>
</html>

