<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ijdb</title>
    <link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= '/joke/home' ?>">Home</a></li>
                <li><a href="<?= '/joke/list' ?>">Jokes</a></li>
                <li><a href="<?= '/joke/edit' ?>">Add Joke</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="laugh-img">
        </div>
        <div id="website-title">
            <h1>The Internet Joke Database</h1>
        </div>
        <div id="page-title">
            <h2><?= $title ?></h2>
            <hr class="hr-small">
        </div>
        <div id="output">
            <?= $output; ?>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row" id="footer-content">
                <p>Copyright: Cody, Liemin, Micro, Chicago - Pesaro, 1988</p>
                <div class="row">
                    <p><a href="https://www.instagram.com/tropicalhealthcoach/" target="blank"><i class="fab fa-instagram fa-3x"></i></a></p>
                    <p><a href="https://www.facebook.com/paolo.vagnini" target="blank"><i class="fab fa-facebook fa-3x"></i></a></p>
                    <p><a href="https://www.linkedin.com/in/tropical-dev/" target="blank"><i class="fab fa-linkedin fa-3x"></i></a></p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>