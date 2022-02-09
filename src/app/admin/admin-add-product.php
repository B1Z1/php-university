<?php

require_once '../../boot.php';

if (!isset($_POST['submit'])) {
    navigateTo('');
    exit();
}


require_once 'share/utils/dbh/Dbh.php';
require_once 'share/product/product.inc.php';

require_once 'app/admin/admin.inc.php';

$controller = new AdminController();

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

if ($controller->addProduct($name, $description, $price)) {
    navigateTo('admin');
    exit();
}

navigateTo('admin?error=PRODUCT_NOT_ADDED');
exit();

