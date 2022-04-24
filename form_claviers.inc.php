

<!-- TODO: switch to POST method -->
<form action="claviers.php" method="get">
    <div class="flex-container">

        <h3>Trier par</h3>
        <div> <!-- sélection du type de tri (par prix / par nombre de touches) -->
            <input type="radio"
            name="prix_ou_nb_touches" id="select_prix" value="prix"
            checked
            oninput="switch_to_price_selection();"/>
            <label for="select_prix">Prix</label>
            <br>
            <input type="radio"
            name="prix_ou_nb_touches" id="select_nb_touches" value="nb_touches"
            oninput="switch_to_nb_keys_selection();"/>
            <label for="select_nb_touches">nombre de touches</label>
        </div>

        <div id="price_selector"> <!-- slider du prix -->
            <input type="range" name="prix"
            value="220" min="60" max="500" step="20"
            list="label_touches"
            oninput="this.nextElementSibling.value = this.value"
            />
            <output>220</output>
            <label for="prix">€</label>
        </div>

        <div id="nb_keys_selector"> <!-- slider du nombre de touches -->
            <input type="range" name="nb_touches"
            value="60" min="0" max="120" step="10"
            list="label_touches"
            oninput="this.nextElementSibling.value = this.value"
            />
            <output>60</output>
            <label for="nb_touches"> touches </label>
        </div>

        <div>
            <br/>
            <h3>Propriétés</h3>
        </div>
        <div>
            <input type="checkbox" name="split" class="checkbox">
            <label for="split"> <strong>split</strong> (touches séparées en deux parties) </label>
        </div>
        <div>
            <input type="checkbox" name="deux_parties" class="checkbox">
            <label for="deux_parties"> <strong>deux parties</strong> (deux parties séparées physiquement) </label>
        </div>
        <div>
            <input type="checkbox" name="columnar" class="checkbox">
            <label for="columnar"> <strong>columnar</strong> (touches alignées en colonnes plutôt qu'en lignes)</label>
        </div>
        <div>
            <input type="checkbox" name="orthogonal" class="checkbox">
            <label for="orthogonal"> <strong>orthogonal</strong> (touches organisées en grille) </label>
        </div>
        <div>
            <input type="checkbox" name="manuform" class="checkbox">
            <label for="manuform"> <strong>manuform</strong> (touches en 3D pour suivre la main) </label>
        </div>

        <div><br/></div>
        <div>
            <input class="checkbox" type="checkbox" name="bluetooth">
            <label for="bluetooth"> <strong>Bluetooth</strong> </label>
        </div>

        <div><br/></div>
        <div>
            <input type="checkbox" name="avec_trackpad" class="checkbox">
            <label for="avec_trackpad"> <strong>trackpad intégré</strong> </label>
        </div>
        <div>
            <input type="checkbox" name="avec_trackball" class="checkbox">
            <label for="avec_trackball"> <strong>trackball intégrée</strong> </label>
        </div>

        <div>
            <br/>
            <h4>OS compatibles</h4>
        </div>
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


<script type="text/javascript">
function switch_to_nb_keys_selection() {
    document.getElementById('price_selector').style.display = 'none';
    document.getElementById('nb_keys_selector').style.display = 'block';
}

function switch_to_price_selection() {
    document.getElementById('price_selector').style.display = 'block';
    document.getElementById('nb_keys_selector').style.display = 'none';
}

function ensure_display_is_coherent() {
    if (document.getElementById('price_selector').style.display != 'none') {
        document.getElementById('nb_keys_selector').style.display = 'none';
    }
}

ensure_display_is_coherent();
</script>


