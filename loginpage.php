<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

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
	
	
	/*if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               //$myemail = test_input($_POST["email"]);
               
               if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
			
            if (empty($_POST["pass"])) {
               $passErr = "Password is required";
            }*/
            
	
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

<form method = "POST" action = "">


<div class ="loginbox">

<h1 style = "text-align:center;"><i>Login!</i></h1>

<div class = "loginform">


<div id = "login">

<div id = "left">
<label><strong>Email:</strong></label>
</div>

<div id = "right">
<input type = "email" name = "email" placeholder = "Enter here...." />
</div>

</div>

<div id = "login">

<div id = "left">
<label><strong>Password:</strong></label>
</div>

<div id = "right">
<input type = "password" name = "pass" placeholder = "Enter here...." />
</div>

</div>

<div id = "login">

<div id = "left">
<input type = "submit" class="button" id = "Login!" value = "Login!" name = "Login!"/>
</div>

<div id = "right">
<input type = "checkbox" name = "remember">Remember Me
</div>

</div>

</div>

</div>

</form>

</body>

<?php

include('footer.php');
?>