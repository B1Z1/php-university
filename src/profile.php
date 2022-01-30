<?php
require_once 'boot.php';

$userLogin = $_GET['userLogin'];

if (!isset($userLogin)) {
    navigateTo('');
}

require_once 'share/user/user.inc.php';
require_once 'share/user-hobby/user-hobby.inc.php';
require_once 'share/hobby/hobby.inc.php';
require_once 'share/degree/degree.inc.php';

$userController = new UserController();
$hobbyController = new HobbyController();
$degreeController = new DegreeController();

$user = $userController->getUserByLogin($userLogin);
$hobbies = $hobbyController->getByUserId($user->id);
$degree = $degreeController->getById($user->degreeId);

?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'base/head.php'; ?>
    <title><?php echo $user->name ?> Profile page</title>
</head>
<body>

<div class="up-height-screen container is-full is-flex is-flex-direction-column is-align-items-center is-justify-content-center">
    <h1 class="up-text-center title">
        Hejka, nazywam się <?php echo $user->name . ' ' . $user->surname; ?>
    </h1>

    <p>Moje wykształcenie to <?php echo $degree->name; ?></p>

    <p>
        Mój mail to <a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
    </p>

    <address>Mieszkam w <?php echo $user->address; ?></address>

    <h2 class="subtitle mt-6">Moje hobby to</h2>

    <ul class="up-text-center">
        <?php foreach ($hobbies as $hobby) { ?>
            <li>
                <b><?php echo $hobby->name; ?></b>
            </li>
        <?php } ?>
    </ul>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
