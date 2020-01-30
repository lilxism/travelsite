<!–– 
Name: Lily Chua
filename: plan.php
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
	<title>Travel | Plan </title>
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
</br>

<div class="container" >
	<div class="jumbotron">
	<h1><p class="text-center font-weight-bold "> Welcome, <?php if(isset($_SESSION['name'])){ echo $_SESSION["name"]; 
		echo '<br>
		<div class="text-center">
		<form action="form.php" method="get">
		<button type="submit" class="btn btn-primary" name="formtype" value="new">Make New Plan</button>
		<button type="submit" class="btn btn-primary" name="formtype" value="change">Change Plan</button>
		
		</form> </div>'; }
		else{echo 'register or login first!';} ?> </p></h1></div>
	
<?php 
if((isset($_SESSION['name'])) ){
	if((isset($_SESSION["newAdd"]))and isset($_POST["newbutton"])){
		if($_SESSION["newAdd"]){
			echo '<div class="alert alert-success">New Plan successfully added!</div>';
		}else if(!($_SESSION["newAdd"])){
			echo '<div class="alert alert-danger">New Plan did not add!</div>';
		}
	}else if((isset($_SESSION["changePlan"]) and isset($_POST["changebutton"]))){
		if($_SESSION["changePlan"]){
			echo '<div class="alert alert-success">Plan Changed successfully !</div>';
		}else if(!($_SESSION["changePlan"])){
			echo '<div class="alert alert-success">Plan did not change!</div>';
		}
	}
	$plans=getPlan($con);
	$_SESSION["plansArr"]=$plans;
	$count=count($plans);
	echo '<div class="row">';
	for($i=0;$i<$count;$i++){
		echo ' <div class="col-sm-12 col-md-6">
		<div class="jumbotron">
		Plan Id: '.$plans[$i][0].'</br>';
		
		echo 'Country: '.($plans[$i][1]).'</br>';
		echo 'Date Departure: '.($plans[$i][2]).'</br>';
		echo 'Date Return: '.($plans[$i][3]).'</br>';
		if(($plans[$i][4])==1){
			echo 'Hotel: Booked </br>';
		}else{
			echo 'Hotel: Not book </br>';
		}
		if(($plans[$i][5])==1){
			echo 'Luggage: Packed </br>';
		}else{
			echo 'Luggage: Not pack </br>';
		}
		if(($plans[$i][6])==1){
			echo 'Passport: Ready </br>';
		}else{
			echo 'Passport: Not ready  </br>';
		}
		
		echo '</div></div>';
	}
}else{
		 echo '<div class="col-md-12 text-center"> <form action="login.php" method="post">
		<input type="submit" class=" btn btn-info" name="login" value="Login">
		</form></div>';
}
	
	
?>

<?php
	function getPlan($con){	
		
		$stmt =$con->prepare("SELECT * FROM plan where username ='". $_SESSION["name"] ."'");
		$stmt->execute();
		$result=$stmt->fetchAll();
		$plans=array();
		foreach($result as $row){
			$PlanId=$row["PlanId"];
			$Country=$row["Country"];
			$DateDep=$row["DateDep"];
			$DateReturn=$row["DateReturn"];
			$Hotel=$row["Hotel"];
			$Luggage=$row["Luggage"];
			$Passport=$row["Passport"];
			$plan=array($PlanId,$Country,$DateDep,$DateReturn,$Hotel,$Luggage,$Passport);
			array_push($plans,$plan);
		}
		
		return $plans;
	}
	if(isset($_POST["Logout"])){
		$_SESSION["logout"]=true;
		header('Location:login.php?status=logout');
	}
	
?>
</div>
</div>
</body>
</html>