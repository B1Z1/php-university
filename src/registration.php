<?php
include_once 'boot.php';
include_once 'share/user-hobby/user-hobby.inc.php';
include_once 'share/hobby/hobby.inc.php';
include_once 'share/degree/degree.inc.php';

$hobbyController = new HobbyController();
$degreesController = new DegreeController();

$hobbies = $hobbyController->getAll();
$degrees = $degreesController->getAll();

?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Rejestracja</title>
</head>
<body>

<div class="up-height-screen container is-full is-flex is-flex-direction-column is-align-items-center is-justify-content-center">
    <div class="column is-half">
        <h1 class="up-text-center title">
            Rejestracja
        </h1>

        <form action="app/registration/registration.php" method="post">
            <div class="field">
                <label for="name" class="label">Imię:</label>
                <input id="name"
                       class="input"
                       type="text"
                       name="name"
                       placeholder="Wpisz swoje imię..."
                       required>
            </div>

            <div class="field">
                <label for="surname" class="label">Nazwisko:</label>
                <input id="surname"
                       class="input"
                       type="text"
                       name="surname"
                       placeholder="Wpisz swoje nazwisko..."
                       required>
            </div>

            <div class="field">
                <label for="email" class="label">Email:</label>
                <input id="email"
                       class="input"
                       type="email"
                       name="email"
                       placeholder="Wpisz swój email..."
                       required>
            </div>

            <div class="field">
                <label for="login" class="label">Login:</label>
                <input id="login"
                       class="input"
                       type="text"
                       name="login"
                       placeholder="Wpisz swój login..."
                       minlength="4"
                       required>
            </div>

            <div class="field">
                <label for="password" class="label">Hasło:</label>
                <input id="password"
                       class="input"
                       type="password"
                       name="password"
                       minlength="4"
                       placeholder="Wpisz swoje hasło..."
                       required>
            </div>

            <div class="field">
                <label for="address" class="label">Adres:</label>
                <input id="address"
                       class="input"
                       type="text"
                       name="address"
                       placeholder="Wpisz swój adres..."
                       required>
            </div>

            <div class="field">
                <label for="hobbies" class="label">Wykształcenie:</label>
                <div class="up-width-full select">
                    <select id="degree"
                            class="up-width-full"
                            name="degree"
                            required>
                        <?php foreach ($degrees as $key => $degree) { ?>
                            <option value="<?php echo $degree->id; ?>">
                                <?php echo $degree->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="hobbies" class="label">Hobby:</label>
                <div class="up-width-full select is-multiple">
                    <select id="hobbies"
                            class="up-width-full"
                            name="hobbies[]"
                            multiple
                            required>
                        <?php foreach ($hobbies as $hobby) { ?>
                            <option value="<?php echo $hobby->id; ?>">
                                <?php echo $hobby->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <button type="submit"
                    name="submit"
                    class="is-block mx-auto button">
                Zarejestruj się
            </button>
        </form>
    </div>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
