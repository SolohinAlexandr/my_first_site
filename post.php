<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

include_once 'app/header.php';
$post_id = $_GET['post_id'];
$post = get_post_by_id($post_id);

?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1><?=$post['title']?></h1>
            </div>
            <ul class="list-inline">
                <li><i class="glyphicon glyphicon-list"></i><a href="#"> Название категории</a> | </li>
                <li><i class="glyphicon glyphicon-calendar"></i> 11 декабря 2018 00:25</li>
            </ul>
            <hr>
            <div class="post-content">
                <img src=" <?=$post['image']?>" align="left" style="padding: 0 10px 10px 0;">
                <?=$post['content']?>
            </div>
        </div>
        <div class="col-md-3">
            sidebar
        </div>
    </div>
</div>

<?php

include_once 'app/footer.php';

?>
