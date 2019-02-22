<?php

function get_categories(){

    global $link;

    $sql = "SELECT * FROM categories";

    $result = mysqli_query($link, $sql);

   $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

   return $categories;
}


function get_posts(){

    global $link;

    $sql = "SELECT * FROM posts";

    $result = mysqli_query($link, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;

}


function get_post_by_id($post_id){

    global $link;

    $sql = "SELECT * FROM posts WHERE id = ".$post_id;

    $result =  mysqli_query($link, $sql);

    $post = mysqli_fetch_assoc($result);

    return $post;
}

function generate_code($length = 8){ //число символов - длинна генерируемого кода

    $string =''; //первоначальное значение строки, оно должно быть пустое

    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789'; //символы из которых генирируем код

    $num_chars = strlen($chars); //вытягиваем из ряда символов один символ

    for ($i = 0; $i < $length; $i++){
        $string .= substr($chars, rand(1, $num_chars) - 1, 1); //циклом фор проходим количество символов указанных выше и генерируем случайный код
    }

    return $string;
}

function insert_subscriber($email){

    global $link;

    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT * FROM subcribers WHERE email = '$email'";

    $result = mysqli_query($link, $query);



    if(!mysqli_num_rows($result)){
        $subscriber_code = generate_code();

        $insert_query = "INSERT INTO subscribers (email, code) VALUES ('$email', '$subscriber_code')";

        $result = mysqli_query($link, $insert_query);

        if($result){
            return 'created';
        } else {
            return 'fail';
        }

    } else {
        return 'exist';
    }
}

function get_posts_by_category($category_id){

    global $link;

    $category_id = mysqli_real_escape_string($link, $category_id);

    $sql = 'SELECT * FROM posts WHERE category_id = "' . $category_id . '"';

    $result =  mysqli_query($link, $sql);

    $post = mysqli_fetch_assoc($result);

    return $post;
}
function get_category_title($category_id){

    global $link;

    $category_id = mysqli_real_escape_string($link, $category_id);

    $sql = 'SELECT title FROM categories WHERE id = "'.$category_id.'"';

    $result =  mysqli_query($link, $sql);

    $category = mysqli_fetch_assoc($result);

    return $category['title'];
}