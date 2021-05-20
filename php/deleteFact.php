<?php 

require_once('connect.php');

$fact_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `bp_facts` WHERE `bp_facts`.`id` = $fact_id");

header('Location: ../facts_page/index.php');
?>