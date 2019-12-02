
<?php include('../lib/session.php');
session::checklogin();
?>
<?php include('../lib/Database.php');?>
<?php include('../helpers/format.php');?>
<?php $db=new Database();
      $fm=new format();
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	$username=$fm->validation($_POST['username']);
	$password=$fm->validation($_POST['password']);
    $username=mysqli_real_escape_string($db->link,$username);
	$password=mysqli_real_escape_string($db->link,$password);


$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=$db->select($sql);
if($result){
	$value=mysqli_fetch_array($result);
	$row=mysqli_num_rows($result);
     if($row>0){
     	session::set('login',true);
     	session::set('username',$value['username']);
     	session::set('userid',$value['id']);
     	session::set('userrole',$value['role']);
     	header("location:index.php");
     }
     	else{
     		echo "<span style='color:red;font-size:18px;'>NO RESULT FOUND!!</span>";
     	}

}
	else{
           echo "<span style='color:red;font-size:18px;'>USERNAME OR PASSWORD IS NOT MATCHED!!</span>";

	}

}

?>


		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>