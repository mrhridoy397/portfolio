<?php require_once('./controller/PortfolioController.php'); ?>
<?php
$portfolio = new portfolio();
$Response = [];
$active = $portfolio->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $portfolio->delete($_REQUEST['id']);

?>