<?php
session_start();
    if($_SESSION['logged_in'] == 1)
    {
        include '../config/config.php';
        include '../config/vars.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'includes/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'includes/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'includes/content-footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'includes/footer.php'; ?>


</body>

</html>

<?php 
    }else{
      header('Location: login.php');  
    }
?>