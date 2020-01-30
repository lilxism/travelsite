<!–– 
Name: Lily Chua
filename: form.php
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
	<title>Travel | <?php echo $_SESSION["name"] ?> </title>
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
<div class="container-fluid ">
	<div class="jumbotron ">
	<form action="" method="post">
<?php
	$country;
	$datedep;
	$datereturn;
	$hotel;
	$luggage;
	$passport;
	if (isset($_POST["planbutton"])) {
		if (empty($_POST["country"])) {
			echo '<div class="alert alert-danger">Please input country</div>' ;
		} else {
			$country = $_POST["country"];
		}
		if (empty($_POST["datedep"])) {
			echo '<div class="alert alert-danger">Please input date departure</div>' ;
		}else{
			$datedep = $_POST["datedep"];
		}
		if (empty($_POST["datereturn"])) {
			echo '<div class="alert alert-danger">Please input date return</div>' ;
		}else{
			$datereturn=$_POST["datereturn"];
		}
		
		if (empty($_POST["hotel"])) {
			$hotel=0;
		}else{
			$hotel=1;
		}
		if (empty($_POST["luggage"])) {
			$luggage=0;
		}else{
			$luggage=1;
		}
		if (empty($_POST["passport"])) {
			$passport=0;
		}else{
			$passport=1;
		}
		$stmt =$con->prepare("INSERT INTO plan(PlanId,username,Country,DateDep,DateReturn,Hotel,Luggage,Passport)VALUES(null,:name,:country,:datedep,:datereturn,:hotel,:luggage,:passport)");
		$stmt->bindParam(':name',$_SESSION["name"]);
		$stmt->bindParam(':country',$country);
		$stmt->bindParam(':datedep',$datedep);
		$stmt->bindParam(':datereturn',$datereturn);
		$stmt->bindParam(':hotel',$hotel);
		$stmt->bindParam(':luggage',$luggage);
		$stmt->bindParam(':passport',$passport);
		$check=$stmt->execute();
		if($check==true){
			$_SESSION["newAdd"]=true;
		}else{
			$_SESSION["newAdd"]=false;
		}
		header("Location:plan.php");
		
	}else if(isset($_POST["changebutton"])){
		echo "hi";
			$chosenId = $_POST["chosenId"];
			if (empty($_POST["datedep"])) {
				echo '<div class="alert alert-danger">Please input date departure</div>' ;
			}else{
				$datedep = $_POST["datedep"];
			}
			if (empty($_POST["datereturn"])) {
				echo '<div class="alert alert-danger">Please input date return</div>' ;
			}else{
				$datereturn=$_POST["datereturn"];
			}
		
			if (empty($_POST["hotel"])) {
				$hotel=0;
			}else{
				$hotel=1;
			}
			if (empty($_POST["luggage"])) {
				$luggage=0;
			}else{
				$luggage=1;
			}
			if (empty($_POST["passport"])) {
				$passport=0;
			}else{
				$passport=1;
			}
			
		$stmt =$con->prepare("UPDATE plan SET DateDep=?,DateReturn=?,Hotel=?,Luggage=?,Passport=?  where PlanId =?");
		$check=$stmt->execute([$datedep,$datereturn,$hotel,$luggage,$passport,$chosenId]);
		if($check==true){
			$_SESSION["changePlan"]=true;
		}else{
			$_SESSION["changePlan"]=false;
		}
		header("Location:plan.php");
	}else if($_GET["formtype"]=="change"){
		$plans =$_SESSION["plansArr"];
		echo '<div class="form-group">
			<label for="selection">Country</label>
			<select class="form-control" name="chosenId">';
		for($i=0;$i<count($plans);$i++){
			echo '<option value="'.$plans[$i][0].'">'.$plans[$i][1].'</option>';
		}
		echo '</select></div>';
		
	}else if($_GET["formtype"]=="new"){
		echo '<div class="form-group row">
		<label class="col-2 col-form-label">Country</label>
		<div class="col-10">
		<input class="form-control" type="text"  name="country"/>
		</div>
		</div>';
	}
	
	
	if(isset($_POST["Logout"])){
		$_SESSION["logout"]=true;
		header('Location:login.php?status=logout');
	}
	
?>
 
	
	<div class=" form-group row">
		<label class="col-2 col-form-label">Date Departure</label>
		<div class="col-10">
		<input class="form-control" type="date" value="2018-05-14" name="datedep"/>
		</div>
		</div>
	<div class=" form-group row">
		<label class="col-2 col-form-label">Date Return</label>
		<div class="col-10">
		<input class="form-control" type="date" value="2018-05-14" name="datereturn"/>
		</div>
	</div>
	 <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2">CheckList</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="hotel" value="hotel"/>
           Have you book hotel? Check if yes.
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="luggage" value="luggage"/>
             Have you pack your luggage? Check if yes.
          </label>
        </div>
        <div class="form-check disabled">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="passport" value="passport"/>
            Do you have your passport? Check if yes.
          </label>
        </div>
      </div>
    </fieldset>
	<?php
	if($_GET["formtype"]=="new"){
		echo '<input type="submit" class="btn btn-primary" name="planbutton" value="plan"/>';
	}else if($_GET["formtype"]=="change"){
		echo '<input type="submit" class="btn btn-primary" name="changebutton" value="change"/>';
	}
	?>
	</div>
	 </form>
  


	</div>
</div>
</body>
</html>