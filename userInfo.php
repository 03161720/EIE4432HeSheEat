<!DOCTYPE html>
<html>
<head>
<title><?php echo $_COOKIE["userName"] ?> - HeSheEat</title>
<link rel="icon" href="https://i.imgur.com/nLtvyR5.png">
<?php
if(!isset($_COOKIE["userName"]))
{
	echo "<script type='text/javascript'>
	alert('Please log in your account');
	</script>";
	echo "<script type='text/javascript'>setTimeout('', 10000);</script>";
	echo "<script type='text/javascript'>window.location.replace(\"LogIn.php\");</script>";
}
?>
<!-- Main CSS -->
<link rel="stylesheet" href="main.css"/>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<!-- Boostrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous">
</script>
<!-- W3School Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type = "text/javascript">
function verticalNav() {
    var x = document.getElementById("header");
    if (x.className === "header navbar navbar-expand-lg bg-info") {
        x.className += " responsive";
    } else {
        x.className = "header navbar navbar-expand-lg bg-info";
    }
}
function genUserInfo()
{
	$.post("getUserInfo.php",
	{who:"<?php echo $_COOKIE["userName"] ?>"},
		function(data)
		{
			data = JSON.parse(data);
			console.log(data);
			var word = "";
			word+="<h5>Hi, "+data.F+" "+data.L+".</h5><br>";
			word+="<h5>User ID: "+data.ID+"</h5><br>";
			word+="<h5>Birthday: "+data.B+"</h5><br>";
			word+="<h5>Phone No.: "+data.P+"</h5><br>";
			word+="<h5>Email: "+data.E+"</h5><br>";		
			$("#info").html(word);
		}
	);
}
</script>
</head>

<body onload="genUserInfo()">
<div id="sitebody">
	<nav id="header" class="header navbar navbar-expand-lg bg-info">
		<a href="index.php"><img src="https://i.imgur.com/nLtvyR5.png" alt="logo" style="height:100px"></a>
		<ul class="navbar-nav mr-auto">
		<a href="index.php"><button class="btn btn-outline-light">Home</button></a> 
		<a href="restaurantListJS.php"><button class="btn btn-outline-light">Restaurant</button></a>
		<a href="random.php"><button class="btn btn-outline-light">Random</button></a>
		<a href="aboutUs.php"><button class="btn btn-outline-light">About Us</button></a>
		</ul>
		<div>
			<form name="UForm" action="search.php" method="post" class="form-inline">
			<input class="form-control mr-sm-2" type="search" name="eatwhat" placeholder="Type here" aria-label="Search">
			<input class="btn btn-dark my-2 my-sm-0" type="submit" value="Search">
			</form>
			<?php
				if(isset($_COOKIE["userName"]))
				{
					echo '<a id="userB" href="userInfo.php" class="btn btn-outline-light my-2 active Brighterize">';
					echo "Welcome ".$_COOKIE["userName"]."</a><br>";
				}else
				{
					echo '<a id="userB" href="LogIn.php" class="btn btn-outline-light my-2 Brighterize">';
					echo "Login</a><br>";
				}
			?>			
		</div>
		<a href="javascript:void(0);" class="icon mx-2" onclick="verticalNav()">
			<i class="fa fa-bars" style="font-size: 30px; color: #343a40;"></i>
		</a>
	</nav>
	
	<div id="content" class="content">
		<div class="card transparentBg border-danger" style="margin-bottom:1rem">
			<div id="info" style="padding:1rem">
			</div>
			<div style="padding: 1rem">
				<a href="userCustomWeight.php" class="btn btn-outline-danger">Custom Restaurant Weighting</a>
				<a href="logOut.php" class="btn btn-outline-danger">Log out</a>
			</div>
		</div>
	</div>
	
	<div id="footer" class="footer">
		<div class="FCreator">
		<i>Designed by:</i><br/>
			Hui Ka Hung,&nbsp
			Kwan Wai Kin,&nbsp
			Li King Wai,<br/>
			Ng Chi Chun,&nbsp
			Tsang Chi Kin.
		</div>
	</div>
</div>
</body>
</html>