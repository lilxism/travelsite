<!–– 
Name: Lily Chua
filename: country.php
Purpose: final project CS268 
->
<?php
	session_start(); 
	include_once 'db_connection.php';
	$obj = new Connection();
	$con=$obj->openConnection();
	$chosencountry =$_GET["chosecountry"];
	$stmt =$con->prepare("SELECT * FROM nation where country = ?");
	$stmt->execute([$chosencountry]);
	$result=$stmt->fetchAll();
	$country;
	$bgimg;
	foreach($result as $row){
		$country=$row["country"];
		$bgimg=$row["bgimg"];
		
	}
	$stmt =$con->prepare('SELECT * FROM images where country=?');
	$stmt->execute([$chosencountry]);
	$result=$stmt->fetchAll();
	$imgArr=array();
	foreach($result as $row){
		$imgfile=$row["imgfile"];
		$place=$row['place'];
		$description=$row["description"];
		$img=array($imgfile,$place,$description);
		array_push($imgArr,$img);	
	}
	
	
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style>
	div.bgimg{
	 height: 100%;
	background-image: url("<?php echo $bgimg; ?>");
    background-position: center;
	background-repeat: no-repeat;
    background-size: cover;
	}
	</style>
	
	<title>Travel | <?php echo $country; ?></title>
</head>

<body>
	
	<nav class="navbar navbar-expand-sm navbar-inverse" style="background-color:black;">
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
	<div class="bgimg">
		<div class="wrapper">
			<h1 class="text-left text-center" id="title"><?php echo $country; ?></h1>	
		</div>
	</div>
	</br>
	<div class="container-fluid card-deck">
	<?php 
		for($i=0;$i<count($imgArr);$i++){
	?>
	
	<div class="card text-white bg-dark mb-3">
		<img class="card-img-top" src="<?php echo $imgArr[$i][0];  ?>" alt="image">
		<div class="card-body ">
			<h5 class="card-title"><?php echo $imgArr[$i][1];  ?></h5>
			<p class="card-text"><?php echo $imgArr[$i][2];  ?></p>
		</div>
	</div>
 <?php }?>
</div>


</body>

</html>
