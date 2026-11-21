<h1>All Games</h1>
<? $files ?>
<?php if (!empty($files)): ?>
    <?php foreach ($files as $file): ?>
        <div class="game">
            <h2><?= $file['fileName'] ?? "" ?></h2>

            <p>Author: <?= $file['author'] ?? "" ?></p>

            <p>Category: <?= $file['category'] ?? "" ?></p>

            <p><?= $file['description'] ?? "" ?></p>

            <a href="/games/download?file=<?= urlencode($file['path']) ?>">
                Download game
            </a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>There's no games to show.</p>
<?php endif; ?>

<a href="./login">Exit</a>

</form>