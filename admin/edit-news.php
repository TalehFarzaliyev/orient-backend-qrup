<?php
include 'config/config.php';
include 'functions/functions.php';

$category_list = ['Dunya','Gundem','Siyaset','Shou-Biznes','Idman'];

if(isset($_GET['news']) and !empty($_GET['news']))
{
  $news = intval($_GET['news']);
  $select_news = "SELECT * FROM `news` where id='$news'";
  $result  = mysqli_query($conn, $select_news);
  $news_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if(!empty($news_row))
    $row = $news_row;
  else
    $row = ['title'=>'','category'=>'','image'=>'','content'=>'','status'=>1];

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if(!empty($_POST['submit']))
    {
      $name     = trim($_POST['title']);
      $category = $_POST['category'];
      $content  = mysqli_real_escape_string($conn,$_POST['text']);

      if(!empty($_FILES['image']))
        $image    = uploadImage($_FILES['image']);
      else
        $image    = $row['image'];
      
      $status   = $_POST['status'];

      $sql      = "UPDATE `news` SET `title`='$name', `category`='$category',`content`='$content',`image`='$image', `status`='$status' WHERE `id`='$news'";
      if(mysqli_query($conn,$sql))
      {
        echo "<script>alert('Update oldu');</script>";
      }
      else
      {
        echo "<script>alert('Update olmadi');</script>";
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
                    <form action="edit-news.php?news=<?=$row['id'];?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Xeberin Basliqi</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Shekil</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        <img src="../uploads/<?=$row['image'];?>" class="img-thumbnail" width="250px" height="250px">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategoriya</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                          <?php
                            foreach ($category_list as $key => $value) {
                              if($row['category'] == $value)
                                echo '<option selected>'.$row['category'].'</option>';
                              else
                                echo '<option>'.$value.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Metn</label>
                        <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"><?=$row['content'];?>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          <option value="0" <?php  if($row['status'] == 0) echo "selected"; ?> >DeAktiv</option>
                          <option value="1" <?php  if($row['status'] == 1) echo "selected"; ?> >Aktiv</option>
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

<?php 
  }
  else
  {
    echo "Not any news in table";
  }
?>