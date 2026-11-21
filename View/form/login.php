<h1>Login</h1>

<form method="POST" action="processLogin">
    <p>
        <label for="mail">Mail</label>
        <input type="email" placeholder="mail" name="login[mail]" id="mail" value="<?= ($mail ?? '') ?>" />

        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
        <?php endif; ?>
    </p>
            
    <p>
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="login[password]" id="password" />

        <?php if (!empty($errors['password'])): ?>
            <?php foreach ($errors['password'] as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </p>

    <p>
        <?php if (!empty($errors['auth'])): ?>
            <?= $errors['auth'] ?>
        <?php endif ?>
    </p>

    <input type="submit" />
</form>