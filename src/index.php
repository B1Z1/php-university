<?php
require_once 'boot.php';
?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Home page</title>
</head>
<body>

<div class="up-height-screen container is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <h1 class="title">Witamy w ukrytym sklepie ksiażek</h1>

    <p class="mb-4">Zaloguj się by zobaczyć naszą listę</p>

    <div class="buttons">
        <a class="button" href="/login">Logowanie</a>
        <a class="button" href="/registration">Rejestracja</a>
    </div>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
