<p id="intro-text">Al momento abbiamo <?= $totalJokes ?> barzellette da proporti, eccole!</p>
<?php foreach ($jokes as $joke) : ?>
    <form action="/joke/delete" method="POST" id="joke-line-form">
        <div class="joke-line">
            <div id="joke-author-email">
                <p id="joke-text">" <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8'); ?> "</p>
                <?php $theDate = new DateTime($joke['jokedate']);
                ?>
                <p id="author-email"><em><?= htmlspecialchars($joke['name']); ?></em> <a href="mailto:<?= $joke['email']; ?>">( <?= $joke['email']; ?> )</a>, <?= $theDate->format('d M Y'); ?></p>
                <p></p>
            </div>
            <input type="hidden" name="id" value="<?= $joke['id']; ?>">
            <?php $baseDir = '/Again/' . ltrim(__DIR__, '\/Applications\/MAMP\/htdocs\/Again'); ?>
            <p class="del-edit">
                <a class="a-edit" href="/joke/edit?jokeid=<?= $joke['id']; ?>">Edit</a>
                <button type="submit">ELIMINA</button>
            </p>
        </div>
    </form>
<?php endforeach; ?>