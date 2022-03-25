<?php
$dsn = 'mysql:host=localhost;dbname=bugtracker';
$username = 'app_user';
$password = '!wZk6bXU5BOLIhm/';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}