<?php require_once('./controller/CounterController.php'); ?>
<?php
$counter = new counter();
$Response = [];
$active = $counter->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $counter->delete($_REQUEST['id']);

?>