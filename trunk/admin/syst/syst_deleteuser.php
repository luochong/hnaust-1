<?php 
require_once("../../include/session.class.php");
require_once("syst_deleteuser.class.php");

$delete = new deleteuser();
$user_id = $_GET["id"];
$delete->deleteAccount($user_id);

?>