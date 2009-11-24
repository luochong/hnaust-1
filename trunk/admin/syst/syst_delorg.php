<?php 
require_once("../../include/session.class.php");
require_once("syst_delorg.class.php");

$delorg = new orgdel();
$delorg->delorg();
?>