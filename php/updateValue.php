<?php 

require_once('connect.php');

$post_title = $_POST['post_title'];
$post_text = $_POST['post_text'];
$post_intens = $_POST['post_intens'];
$post_author = $_POST['post_author'];
$post_about = $_POST['post_about'];
$id = $_POST['post_id'];

mysqli_query($connect, "UPDATE `bp_posts` SET `post_title` = '$post_title', `post_text` = '$post_text', `post_intens` = '$post_intens', `post_author` = '$post_author', `post_about` = '$post_about' WHERE `bp_posts`.`id` = '$id'");

header('Location: /admin_panel/index.php');

?>