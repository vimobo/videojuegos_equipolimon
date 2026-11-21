<h1>Register</h1>

<form method="POST" action="/processRegister">
    <link rel="stylesheet" href="./form.css">

    <p>
        <label for="mail">Mail</label>
        <input type="email" placeholder="mail" name="register[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        
        <?php if (!empty($errors['mail'])): ?>
            <?php foreach ($errors['mail'] as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </p>

    <p>
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password"/>
        
        <?php if (!empty($errors['password'])): ?>
            <?php foreach ($errors['password'] as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <label for="passwordR">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password"/>
    </p>

    <input type="submit" />
</form>