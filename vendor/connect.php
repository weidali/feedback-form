<?php

$connect = mysqli_connect('localhost', 'vital118_user', 'pass123', 'vital118_test');
$connect->set_charset("utf8");

if (!$connect)
    die( 'Error connect to database!' );