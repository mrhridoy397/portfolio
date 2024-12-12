<?php require_once('./controller/SettingsController.php'); ?>
<?php
$settings = new Settings();
$Response = [];
$active = $settings->active;
$data = $settings->edit();
if (isset($_REQUEST['submit']) && count($_REQUEST) > 0) $Response = $settings->Update($_REQUEST, $_FILES);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Portfolio</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('./partials/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('./partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $active; ?></h1>
                    </div>
                    <?php if (isset($Response['status']) && !$Response['status']) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <span><B>Oops!</B> Some errors occurred in your form.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                    <div class=" col-md-12 mt-4"> 
                                            <div class="form-group">
                                                <label for="<?php echo $data[1]['Title']; ?>" ><?php echo $data[1]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[1]['Title']; ?>" class="form-control form-control-user" placeholder="Button Linke" name="<?php echo $data[1]['Title']; ?>"  value="<?php echo $data[1]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[3]['Title']; ?>" ><?php echo $data[3]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[3]['Title']; ?>" class="form-control form-control-user" placeholder="WhatsApp" name="<?php echo $data[3]['Title']; ?>"  value="<?php echo $data[3]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[4]['Title']; ?>" ><?php echo $data[4]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[4]['Title']; ?>" class="form-control form-control-user" placeholder="Facebook" name="<?php echo $data[4]['Title']; ?>"  value="<?php echo $data[4]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[5]['Title']; ?>" ><?php echo $data[5]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[5]['Title']; ?>" class="form-control form-control-user" placeholder="Instagram" name="<?php echo $data[5]['Title']; ?>"  value="<?php echo $data[5]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[6]['Title']; ?>" ><?php echo $data[6]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[6]['Title']; ?>" class="form-control form-control-user" placeholder="Linkedin" name="<?php echo $data[6]['Title']; ?>"  value="<?php echo $data[6]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[7]['Title']; ?>" ><?php echo $data[7]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[7]['Title']; ?>" class="form-control form-control-user" placeholder="Resume" name="<?php echo $data[7]['Title']; ?>"  value="<?php echo $data[7]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[8]['Title']; ?>" ><?php echo $data[8]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[8]['Title']; ?>" class="form-control form-control-user" placeholder="Service" name="<?php echo $data[8]['Title']; ?>"  value="<?php echo $data[8]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[9]['Title']; ?>" ><?php echo $data[9]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[9]['Title']; ?>" class="form-control form-control-user" placeholder="Portfolio" name="<?php echo $data[9]['Title']; ?>"  value="<?php echo $data[9]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[10]['Title']; ?>" ><?php echo $data[10]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[10]['Title']; ?>" class="form-control form-control-user" placeholder="Pricing" name="<?php echo $data[10]['Title']; ?>"  value="<?php echo $data[10]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[11]['Title']; ?>" ><?php echo $data[11]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[11]['Title']; ?>" class="form-control form-control-user" placeholder="FAQ" name="<?php echo $data[11]['Title']; ?>"  value="<?php echo $data[11]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[12]['Title']; ?>" ><?php echo $data[12]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[12]['Title']; ?>" class="form-control form-control-user" placeholder="Address" name="<?php echo $data[12]['Title']; ?>"  value="<?php echo $data[12]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[13]['Title']; ?>" ><?php echo $data[13]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[13]['Title']; ?>" class="form-control form-control-user" placeholder="Contact Number" name="<?php echo $data[13]['Title']; ?>"  value="<?php echo $data[13]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[14]['Title']; ?>" ><?php echo $data[14]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[14]['Title']; ?>" class="form-control form-control-user" placeholder="Contact" name="<?php echo $data[14]['Title']; ?>"  value="<?php echo $data[14]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[15]['Title']; ?>" ><?php echo $data[15]['Title']; ?></label>
                                                <input type="text" id="<?php echo $data[15]['Title']; ?>" class="form-control form-control-user" placeholder="Email" name="<?php echo $data[15]['Title']; ?>"  value="<?php echo $data[15]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[0]['Title']; ?></label>
                                                <input type="hidden"  name="oldFaviconicon"  value="<?php echo $data[0]['description']; ?>">
                                                <input type="file" name="<?php echo $data[0]['Title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[0]['description']; ?>" height="50" alt="Favicon Logo">
                                            </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once('./partials/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>



</body>

</html>