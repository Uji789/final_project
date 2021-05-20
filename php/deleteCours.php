<?php 

require_once('connect.php');

$post_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `bp_posts` WHERE `bp_posts`.`id` = $post_id");

header('Location: ../index.php');
?>