<?php 

require_once('connect.php');

$post_title = $_POST['post_title'];
$post_text = $_POST['post_text'];
$post_intens = $_POST['post_intens'];
$post_image = $_POST['post_image'];
$post_author = $_POST['post_author'];
$post_about = $_POST['post_about'];

// $post_type = $_POST['post_type'];

// if ($post_type == 'image_yes') {
// $path = 'img/' . time() . $_FILES['post_image']['name'];
//     move_uploaded_file($_FILES['post_image']['tmp_name'], '../' . $path);

//     $post_image = '/' . $path;
// }
// $path = 'img/' . time() . $_FILES['post_image']['name'];
// move_uploaded_file($_FILES['post_image']['tmp_name'], '../' . $path);
// $post_image = '/' . $path;

// if(move_uploaded_file($_FILES['post_image']['tmp_name'], '../' . $path)){
//     echo 'файл загружен на сервер: <b>'.$path;
//     $sql = $db->query('UPDATE {bp_posts} SET img = '.$path);
//     $post_image = '/' . $path;
//     var_dump($sql);
// }else{
//     echo 'файл не удалось загрузить!';
// }



move_uploaded_file($_FILES['post_image']['tmp_name'], '../' . $path);

mysqli_query($connect, "INSERT INTO `bp_posts` (`id`, `post_title`, `post_text`, `post_intens`, `post_image`, `post_author`, `post_about`) VALUES (NULL, '$post_title', '$post_text', '$post_intens', '$post_image', '$post_author', '$post_about');");

header('Location: ../index.php');

?>