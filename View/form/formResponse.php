<link rel="stylesheet" href="./form.css">

<p>
    Hola <?= substr($mail, 0, strpos($mail, "@")) ?>
</p>

<div>
    <form method="POST" action="addGame">
        <input type="file" name="gamefile" id="gameFile" value="Introduce un Juego">
    </form>
</div>

