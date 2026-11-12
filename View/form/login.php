<h1>Login</h1>

<<<<<<< HEAD
<form method="POST" action="index.php?controller=Form&amp;action=process">
=======
<form method="POST" action="index.php?controller=Auth&amp;action=processLogin">
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
>>>>>>> main
        <?php endif; ?>
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
            <?= $errors['password'] ?>
        <?php endif; ?>
    </p>


    <input type="submit" />

</form>