<?php require_once('./controller/ResumeController.php'); ?>
<?php
$resume = new resume();
$Response = [];
$active = $resume->active;
$data = $resume->editresume($_REQUEST['id']);
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $resume->Updateresume($_REQUEST);

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
                        <a href="ResumeIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <div class="form-group">
                                        <label for="Title">Title<sup class="text-danger">*</sup></label>
                                            <input  type="text" name="Title" id="Title" class="form-control" placeholder="Title" value="<?php if(isset($_REQUEST['Title']))  { echo $__REQUEST['Title'];} else{echo $data['Title'];}?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="shortTitle">ShortTitle<sup class="text-danger">*</sup></label>
                                            <input  type="text" name="shortTitle" id="shortTitle" class="form-control" placeholder="ShortTitle" value="<?php if(isset($_REQUEST['shortTitle']))  { echo $__REQUEST['shortTitle'];} else{echo $data['shortTitle'];} ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="location">Location</label>
                                            <input  type="text" name="location" id="location" class="form-control" placeholder="Location" value="<?php if(isset($_REQUEST['location']))  { echo $__REQUEST['location'];} else{echo $data['location'];} ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="year">Year</label>
                                            <input  type="text" name="year" id="year" class="form-control" placeholder="Year" value="<?php if(isset($_REQUEST['year']))  { echo $__REQUEST['year'];} else{echo $data['year'];} ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="description">Description</label>
                                          <textarea class="form-control" name="description" id="description" Rows="10" class="form-control"><?php if(isset($_REQUEST['description']))  { echo $__REQUEST['description'];} else{echo $data['description'];} ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Is Active</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) { echo "selected";} elseif($data['status'] == 1){echo "selected";} ?>>Active </option>
                                                <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) { echo "selected";} elseif($data['status'] == 0){echo "selected";} ?>>Deactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                            <a href="ResumeIndex.php" class="btn btn-danger">Cancle</a>
                                        </div>
                                    </form>
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

<script src="./assets/vendor/ckeditor_4.22.1_full/ckeditor/ckeditor.js"></script>
    <script>  
        CKEDITOR.replace( 'description' );
     </script>

</body>

</html>