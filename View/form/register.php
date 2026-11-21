<h1>Register</h1>

<form method="POST" action="/processRegister">
    <link rel="stylesheet" href="./form.css">

    <p>
        <label for="mail">Mail</label>
        <input type="email" placeholder="mail" name="register[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        
        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
        <?php endif; ?>
    </p>

    <p>
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password" value="<?= ($password ?? '') ?>"/>
        
        <?php if (!empty($errors['password'])): ?>
            <?= $errors['password'] ?>
        <?php endif; ?>
        
        <label for="passwordR">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password"/>
    </p>

    <input type="submit" />
</form>