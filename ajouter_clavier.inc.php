
<form action="insert_clavier.php">
    <div class="flex-container">
        <div><h2>Ajouter un clavier</h2></div>

        <div>
            <label for="nom">Nom du clavier :</label>
            <input type="text" name="nom" pattern="[a-z A-Z 0-9 -]{5,42}" required/>
            <label for="nom"> (minimum 5 caractères, maximum 42 caractères) </label>
            <!-- The regex matches alphanumeric characters (plus - and space) but only up to 42 ones.
            That is because the database stores names as VARCHAR(42).
            being quite restrictive on symbols protects for SQL injections. -->
        </div>

        <div>
            <label for="marque">Marque du clavier :</label>
            <input type="text" name="marque" pattern="[a-z A-Z 0-9 -]{0,42}" required/>
            <label for="marque">(maximum 42 caractères)</label>
            <!-- The regex matches alphanumeric characters (plus - and space) but only up to 42 ones.
            That is because the database stores brands as VARCHAR(42).
            being quite restrictive on symbols protects for SQL injections. -->
        </div>

        <div>
            <label for="prix">Prix (en €) :</label>
            <input type="number" name="prix" min="0" max="3000"/>
            <!-- 3000 € is a reasonable maximum (in a definition of *reasonable*) -->
            <!-- the field is not required, since some keyboards only exists as a plan and you have to make them yourself -->
        </div>

        <div>
            <label for="nombre_touches">Nombre de touches :</label>
            <input type="number" name="nombre_touches" min="0" max="500" required/>
        </div>

        <div><h4>Propriétés</h4></div>
        <div>
            <label for="mécanique">Clavier mécanique ? </label>
            <input type="checkbox" name="mécanique"/>
        </div>

        <div>
            <label for="split">Clavier split ? </label>
            <input type="checkbox" name="split"/>
        </div>

        <div>
            <label for="deux_parties"> Deux parties ? </label>
            <input type="checkbox" name="deux_parties"/>
            <label for="deux_parties">(physiquement séparées)</label>
        </div>

        <div>
            <label for="columnar">Clavier columnar ? </label>
            <input type="checkbox" name="columnar"/>
        </div>

        <div>
            <label for="orthogonal">Clavier orthogonal ?</label>
            <input type="checkbox" name="orthogonal"/>
        </div>

        <div>
            <label for="manuform">Clavier manuform ?</label>
            <input type="checkbox" name="manuform"/>
        </div>

        <div>
            <label for="programmable">Clavier programmable ?</label>
            <input type="checkbox" name="programmable"/>
        </div>

        <div>
            <label for="bluetooth">Fonctionne en Bluetooth ?</label>
            <input type="checkbox" name="bluetooth"/>
        </div>

        <div>
            <label for="hlink">Site (officiel) du clavier : </label>
            <input type="url" name="hlink" required/>
        </div>

        <div>
            <input type="submit" class="submit" name="action" value="Ajouter le clavier"/>
        </div>

    </div>
</form>

