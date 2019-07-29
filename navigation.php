<?php

$conn = mysqli_connect("localhost","root","","project");

if (mysqli_connect_errno()) {
    echo "Failed to connect to database.";
} 

if(isset($_POST['Logout']))
{
	session_destroy();
	header("Location:loginpage.php");
}

$myemail = $_SESSION['email'];
$sql="SELECT * FROM accounts WHERE email='$myemail'";
$result=mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_NUM);
$user = $row[1];

?>

<form method = "post" action = "">
<head>
<link rel="stylesheet" href="projectstyle.css">
<link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>

      <nav class = "navigation">
		   <div class="navbar">
              <a href="dashboard.php">Dashboard</a>
              <a href="accounts.php">Accounts</a>
               <a href="events.php">Events</a>
               <a href="pages.php">Pages</a>
               <a href="contacts.php">Contact Us</a>
			  
			  <input type = "submit" class = "button" name = "Logout" value = "Logout" style="float: right; margin-top: 5px;  padding: 10px; margin-bottom: 2px; width: 100px; margin-right: 30px;margin-top: 3px">
			  <a id = "session" style = " float:right; color:white; margin-right: 40px;"><?php echo "Welcome $user"; ?></a>
            </div>

      </nav>
</head>
</form>