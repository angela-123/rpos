<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$result = $db_handle->executeUpdate("UPDATE positems set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  itid=".$_POST["id"]);
?>