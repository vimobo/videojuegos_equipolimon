<link rel="stylesheet" href="./form.css">

<p>
    <!-- Hola <?= substr($mail, 0, strpos($mail, "@")) ?>
    !-->
</p>

<div>
    <form method="POST" action="addGame" enctype="multipart/form-data">

        <label for="gameName">Name</label>
        <input type="text" name="game[name]" id="gameName" value="<?=$author?>">

        <label for="gameDescription">Description</label>
        <input type="text" name="game[description]" id="gameDescription">

        <label for="gameAuthor">Author</label>
        <input type="text" name="game[author]" id="gameAuthor">

        <label  for="gameCategory">Game Category</label>
        <input type="text" name="game[category]" id="submitButton">

        <input type="file" name="game" id="gamefile">
        <input type="submit" value="Upload Game" id="submitButton">
    </form>
    <p>
        <? $errors ?>
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
            <p>
                <?= $error ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
    </p>
</div>