<?php
    session_start();
    if ($_SESSION['logged_in'] == 1) {
        include '../config/config.php';
        $post_type = (isset($_GET['id'])) ? 'edit':'create';

        if($_SERVER['REQUEST_METHOD']='POST')
        {
            if(isset($_POST['post-type']) and !empty($_POST['post-type']) and $_POST['post-type'] == 'create')
            {
                $parent_id      = (isset($_POST['parent_id'])) ? intval($_POST['parent_id']) : 0;
                $order_number   = (isset($_POST['order_number'])) ? intval($_POST['order_number']) : 0;
                $status         = (isset($_POST['status'])) ? intval($_POST['status']) : 0;
                $translation    = (isset($_POST['translation']))? $_POST['translation'] : [];

                $insert_menu    = "INSERT INTO `menu`(`parent_id`,`order_number`,`status`) VALUES ('$parent_id','$order_number','$status')";
                $result_insert  = mysqli_query($conn,$insert_menu);
                if($result_insert)
                {
                    $menu_id = mysqli_insert_id($conn);
                    foreach ($translation as $key=>$value){
                        $insert_translation    = "INSERT INTO `menu_translation`(`menu_id`,`lang_id`,`name`,`slug`) VALUES ('$menu_id','$key','".$value['name']."','".$value['slug']."')";
                        mysqli_query($conn,$insert_translation);
                    }
                }
            }
            else if(isset($_POST['post-type']) and !empty($_POST['post-type']) and $_POST['post-type'] == 'edit')
            {
                $parent_id      = (isset($_POST['parent_id'])) ? intval($_POST['parent_id']) : 0;
                $order_number   = (isset($_POST['order_number'])) ? intval($_POST['order_number']) : 0;
                $status         = (isset($_POST['status'])) ? intval($_POST['status']) : 0;
                $translation    = (isset($_POST['translation']))? $_POST['translation'] : [];

                $insert_menu    = "INSERT INTO `menu`(`parent_id`,`order_number`,`status`) VALUES ('$parent_id','$order_number','$status')";
                $result_insert  = mysqli_query($conn,$insert_menu);
                if($result_insert)
                {
                    $menu_id = mysqli_insert_id($conn);
                    foreach ($translation as $key=>$value){
                        $insert_translation    = "INSERT INTO `menu_translation`(`menu_id`,`lang_id`,`name`,`slug`) VALUES ('$menu_id','$key','".$value['name']."','".$value['slug']."')";
                        mysqli_query($conn,$insert_translation);
                    }
                }
            }
        }
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Menyu əlavə et</h1>
                    <br>
                    <!-- DataTales Example -->
                    <form action="form_menu.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4 form-section">
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Ana kateqoriya</label>
                                    <select class="form-control" name="parent_id" id="exampleFormControlSelect1">
                                        <option value="0">Sec</option>
                                        <?php

                                        $select_sql = "SELECT * FROM `menu_translation` WHERE `lang_id`=1";
                                        $result = mysqli_query($conn, $select_sql);
                                        while ($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            ?>
                                            <option value="<?= $row1['menu_id']; ?>"><?= $row1['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Sıra nömrəsi</label>
                                    <input type="number" name="order_number" min="0" class="form-control" id="exampleFormControlInput1" placeholder="Sıra nömrəsi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                                        <option value="0">Deaktiv</option>
                                        <option selected value="1">Aktiv</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-8 form-language">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <?php
                                            $select_sql = "SELECT * FROM `languages` Where status=1";
                                            $result     = mysqli_query($conn, $select_sql);
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                        <a class="nav-item nav-link <?php if($row['code']=='az') echo 'active' ?>" id="nav-<?=$row['code'];?>-tab" data-toggle="tab" href="#nav-<?=$row['code'];?>" role="tab" aria-controls="nav-<?=$row['code'];?>" aria-selected="true"><?= $row['name']; ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <?php
                                        $select_sql = "SELECT * FROM `languages` Where status=1";
                                        $result     = mysqli_query($conn, $select_sql);

                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                    <div class="tab-pane fade show <?php if($row['code']=='az') echo 'active' ?>" id="nav-<?=$row['code'];?>" role="tabpanel" aria-labelledby="nav-<?=$row['code'];?>-tab">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Menu elementi adı</label>
                                            <input type="text" name="translation[<?=$row['id']?>][name]" class="form-control" id="exampleFormControlInput1" placeholder="Kateqoriya adı">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Slug</label>
                                            <input type="text" name="translation[<?=$row['id']?>][slug]" class="form-control" id="exampleFormControlInput1" placeholder="Slug">
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <input type="hidden" name="post-type" value="<?=$post_type;?>">
                                <div class="form-group">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </div>
                        </div>
                    </form>

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
} else {
    header('Location: login.php');
}
?>