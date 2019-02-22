<?php

$link = mysqli_connect('localhost','root', '', 'my_first_blog');

if(mysqli_connect_errno())
{
    echo 'ошибка в подколючении('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}