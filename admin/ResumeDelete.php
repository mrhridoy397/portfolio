<?php require_once('./controller/ResumeController.php'); ?>
<?php
$resume = new resume();
$Response = [];
$active = $resume->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $resume->delete($_REQUEST['id']);

?>