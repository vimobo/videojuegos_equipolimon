<link rel="stylesheet" href="./form.css">


<p>
    Tipo <?= $tipo ?>
</p>
<p>
    zona <?= $zona ?>
</p>
<p>
    direccion <?= $direccion ?>
</p>
<p>
    nDormitorios <?= $nDormitorios ?>
</p>
<p>
    precio <?= $precio ?>
</p>
<p>
    tamanio <?= $tamanio ?>
</p>
<p>
    observaciones <?= $observaciones ?>
</p>
<p>
    <?php if (!empty($extras)): ?>
        Extras;
        <?php foreach ($extras as $extra): ?>

                    <?= $extra?>  

            <?php endforeach; ?>
            .
    <?php endif; ?>

</p>