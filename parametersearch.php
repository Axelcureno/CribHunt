      <div id="parameter-search">
      <div class=" titulo-parameter mdl-typography--display-1">Realiza una búsqueda</div>
      <form id="parameter-cribsearch" action="" method="get">
        <div class="frame">
          <div class="linea-parameter-search bit-4">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="cribsearch-places" name="ciudadocolonia" />
              <label class="mdl-textfield__label" for="cribsearch-places"><?php if (isset($_GET['ciudad-cribsearch'])) { echo $_GET['ciudad-cribsearch']; } else { echo "Ciudad y/o Colonia"; } ?></label>
            </div>
          </div>
          <div style="margin-top: 30px;" class="linea-parameter-search bit-4">
              <label for="categoria">Categoría</label>
              <select id="parameter-select" name="categoria">
                <option value="cualquiera" selected>Cualquiera</option>
                <option value="casa">Casa</option>
                <option value="departamento">Departamento</option>
                <option value="cuarto">Cuarto</option>
              </select>
          </div>
          <div class="linea-parameter-search bit-4">
              <label for="precio">Precio</label>
              <div id="slider-precio-cribsearch"></div>
              <input type="text" id="amount" name="precio" readonly>
          </div>
          <div class="linea-parameter-search  bit-4">
            <button id="submit-parameter-cribsearch" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              BUSCAR
            </button>
          </div>
        </div>
      </form>
      </div>