<form method="POST" action="index.php?controller=Form&amp;action=process" enctype="multipart/form-data">
    <link rel="stylesheet" href="./form.css">

    <p>
        <label for="tipo">Tipo de Vivienda</label>
        <select id="tipo" name="data[tipo]">
            <option value="piso">piso</option>
            <option value="casa">casa</option>
            <option value="adosado">adosado</option>
            <option value="chalet">chalet</option>
        </select>
    </p>

    <p>
        <label for="zona">Zona</label>
        <select id="zona" name="data[zona]">
            <option value="centro">centro</option>
            <option value="zaidin">zaidin</option>
            <option value="chana">chana</option>
            <option value="albaicin">albaicin</option>
            <option value="sacromonte">sacromonte</option>
            <option value="realejo">realejo</option>
        </select>
    </p>

    <fieldset>
        <legend>Numero Dormitorios</legend>

        <label>
            <input type="radio" name="data[nDormitorios]" value="1">
            1
        </label>

        <label>
            <input type="radio" name="data[nDormitorios]" value="2">
            2
        </label>

        <label>
            <input type="radio" name="data[nDormitorios]" value="3">
            3
        </label>

        <label>
            <input type="radio" name="data[nDormitorios]" value="4">
            4
        </label>

        <label>
            <input type="radio" name="data[nDormitorios]" value="5">
            5
        </label>
        <?php if (!empty($errors['nDormitorios'])): ?>
            <?= $errors['nDormitorios'] ?>
        <?php endif; ?>
    </fieldset>


    <p>

        <label for="direccion">Dirección</label>
        <input type="text" placeholder="dirección" name="data[direccion]" id="direccion"
            value="<?= ($direccion ?? '') ?>" />
        <?php if (!empty($errors['dirección'])): ?>
            <?= $errors['dirección'] ?>
        <?php endif; ?>
    </p>



    <p>
        <label for="precio">Precio €</label>
        <input type="text" placeholder="precio..." name="data[precio]" id="precio" value="<?= ($precio ?? '') ?>" />
        <?php if (!empty($errors['precio'])): ?>
            <?= $errors['precio'] ?>
        <?php endif; ?>


    </p>

    <p>
        <label for="tamanio">tamaño m2</label>
        <input type="text" placeholder="tamaño" name="data[tamanio]" id="tamanio" value="<?= ($tamanio ?? '') ?>" />
        <?php if (!empty($errors['tamanio'])): ?>
            <?= $errors['tamanio'] ?>
        <?php endif; ?>
    </p>

    <fieldset>
        <legend>Extras</legend>

        <label>
            <input type="checkbox" name="data[extras][]" value="garaje">
            garaje
        </label>


        <label>
            <input type="checkbox" name="data[extras][]" value="piscina">
            piscina
        </label>

        <label>
            <input type="checkbox" name="data[extras][]" value="jardin">
            jardin
        </label>
        <?php if (!empty($errors['extras'])): ?>
            <?= $errors['extras'] ?>
        <?php endif; ?>
    </fieldset>

    <p>
        <label for="foto">Foto</label>
        <input name="foto" type="file">
        <?php if (!empty($errors['foto'])): ?>
            <?= $errors['foto'] ?>
        <?php endif; ?>
    </p>

    <textarea name="data[observaciones]" id="observaciones" name="observaciones" placeholder="observaciones"></textarea>

    <input type="submit" />

</form>