<h1>Login</h1>

<form method="POST" action="index.php?controller=Form&amp;action=process">
    <link rel="stylesheet" href="./form.css">



    <p>
        <label for="mail">Mail</label>
        <input type="email" placeholder="mail" name="login[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
        <?php endif; ?>
    </p>


    <p>
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="login[password]" id="password"
            value="<?= ($password ?? '') ?>"/>
        <?php if (!empty($errors['password'])): ?>
            <?= $errors['password'] ?>
        <?php endif; ?>
    </p>


    <input type="submit" />

</form>