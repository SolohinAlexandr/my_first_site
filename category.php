<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

include_once 'app/header.php';

?>

    <div class="conteiner">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1><?php get_category_title($_GET['id'])?>:</h1>
            </div>
            <?php
            $category_id = $_GET['id'];
            $posts = get_posts_by_category($category_id);
            foreach ($posts as $post):?>
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="<?=$post['image']?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h4><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['title']?></a></h4>
                        <p>
                            <?=mb_substr($post['content'], 0, 128, 'UTF-8').'...'?>
                        </p>
                        <p><a class="btn-info btn-sm" href="/post.php?post_id=<?=$post['id']?>">Читать полностью</a></p>
                        <br/>
                        <ul class="list-inline">
                            <li><i class="glyphicon glyphicon-list"></i><a href="#"> Название категории</a> | </li>
                            <li><i class="glyphicon glyphicon-calendar"></i> 11 декабря 2018 00:25</li>
                        </ul>
                    </div>
                </div>
                <hr>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <?php include_once 'app/sidebar.php';?>
        </div>
    </div>

<?php

include_once 'app/footer.php';

?>