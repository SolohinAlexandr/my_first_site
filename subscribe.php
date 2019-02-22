<?php

include_once 'app/includ/Database.php';

include_once 'app/includ/functions.php';

if (isset($_POST['email'])) {

    $email = trim($_POST['email']);

    $insert_results = insert_subscriber($email);

    $header = 'Location: /?subscribe=fail';
    $header .= $insert_results;

    //функция работы над email

} else {
    header('Location: /');
}
?>