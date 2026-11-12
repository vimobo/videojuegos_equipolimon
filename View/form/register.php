<h1>Register</h1>

<form method="POST" action="index.php?controller=Auth&amp;action=processRegister">
    <link rel="stylesheet" href="./form.css">

    <p>
        <label for="mail">Mail</label>
        <input type="text" placeholder="mail" name="register[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        
        <?php if (!empty($errors['mail'])): ?>
            <?= $errors['mail'] ?>
        <?php endif; ?>
    </p>

    <p>
        
        <label for="passwordR">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password"/>
    </p>

    <p>
        <label for="passwordR">Repeat Password</label>
        <input type="password" placeholder="password..." name="register[passwordR]" id="passwordR"/>
        
           <?php if (!empty($errors['password'])): ?>
        <?php foreach ($errors['password'] as $error): ?>

                    <?= $error?>  

            <?php endforeach; ?>
            .
    <?php endif; ?>
    </p>

    <input type="submit" />
</form>