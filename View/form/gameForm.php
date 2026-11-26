<link rel="stylesheet" href="./form.css">

<p>
</p>

<div>
    <form method="POST" action="addGame" enctype="multipart/form-data">

        <label for="gameName">Name</label>
        <input type="text" name="game[gameName]" id="gameName" value="<?=$gameName ?? "" ?>">

        <label for="gameDescription">Description</label>
        <input type="text" name="game[description]" id="gameDescription" value="<?=$description ?? "" ?>">

        <label for="gameAuthor">Author</label>
        <input type="text" name="game[author]" id="gameAuthor" value="<?=$author ?? "" ?>">

        <label  for="gameCategory">Game Category</label>
        <input type="text" name="game[category]" id="submitButton" value="<?=$category ?? "" ?>">

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