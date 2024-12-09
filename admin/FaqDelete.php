<?php require_once('./controller/FaqController.php'); ?>
<?php
$Faq = new Faq();
$Response = [];
$active = $Faq->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Faq->delete($_REQUEST['id']);

?>