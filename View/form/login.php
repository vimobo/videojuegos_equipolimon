<h1>Login</h1>

<<<<<<< HEAD
<<<<<<< HEAD
<form method="POST" action="index.php?controller=Form&amp;action=process">
=======
<form method="POST" action="index.php?controller=Auth&amp;action=processLogin">
>>>>>>> main
=======
<form method="POST" action="processLogin">
>>>>>>> main
    <link rel="stylesheet" href="./form.css">



    <p>
        <label for="mail">Mail</label>
<<<<<<< HEAD
        <input type="email" placeholder="mail" name="login[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        <?php if (!empty($errors['email'])): ?>
            <?= $errors['email'] ?>
=======
        <input type="text" placeholder="mail" name="login[mail]" id="mail" value="<?= ($mail ?? '') ?>" />
        <?php if (!empty($errors['mail'])): ?>
            <?= $errors['mail'] ?>
<<<<<<< HEAD
>>>>>>> main
        <?php endif; ?>
=======
        <?php endif ?>
>>>>>>> main
    </p>


    <p>
        <label for="password">Password</label>
<<<<<<< HEAD
        <input type="password" placeholder="password..." name="login[password]" id="password"
            value="<?= ($password ?? '') ?>"/>
=======
        <input type="password" placeholder="password..." name="login[password]" id="password" />
>>>>>>> main
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