<?php
include "../classes/User.php";

$user = new User;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user->login($username, $password);
} 

?>
