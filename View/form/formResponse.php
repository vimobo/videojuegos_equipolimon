<link rel="stylesheet" href="./form.css">

<p>
   <!-- Hola <?= substr($mail, 0, strpos($mail, "@")) ?>
    !-->
</p>

<div>
    <form method="POST" action="addGame" enctype="multipart/form-data">
        <input type="file" name="gamefile" id="gamefile" >
        <input type="submit" value="Upload Game" id="submitButton">
    </form>
    <p>
        <? $errors ?>
        <?php if(!empty($errors)):?>
            <?php foreach($errors as $error):?>
                <p>
                    <?= $error ?>
                </p>
                <?php  endforeach;?>
            <?php endif;?>
    </p>
</div>

