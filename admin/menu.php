<?php
session_start();
if($_SESSION['logged_in'] == 1)
{
    include '../config/config.php';

    if(isset($_GET['id']) and !empty($_GET['id']))
    {
        $menu_id = intval($_GET['id']);
        mysqli_query($conn,"DELETE FROM `menu` WHERE `id`=$menu_id");
        mysqli_query($conn,"DELETE FROM `menu_translation` WHERE `menu_id`=$menu_id");
        header('menu.php');
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
                    <h1 class="h3 mb-2 text-gray-800">Siyahı Menyu</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Siyahı Menyu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <a href="form_menu.php" class="btn btn-success">Yarat</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 255px;">Menyu adı</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 163px;">Əməliyyatlar</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Adı</th>
<!--                                                    <th rowspan="1" colspan="1">Slug</th>-->
<!--                                                    <th rowspan="1" colspan="1">Tipi</th>-->
                                                    <th rowspan="1" colspan="1">Əməliyyatlar</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php

                                                $select_sql = "SELECT * FROM orient_ressamlar.menu_translation mt 
                                                               INNER JOIN orient_ressamlar.menu m ON mt.menu_id=m.id 
                                                               Where mt.lang_id=1 and m.status=1;";
                                                $result     = mysqli_query($conn,$select_sql);
                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    ?>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1"><?=$row['name'];?></td>
                                                        <td>
                                                            <a href="form_menu.php?id=<?=$row['id'];?>"   class="btn btn-success">Redakte et</a>
                                                            <a href="menu.php?id=<?=$row['id'];?>" class="btn btn-danger">Sil</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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