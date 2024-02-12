<?php
session_start();
require_once(realpath(__DIR__.'/../classes/actions.class.php'));
$actionClass = new Actions();
if(isset($_POST['id'])){
  $class = $actionClass->get_class($_POST['id']);
  extract($class);
}
?>
