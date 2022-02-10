<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . PATH_SEPARATOR);

function navigateTo(string $path): void {
    $host = $_SERVER['HTTP_HOST'];

    header("Location: http://$host/$path");
}

function getUrlWithToken(string $path, string $token): string {
    $encoded = urlencode($token);

    return "$path?token=$encoded";
}
