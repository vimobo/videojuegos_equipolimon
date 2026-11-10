<h1></h1>

<form method="POST" action="index.php?controller=Form&amp;action=process" enctype="multipart/form-data">
    <link rel="stylesheet" href="./form.css">


    <p>
        <label for="mail">Mail</label>
        <input type="email" placeholder="mail" name="data[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
        <?php endif; ?>
    </p>


    <p>
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="data[password]" id="password"
            value="<?= ($password ?? '') ?>"/>
        <?php if (!empty($errors['password'])): ?>
            <?= $errors['password'] ?>
        <?php endif; ?>
    </p>


    <input type="submit" />

</form>