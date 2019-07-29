<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php

session_start();
	
include('connection.php');
include('header.php');
include('navigation.php');


if(isset($_POST['Submit']))
{
	$sno = $_POST['sno'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$sql = "INSERT INTO accounts (sno, name, email, pass) VALUES('$sno', '$name', '$email', '$pass')";
	
	
if (mysqli_query($conn, $sql)) {
    echo "New Account has been created!!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}	
?>

<script>
function Submit(){
 var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
 var name = document.form.name.value;
  var femail = document.form.email.value;
  fpassword = document.form.pass.value,
   
 if( fname == "" )
   {
     document.form.firstname.focus() ;
  document.getElementById("errorBox").innerHTML = "enter the name";
     return false;
   }
    
   if (femail == "" )
 {
  document.form.email.focus();
  document.getElementById("errorBox").innerHTML = "enter the email";
  return false;
  }else if(!emailRegex.test(femail)){
  document.form.email.focus();
  document.getElementById("errorBox").innerHTML = "enter the valid email";
  return false;
  }
   
 if(fpassword == "")
  {
   document.form.pass.focus();
   document.getElementById("errorBox").innerHTML = "enter the password";
   return false;
  }
}

</script>

<form action = '' method = 'POST' name = "form" class = 'new_ac' >

<div>

<div class = "acform">
<h1><i>New Account</i></h1>
</div>

<div class = "acform" id="errorBox"></div>

<div class = 'acform' >

<div class = 'leftac'>
<label>S.No:</label>
</div>

<div class = 'rightac'>
<input type="text" name="sno" required />
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Name:</label>
</div>

<div class = 'rightac'>
<input type="text" name="name"required />
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Email:</label>
</div>

<div class = 'rightac'>
<input type="email" name="email" required />
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Password: </label>
</div>

<div class = 'rightac'>
<input type="password" name="pass"required />
</div>

</div>

<div class = 'acform'>

<input type="submit" class = "button" name="Submit"  onclick = "Submit()" value="Register">

</div>

</div>

</form>

<?php

include('footer.php');

?>
