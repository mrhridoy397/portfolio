<?php require_once('./controller/AboutController.php'); ?>
<?php
$about = new about();
$Response = [];
$active = $about->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $about->delete($_REQUEST['id']);

?>