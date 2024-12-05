<?php require_once('./controller/heroariaController.php'); ?>
<?php
$heroaria = new heroaria();
$Response = [];
$active = $heroaria->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $heroaria->delete($_REQUEST['id']);

?>