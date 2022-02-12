<?php

require_once '../../boot.php';

if (!isset($_POST['submit']) && !isset($_GET['token'])) {
    navigateTo('');
    exit();
}

require_once 'share/utils/dbh/Dbh.php';
require_once 'share/product/product.inc.php';

require_once 'app/admin/admin.inc.php';

$token = $_GET['token'];
$controller = new AdminController();

$id = $_POST['productId'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

if ($controller->editProduct($id, $name, $description, $price)) {
    navigateTo(getUrlWithToken('admin', $token));
    exit();
}

navigateTo('admin?error=PRODUCT_NOT_EDITED');
exit();

