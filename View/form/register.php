<h1>Register</h1>

<<<<<<< HEAD
<form method="POST" action="index.php?controller=Form&amp;action=process">
=======
<form method="POST" action="index.php?controller=Auth&amp;action=processRegister">
>>>>>>> main
    <link rel="stylesheet" href="./form.css">

    <p>
        <label for="mail">Mail</label>
<<<<<<< HEAD
        <input type="email" placeholder="mail" name="register[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        
        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
=======
        <input type="text" placeholder="mail" name="register[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        
        <?php if (!empty($errors['mail'])): ?>
            <?= $errors['mail'] ?>
>>>>>>> main
        <?php endif; ?>
    </p>

    <p>
<<<<<<< HEAD
        <label for="password">Password</label>
        <input type="password" placeholder="password..." name="register[password]" id="password" value="<?= ($password ?? '') ?>"/>
        
        <?php if (!empty($errors['password'])): ?>
            <?= $errors['password'] ?>
        <?php endif; ?>
=======
        
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
>>>>>>> main
    </p>

    <input type="submit" />
</form>