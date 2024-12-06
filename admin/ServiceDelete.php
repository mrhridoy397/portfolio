<?php require_once('./controller/ServiceController.php'); ?>
<?php
$Services = new Services();
$Response = [];
$active = $Services->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Services->delete($_REQUEST['id']);

?>