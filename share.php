<!–– 
Name: Lily Chua
filename: share.php
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
	<title>Travel | Share </title>
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

<div class="container">
		<h2>Share Experience</h2>
		<p> Read and share your thoughts here! </p>
		
			
	<?php
	if(isset($_SESSION['name']) && isset($_POST["share"])){
		
		$sharexp=htmlspecialchars($_POST['share']);
		$stmt =$con->prepare("INSERT INTO share(shareId,country,comment,username)VALUES(null,:country,:comment,:name)");
		$stmt->bindParam(':country',$_POST['travelledCountry']);
		$stmt->bindParam(':comment',$_POST['comment']);
		$stmt->bindParam(':name',$_SESSION["name"]);
		$stmt->execute();
		header('Location:share.php');
		
	}else if(isset($_POST["login"])){
		header("Location:login.php");
		
	}else if (!isset($_SESSION['name'])){
		echo '</br><div class="alert alert-warning">You have to login first to share experience.</div>';
	}
	
		$stmt =$con->prepare("SELECT * FROM share");
		$stmt->execute();
		$result=$stmt->fetchAll();
		
		foreach($result as $row){
			$username=$row["username"];
			$country=$row["country"];
			echo '<div class="media jumbotron">
				<div class="media-body"><h4 class="media-heading">'.$username.'</h4>
				<h6 class="media-heading">Comment on '.$country.'</h6></br>';
			$comment=$row["comment"];
			echo '<p class="p-3 mb-2">'.$comment.'</p><br></div></div>';
		}
	?>
	
	


   <form action="share.php" method="post">
   <div class="form-group">
    <?php $countryList =getCountries($con); ?>
	<div class="form-group">
		<label for="selection">Comment on Country</label>
			<select class="form-control" name="travelledCountry">
		<?php
		for($i=0;$i<count($countryList);$i++){
			echo '<option value="'.$countryList[$i].'">'.$countryList[$i].'</option>';
		}
		echo '</select></div>';
		?>
	<label for="comment">Comment: </label>
	<textarea class="form-control" rows="5" name="comment"></textarea>
	</div>
	<input type="submit" class="btn btn-primary" name="share" value="Share" 
	<?php if(!isset($_SESSION['name'])){ echo "disabled"; } ?> 
	/>
	<input type="submit" class="btn btn-info" name="login" value="Login" <?php if(isset($_SESSION['name'])){ echo "disabled"; } ?>/>
	</form>

</div>

<?php
	function getCountries($con){	
		
		$stmt =$con->prepare("SELECT * FROM nation");
		$stmt->execute();
		$result=$stmt->fetchAll();
		$countries=array();
		foreach($result as $row){
			$country=$row["country"];
			array_push($countries,$country);	
		}
		
		return $countries;
	}
?>
</body>
</html>