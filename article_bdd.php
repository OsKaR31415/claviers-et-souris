<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ergoscar - information sur la base de données</title>
</head>
<body>
    <?php include('header.inc.php'); ?>

    <div class="container">
        <div class="contents">
            <h1>Information sur la base de données</h1>
            Voici quelques informations sur l'état actuel de la base de données.

            <h3>Claviers</h3>

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

function show_table_as_dict($key_col_title, $key_col_name, $values_col_title, $values_col_name, $sql_data) {
    /* Show a sql table as a kind of dictionnary (show 2 columns of it)
     *
     * Args:
     *      $key_col_title : The title of the "keys" (the left column).
     *      $key_col_name : The  name of the "keys" column in the sql result.
     *      $values_col_title : The title of the "values" (the right column).
     *      $values_col_name : The name of the "values" column in the sql result.
     *      $sql_data : the data as output by *mysqli_query*
     *  Returns:
     *      None, but echoes the table.
     */
    echo "<table>";
    echo "<thead>";
    echo "<tr>  <td>" . $key_col_title . "</td> <td>" . $values_col_title . "</td>  </tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($sql_data)) {
        echo "<tr>";
        echo "<td>" . $row[$key_col_name] . "</td>";
        echo "<td>" . $row[$values_col_name] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}


$query_nb_keybs_compatible_by_os = "SELECT os, COUNT(id_clavier) FROM CLAVIER_COMPATIBLE GROUP BY os;";
$nb_keybs_compatible_by_os = mysqli_query($mysqli, $query_nb_keybs_compatible_by_os);

echo "<br/><br/>";
echo "Nombre de claviers compatibles à un OS donné :";
echo "<br/><br/>";
show_table_as_dict("OS", "os", "nombre de claviers compatibles", "COUNT(id_clavier)", $nb_keybs_compatible_by_os);


echo "<br/><br/>";
echo "<br/><br/>";

$query_nb_mice_compatible_by_os = "SELECT os, COUNT(id_souris) FROM SOURIS_COMPATIBLE GROUP BY os;";
$nb_mice_compatible_by_os = mysqli_query($mysqli, $query_nb_mice_compatible_by_os);

echo "<br/><br/>";
echo "Nombre de claviers compatibles à un OS donné :";
echo "<br/><br/>";
show_table_as_dict("OS", "os", "nombre de claviers compatibles", "COUNT(id_clavier)", $nb_keybs_compatible_by_os);


echo "<br/><br/>";
echo "<br/><br/>";


?>

        </div>
    </div>
</body>
</html>
