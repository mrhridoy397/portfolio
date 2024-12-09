<?php require_once('./controller/PricingController.php'); ?>
<?php
$Pricing = new Pricing();
$Response = [];
$active = $Pricing->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Pricing->delete($_REQUEST['id']);

?>