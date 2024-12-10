<?php require_once('./controller/testimonialsController.php'); ?>
<?php
$testimonials = new testimonials();
$Response = [];
$active = $testimonials->active;
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $testimonials->delete($_REQUEST['id']);

?>