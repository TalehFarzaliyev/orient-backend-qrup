<?php
   	ob_start();
   	session_start();
   	if(!isset($_SESSION['logged_in']))
    {
	   	include '../config/config.php';

	   	$msg = '';

		if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password'])) {
			$email = $_POST['email'];
			$pass  = md5($_POST['password']);

			$sql   = "SELECT * FROM `admin_users` WHERE `email`='$email' and `password`='$pass'";
			$query = mysqli_query($conn,$sql);
			if(mysqli_num_rows($query) == 1)
			{
				$user_details = mysqli_fetch_array($query, MYSQLI_ASSOC);

				$_SESSION['email'] 		= $user_details['email'];
				$_SESSION['username'] 	= $user_details['username'];
				$_SESSION['logged_in']	= 1;
				header('Location:index.php');
			}
			else
			{
				$msg = 'Wrong username or password';
			}
		}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body class="bg-gradient-primary">
   <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Dashboard Login!</h1>
                                        <?php
                                        	if(!empty($msg))
                                        	{
                                        		echo "<h1>".$msg."</h1>";
                                        	}
                                        ?>
                                    </div>

                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="example@test.com">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="*******">
                                        </div>
                                        
                                        <button type="submit" value="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        
                                    </div>
                                    <div class="text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
	}
	else{
		header('Location: index.php');  
	}
?>