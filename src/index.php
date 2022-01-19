<?php
$connection = new mysqli(
    "university-project_database_1",
    "root",
    "root",
    "shop",
    3306
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM degree";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["degree_id"] . " - " . $row["name"];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $postPersonQuery = "INSERT INTO person (name, surname, login, email, address, degree_id) VALUES ('$password', '$surname', '$login', '$email', '$address', '1')";
    if ($connection->query($postPersonQuery)) {
        echo "Success";
    } else {

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">
    <input type="text" name="name">
    <input type="text" name="surname">
    <input type="text" name="login">
    <input type="email" name="email">
    <input type="text" name="password">
    <input type="text" name="address">

    <button>Register</button>
</form>

</body>
</html>
