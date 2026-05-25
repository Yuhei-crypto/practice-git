<?php
    include '../classes/User.php';

    // creat an object
    $user = new User;

    // call the method
    $user->store($_POST);
?>