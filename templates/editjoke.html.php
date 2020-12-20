<form action="" method="POST">
    <input type="hidden" name="joke[id]" value="<?= $joke['id'] ?? ''; ?>">
    <label for="joketext">Scrivi qui la tua barzelletta</label>
    <textarea name="joke[joketext]" id="joketext" cols="30" rows="4" required oninvalid="this.setCustomValidity('Il testo non può essere vuoto!')" oninput="this.setCustomValidity('')"><?= $joke['joketext'] ?? ''; ?></textarea>
    <button type="submit">Fatto</button>
</form>