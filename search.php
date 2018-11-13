<!DOCTYPE html>
<html lang="en">
<head>
<title>Search Result</title>
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
<script type = "text/javascript">
	function result()
	{
		<!-- Connect to the database -->
		<?php
		$conn=mysqli_connect("localhost","root","","restaurantList");
		if($conn->connect_error)
		{
			echo "Unable to connect to database.";
			exit;
		}
		
		$returndata=[];
		if(!isset($_POST['eatwhat']))
		{
			$query1="SELECT * FROM restaurant";
		}else if($_POST['eatwhat']=="")
		{
			$query1="SELECT * FROM restaurant";
		}else if ($_POST['eatwhat']==" ")
		{
			$query1="SELECT * FROM restaurant";
		}else
		{
			$query1="SELECT * FROM restaurant WHERE Cuisine='".$_POST['eatwhat']."' or 
			Name='".$_POST['eatwhat']."' or 
			District='".$_POST['eatwhat']."' or 
			Price='".$_POST['eatwhat']."'";
		}
		$result1=$conn->query($query1);
		if(!$result1) die("No information.");
		$result1->data_seek(0);
	
		$i=0;
		while($row=$result1->fetch_assoc())
		{ 
			$returndata[$i]["ID"]=$i;
			$returndata[$i]["I"] = $row["Code"];
			$returndata[$i]["N"] = $row["Name"];
			$returndata[$i]["C"] = $row["Cuisine"];
			$returndata[$i]["D"] = $row["District"];
			$returndata[$i]["P"] = $row["Price"];
			$returndata[$i]["W"] = $row["Weighting"];
			$i++;
		}?>
		
		data = <?php echo(json_encode($returndata));?>;
		console.log(data);
		var i = 0;
		var x = 1;
		var hehe="";
		for(i;i<data.length;i++){
			hehe+='<div class="card Rcard border-danger transparentBg">';
			hehe+='<img src="https://i.imgur.com/'+data[i].I+'.png" alt="Image">';
			hehe+='<div class="card-header text-danger">'+data[i].N+'</div>';
			hehe+='<div class="card-body text-danger">';
			hehe+='<div class="card-title">'+data[i].C+'</div><p>';
			hehe+='<span></span>'+data[i].D+'<br/>';
			hehe+='<span></span>'+data[i].P+'</p>';
			hehe+='</div></div>';
			x++;
		}
			/* $("#content").html(hehe);
			i=0;
			x=1;
			for(i;i<data.length;i++){
				$("#CH"+x).html(data[i].N);
				$("#CC"+x).html(data[i].C);
				$("#CD"+x).html(data[i].D);
				$("#CP"+x).html(data[i].P);
				x++;
			} */
		document.getElementById("content").innerHTML = hehe
	}
</script>
</head>

<body onload = "result()">
<div id="sitebody">
	<nav id="header" class="header navbar navbar-expand-lg bg-info">
		<img src="asset/logo_small.png" alt="logo" style="height:100px">
		<ul class="navbar-nav mr-auto">
		<a href="index.html"><button class="btn btn-outline-light">Home</button></a> 
		<a href="restaurantListJS.html"><button class="btn btn-outline-light">Restaurant</button></a>
		<a href="random.html"><button class="btn btn-outline-light">Random</button></a>
		<a href="aboutUs.html"><button class="btn btn-outline-light">About Us</button></a>
		</ul>
		<form name="UForm" action="search.php" method="post" class="form-inline">
			<input class="form-control mr-sm-2" type="search" name="eatwhat" placeholder="Type here" aria-label="Search">
			<input class="btn btn-dark my-2 my-sm-0" type="submit" value="Search">
		</form>
		<a href="javascript:void(0);" class="icon mx-2" onclick="verticalNav()">
			<i class="fa fa-bars" style="font-size: 30px; color: #343a40;"></i>
		</a>
	</nav>
	
	<div id="content" class="Rcontent">
		
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