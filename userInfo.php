<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="https://i.imgur.com/nLtvyR5.png">
<?php
if(count($_COOKIE) == 0) 
{
	echo "<script type='text/javascript'>
	alert('Pplease log in your account');
	</script>";
	echo "<script type='text/javascript'>setTimeout('', 10000);</script>";
	echo "<script type='text/javascript'>window.location.replace(\"LogIn.php\");</script>";
}
?>
<title><?php echo $_COOKIE["userName"] ?> - HeSheEat</title>
<link rel="icon" href="https://i.imgur.com/nLtvyR5.png">
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
</script>
</head>

<body>
<div id="sitebody">
	<nav id="header" class="header navbar navbar-expand-lg bg-info">
		<a href="index.html"><img src="https://i.imgur.com/nLtvyR5.png" alt="logo" style="height:100px"></a>
		<ul class="navbar-nav mr-auto">
		<a href="index.html"><button class="btn btn-outline-light">Home</button></a> 
		<a href="restaurantListJS.html"><button class="btn btn-outline-light">Restaurant</button></a>
		<a href="random.html"><button class="btn btn-outline-light">Random</button></a>
		<a href="aboutUs.html"><button class="btn btn-outline-light">About Us</button></a>
		</ul>
		<div>
			<form name="UForm" action="search.php" method="post" class="form-inline">
			<input class="form-control mr-sm-2" type="search" name="eatwhat" placeholder="Type here" aria-label="Search">
			<input class="btn btn-dark my-2 my-sm-0" type="submit" value="Search">
			</form>
			<a href="Login.php" class="btn btn-outline-light my-2 Brighterize">Login in</a><br>
		</div>
		<a href="javascript:void(0);" class="icon mx-2" onclick="verticalNav()">
			<i class="fa fa-bars" style="font-size: 30px; color: #343a40;"></i>
		</a>
	</nav>
	
	<div id="content" class="content">
	
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