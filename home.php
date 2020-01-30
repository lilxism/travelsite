<!–– 
Name: Lily Chua
filename: final.php
Purpose: final project CS268 
->

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Travel | Main</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-inverse" style="background-color: black;">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="navbar-brand" href="#" > Home </a>
			</li>
			<li class="nav-item ">
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
	<div class="homebgimg">
		<div class="wrapper">
			<h1 class="text-left text-center" id="title">The Travel Site!</h1>	
		</div>
	</div>
	
	
	<div class="container container-fluid">
		<div class="row jumbotron">
			<div class="col-sm-12 col-md-3">
				<div id="mas" class="flags">
					<p><a href="country.php?chosecountry=Malaysia"><img src="flags/Malaysia-Flag.png" class="image"></a>
				</div>
			</div>
			<div class="text-center col-sm-12 col-md-4 embed-responsive embed-responsive-4by3">
				<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16300692.395128343!2d100.56204819160783!3d4.089195932413222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3034d3975f6730af%3A0x745969328211cd8!2sMalaysia!5e0!3m2!1sen!2sus!4v1526248144814" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-12 col-md-5 ">
				</br><p class="text-justify">Malaysia is a Southeast Asian country occupying parts of the Malay Peninsula and the island of Borneo. 
				It's known for its beaches, rainforests and mix of Malay, Chinese, Indian and European cultural influences.
				Malaysia is a federation of 13 states and three federal territories. 
				These are divided between two regions, with 11 states and two federal territories on Peninsular Malaysia 
				and the other two states and one federal territory in East Malaysia. </p>
			</div>
		</div>
	</div>	
		
	<div class="container container-fluid">
		<div class="row jumbotron">
			<div class="col-sm-12 col-md-3">
				<div id="mas" class="flags">
					<p><a href="country.php?chosecountry=Thailand"><img src="flags/Thailand-Flag.png" class="image"></a>
				</div>
			</div>
			<div class="text-center col-sm-12 col-md-4 embed-responsive embed-responsive-4by3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7966227.890002896!2d97.5326629571582!3d12.858790545946931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d8df747424db1%3A0x9ed72c880757e802!2sThailand!5e0!3m2!1sen!2sus!4v1526249080438" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-12 col-md-5 ">
				</br><p class="text-justify">Thailand is the country in Southeast Asia most visited by tourists, and for good reason. You can find almost anything here: 
				thick jungle as green as can be, crystal blue waters that feel more like a warm bath than a swim in the ocean, 
				and food that can curl your nose hairs while dancing across your taste buds. Exotic, yet safe; cheap, 
				yet equipped with every modern amenity you need, there is something for every interest and every price bracket, 
				from beach front backpacker bungalows to some of the best luxury hotels in the world. And despite the heavy flow 
				of tourism, Thailand retains its quintessential Thai-ness, with a culture and history all its own and a carefree 
				people famed for their smiles and their fun-seeking sanuk lifestyle.  
				</p>
			</div>
		</div>
	</div>	
	
	<div class="container container-fluid">
		<div class="row jumbotron">
			<div class="col-sm-12 col-md-3 ">
				<div id="sing" class="flags">
					<p><a href="country.php?chosecountry=Singapore"><img src="flags/Singapore-Flag.png" class="image"></a>
				</div>
			</div>
			<div class="text-center col-sm-12 col-md-4 embed-responsive embed-responsive-4by3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448344.1010376414!2d103.65742626217597!3d1.2807709054379919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da11238a8b9375%3A0x887869cf52abf5c4!2sSingapore!5e0!3m2!1sen!2sus!4v1526249490540" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-12 col-md-5 ">
				</br><p class="text-justify">Singapore is a city-state in Southeast Asia. Founded as a British trading colony in 1819, since independence it has become one of the world's most prosperous countries and boasts the world's busiest port.
				Combining the skyscrapers and subways of a modern, affluent city with a medley of Chinese, Malay and Indian influences along with a tropical climate, tasty food from hawker centres, copious shopping malls, and vibrant night-life scene, this Garden City makes a great stopover or springboard into the region.
				Singapore is one of the most popular travel destinations in the world for a lot of reasons. One of which is the less stringent entry requirements.
				</p>
			</div>
		</div>
	</div>	
	
	

</body>

</html>
