<?php
include 'config/config.php';
include 'functions/functions.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if(!empty($_POST['submit']))
    {
      $name     = trim($_POST['title']);
      $category = $_POST['category'];
      $content  = mysqli_real_escape_string($conn,$_POST['text']);
      $image    = uploadImage($_FILES['image']);
      $status   = $_POST['status'];

      $sql      = "INSERT INTO `news`(`title`,`category`,`image`,`content`) 
                  values('".$name."', '".$category."', '".$image."', '".$content."')";
      if(mysqli_query($conn,$sql))
      {
        echo "<script>alert('Insert oldu');</script>";
      }
      else
      {
        echo "<script>alert('Insert olmadi');</script>";
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

            <div id="content">

               <?php include 'includes/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form action="create-news.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Xeberin Basliqi</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Shekil</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategoriya</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                          <option>Dunya</option>
                          <option>Gundem</option>
                          <option>Siyaset</option>
                          <option>Shou-Biznes</option>
                          <option>Idman</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Metn</label>
                        <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          <option value="0">DeAktiv</option>
                          <option value="1">Aktiv</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Elave Et</button>
                      </div>
                    </form>
                    
                </div>
                <!-- /.container-fluid -->

            </div>

            <?php include 'includes/content-footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include 'includes/footer.php'; ?>
</body>
</html>