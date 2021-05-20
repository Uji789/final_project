<?php 

require_once('connect.php');

$fact_title = $_POST['fact_title'];
$fact_text = $_POST['fact_text'];
$id = $_POST['fact_id'];

mysqli_query($connect, "UPDATE `bp_facts` SET `fact_title` = '$fact_title', `fact_text` = '$fact_text' WHERE `bp_facts`.`id` = '$id'");

header('Location: ../facts_page/index.php');

?>