<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>

</head>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect to database.";
} 


 if(isset($_POST['Login!']))
{
	$myemail = $_POST['email'];
    $mypass = $_POST['pass'];
	
	$sql="SELECT * FROM accounts WHERE email='$myemail' and pass = '$mypass'";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if ($count) {
    if(isset($_POST['remember']))
	{
		setcookie('email',$email,time()+60+60+7);
		setcookie('pass',$pass,time()+60+60+7);
	}
	session_start();
		$_SESSION['email'] = $myemail;
		header("Location:dashboard.php");
} 
else {
    echo "unsuccessful";
}
	
}

?>


<body class = "login">

<head>
<div class = "top">

<div id = "top1">
<h1>Admin Management System</h1>
</div>

<div id = "top2">
<h3>Welcome!</h3>
</div>

</div>
</head>
<div class = "navigation">

<ul id="menu" style = "opacity:0.7; background:#000;">     
    <li style = "float:right;"><a href="new_contact.php">Contact Us</a></li>  	
	<li style = "float:right;"><a href="current_events.php">Events</a></li>  
	<li style = "float:right;"><a href="current_pages.php">Pages</a></li> 
</ul>
 
</div>

</body>

<?php

include('footer.php');
?>