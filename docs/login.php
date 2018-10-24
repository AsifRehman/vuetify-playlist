<?php
session_start();
	include('connection.php');
	include('header.php');
	if (isset($_POST['LogIn']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$select="SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
		$result=mysqli_query($con,$select);
		if (mysqli_num_rows($result)==1) 
		{
		 // 	$row=mysqli_fetch_assoc($result);
		 // 	 $_SESSION['user_id']=$row['user_id'];
		 // 	$_SESSION['first_name']=$row['first_name'];
			// $_SESSION['last_name']=$row['last_name'];
			// $_SESSION['date_of_birth']=$row['date_of_birth'];
			// $_SESSION['gender']=$row['gender'];
			$_SESSION['admin_email']=$row['admin_email'];
			// $_SESSION['password']=$row['password'];
			// $_SESSION['picture']=$row['picture'];

		?>
			<script type="text/javascript">
				window.location="add_patient.php";
			</script>

		<?php
		 } 
		 else
		 {
		 	echo "<div class='alert alert-success'>Invalid Id</div>";
		 }
	}


?>
<div class="row">
	<div >
		<div class="col-md-6 col-lg-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3>User LogIn </h3>
				</div>
				<div class="panel-body">
					<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group" style="margin-bottom: 10px">
							<label class="col-md-3 control-label" for="Email">Email:</label>
							<div class="col-md-9">
								<input type="email" name="email" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">User Password</label>
							<div class="col-md-9">
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div>
							<input type="submit" name="LogIn" value="LogIn" class="btn btn-info pull-right">
						</div>
						<div align="center" style="margin-top: 50px;">
							<a href="">Forget Password ?</a>
						</div>
						<hr class="bg-info" style="height: 1px;" >
						<div align="center">
								<a href="register.php" class="btn btn-danger">Not registered. <b>Creat Acount</b></a>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>