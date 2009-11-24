<?php 
require_once("../../include/session.class.php");
require_once("syst_delitem.class.php");

$item_id = $_GET['id'];
echo $item_id;
$delitem = new delitem();
$delitem->item_del($item_id);

?>