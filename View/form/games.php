<h1>All Games</h1>

<?php if (!empty($files)): ?>
    <?php foreach ($files as $file): ?>
        <div class>

            <p>
                <?= $file ?>
            </p>
        </div>
        <a href=""></a>
    <?php endforeach; ?>
<?php else: ?>
<p>
    There's no games to show.
</p>

<?php endif; ?>
<a href="./login">Exit</a>