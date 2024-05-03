
<?php
error_reporting(0);
require_once('include/config.php');

if(isset($_POST['submit']))
{ 
$F_name=$_POST['F_name'];
$L_name=$_POST['L_name'];
$role=$_POST['role'];
$email=$_POST['email'];
$Password=$_POST['password'];
$pass=md5($Password);
$RepeatPassword = $_POST['RepeatPassword'];




// Email id Already Exit

$usermatch=$dbh->prepare("SELECT role,email FROM users WHERE (email=:usreml || role=:mblenmbr)");
$usermatch->execute(array(':usreml'=>$email,':mblenmbr'=>$role)); 
while($row=$usermatch->fetch(PDO::FETCH_ASSOC))
{
$usrdbeml= $row['email'];
$usrdbmble=$row['role'];
}


if(empty($F_name))
{
  $nameerror="Please Enter First Name";
}

 else if(empty($role))
 {
 $mobileerror="Please Enter Mobile No";
 }

 else if(empty($email))
 {
 $emailerror="Please Enter Email";
 }

else if($email==$usrdbeml || $role==$usrdbmble)
 {
  $error="Email Id or Mobile Number Already Exists!";
 }
  else if($Password=="" || $RepeatPassword=="")
 {
    
   $error="Password And Confirm Password Not Empty!";
 
 }
 else if($_POST['password'] != $_POST['RepeatPassword'])
 {
  
   $error="Password And Confirm Password Not Matched";
 }

 
else{
$sql="INSERT INTO users (F_name,L_name,email,role,password) Values(:F_name,:L_name,:email,:role,:Password)";

$query = $dbh -> prepare($sql);
$query->bindParam(':F_name',$F_name,PDO::PARAM_STR);
$query->bindParam(':L_name',$L_name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':role',$role,PDO::PARAM_STR);
$query->bindParam(':Password',$pass,PDO::PARAM_STR);

$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{
echo "<script>alert('Registration successfull. Please login');</script>";
echo "<script> window.location.href='login.php';</script>";
}
else 
{
$error ="Registration Not successfully";
 }
}
 }
 
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<!-- Stylesheets -->
	<style>
	input{
  background-color: #393e46; /* لون */
}

</style>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<style>
	body {
  background-color: #393e46; /* لون */
}

</style>
</head>
<body>

                                                                  
	<!-- Page top Section -->
	
		<div style="background-color: #393e46;" class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<center>
					<h2>Registration</h2>
					</center>
				</div>
			</div>
		</div>
	
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
				
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($succmsg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($succmsg); ?> </div><?php }?><br><br>
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="F_name" id="F_name" placeholder="First Name" autocomplete="off" value="<?php echo $F_name;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="L_name" id="L_name" placeholder="Last Name" autocomplete="off" value="<?php echo $L_name;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $email;?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="role" id="role" maxlength="10" placeholder="Mobile Number" autocomplete="off" value="<?php echo $role;?>" required>
							</div>
							
							<div class="col-md-6">
								<input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
							</div>
							<div class="col-md-6">
								<input type="password" name="RepeatPassword" id="RepeatPassword" placeholder="Confirm Password" autocomplete="off" required>
							</div>
							<div  class="col-md-4">
						<input type="submit" id="submit" name="submit" value="Register Now"  >
								
							</div>
						</div>
					</form>
				</div>
				<div  class="col-lg-2">
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->

	


	<!-- Footer Section end -->
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
 <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #dd3d36;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>	