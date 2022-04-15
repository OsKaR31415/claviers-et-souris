
<!-- TODO: switch to POST method -->
<form action="souris.php" method="get">
    <div class="flex-container">

        <div> <!-- slider du nombre de prix -->
            <label for="prix">Prix : </label>
            <input type="range" name="prix" id="prix"
            value="0" min="0" max="200" step="10"
            oninput="this.nextElementSibling.value = this.value;"/>
            <output>0</output>
            <label for="prix">€</label>
        </div>

        <div><br/><h3>Propriétés</h3></div>
        <div>
            <input type="checkbox" name="bluetooth">
            <label for="bluetooth">Bluetooth</label>
        </div>

        <div><br/><h3>Positionnement</h3></div>
        <div>
            <input type="radio" name="position" id="seule" value="seule" checked>
            <label for="seule">Seule</label>
        </div>
        <div>
            <input type="radio" name="position" id="sur_ordinateur" value="sur_ordinateur">
            <label for="sur_ordinateur">Sur un <strong>ordinateur</strong></label>
        </div>
        <div>
            <input type="radio" name="position" id="sur_clavier" value="sur_clavier">
            <label for="sur_clavier">Sur un <strong>clavier</strong></label>
        </div>

        <div><br/></div>
        <div>
            <input type="radio" name="type_souris" value="souris" id="select_souris"/>
            <label for="select_souris">Souris</label>
        </div>
        <div>
            <input id="select_trackpad" type="radio" name="type_souris" value="trackpad"/>
            <label for="select_trackpad">Trackpad</label>
        </div>
        <div>
            <input id="select_trackball" type="radio" name="type_souris" value="trackball"/>
            <label for="select_trackball">Trackball</label>
        </div>
        <div>
            <input id="select_any" type="radio" name="type_souris" value="any"
            checked/>
            <label for="select_any">Tous</label>
        </div>

        <div><br/><h4>OS compatibles</h4></div>
        <div class="small">
            <input type="checkbox" name="linux" class="checkbox">
            <label for="linux"> Compatible <strong>Linux</strong></label>
        </div>
        <div class="small">
            <input type="checkbox" name="macos" class="checkbox">
            <label for="macos"> Compatible <strong>macOS</strong> </label>
        </div>
        <div class="small">
            <input type="checkbox" name="windows" class="checkbox">
            <label for="windows"> Compatible <strong>Windows</strong> </label>
        </div>

        <div>
            <br/>
            <input type="submit" class="submit" name="action" value="Rechercher"/>
            <input type="submit" class="submit" name="action" value="Tous les claviers"/>
        </div>


    </div>
</form>
