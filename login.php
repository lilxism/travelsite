<!–– 
Name: Lily Chua
filename: login.php
Purpose: final project CS268 
->
<?php
session_start();
include_once 'db_connection.php';
$obj = new Connection();
$con=$obj->openConnection();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Travel | Login</title>
</head>

<body>

	<nav class="navbar navbar-expand-sm navbar-inverse" style="background-color: black;">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="navbar-brand" href="home.php"> Home </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.php">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="plan.php">Plan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="share.php">Share</a>
			</li>
			<li class="nav-item dropdown">
				<div class="px-1 dropdown">
				<button class=" btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Countries
				</button>
					
				<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					<form action="country.php" method="get">
					<button class="dropdown-item" type="submit" name="chosecountry" value="Malaysia">Malaysia</button>
					<button class="dropdown-item" type="submit" name="chosecountry" value="Thailand">Thailand</button>
					<button class="dropdown-item" type="submit" name="chosecountry" value="Singapore">Singapore</button>
					</form>
				</div>
				</div>
			</li>
			<li class="nav-item">
			
				<form class="form-inline" action="login.php" method="post">
				<input type="submit" class="btn btn-info" name="Logout" value="Logout"/>
				</form>
				
			</li>
		</ul>
	</nav>
	<div class="loginbgimg">
		<div id="wrapperLogin"><p><h1> Welcome!! </b></h1></p>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="section">Username: <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>" required=""></div>
			<div class="section">Password: <input type="password" name="password" required=""></div>
			<div class="section"><input type="submit" class="btn btn-primary" name="login" value="login"/>
			<input type="submit" class="btn btn-primary" name="register" value="register"/></div>
		</form>


<?php
	if(isset($_POST["username"]) and isset($_POST["password"])){
		
		
		if($_POST["username"] and $_POST["password"]){
			$inputName=htmlspecialchars($_POST["username"]);
			$inputPw=htmlspecialchars($_POST['password']);
			$storedPw;
			$existedName=0; 
		
			$stmt =$con->prepare("SELECT * FROM users");
			$stmt->execute();
			$result=$stmt->fetchAll();
			//check if then name exists
			foreach($result as $row){
				if ($inputName == $row["username"]){
					$existedName=1;
					$storePw=$row["password"];
				}
			}
			if(isset($_POST["login"])){
				
				if($existedName==1 && password_verify($inputPw, $storePw)){
					$_SESSION["name"]=$inputName;
					$_SESSION["logged"]=true;
					header('Location:plan.php');
				}else if($existedName==0){
					echo '<div class="alert alert-danger">No user '.$inputName.' exists.</div>' ;
				}else if($existedName==1 && $inputPw != $storePw){
					echo '<div class="alert alert-danger">Incorrect Password.</div>';
				}
			}
			if(isset($_POST["register"])){
				if(strlen($inputName)<4 || strlen($inputName)>31){
					echo '<div class="alert alert-danger">Invalid username:Must be between 4 and 31 characters long.</div>';
				}else if(!preg_match('/^[A-Za-z0-9]+$/',$inputName)){
					echo '<div class="alert alert-danger">Invalid username: Must contain only numbers and letters.</div>';
				}else if(strlen($inputPw)<8 || strlen($inputPw)>31){
					echo '<div class="alert alert-danger">Invalid password: Must be between 8 and 31 characters long.</div>';
				}else if(!preg_match('/^.*(?=.{7,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/',$inputPw)){
					echo '<div class="alert alert-danger">Invalid password: Must contain lowercase letters, uppercase letters, and numbers.</div>';
				}else if($existedName==1){
					echo '<div class="alert alert-danger">Invalid username: User '.$inputName.' already exists.</div>';
				}else{
					$saltedPw = password_hash($inputPw,PASSWORD_DEFAULT);
					$stmt =$con->prepare("INSERT INTO users(username,password)VALUES(:name,:pass)");
					$stmt->bindParam(':name',$inputName);
					$stmt->bindParam(':pass',$saltedPw);
					$stmt->execute();
					echo '<div class="alert alert-success">Account '.$inputName.' created! PLease login to access!</div>';
					
				}	
			}
		}
	}else if(isset($_POST["Logout"]) ) {
		if(isset($_SESSION["name"])){
			echo '<div class="alert alert-success">You have been logged out.</div>';
			session_unset();
			session_destroy();
		}else{
			echo '<div class="alert alert-warning">You have to login first.</div>';
		}
	}
?>
</div>
</div>
</body>
</html>
