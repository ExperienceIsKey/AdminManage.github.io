<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php

session_start();
	
include('connection.php');
include('header.php');
//include('navigation.php');


if(isset($_POST['Submit']))
{
	$sno = $_POST['sno'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$message = $_POST['message'];
	
	$sql = "INSERT INTO contacts (sno, name, email, phoneno, message) VALUES('$sno', '$name', '$email', '$phoneno', '$message')";
	
	
if (mysqli_query($conn, $sql)) {
    echo "Your message has been sent to the Admin.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}	
?>

<div class = "navigation">

<ul id="menu" style = "opacity:0.7; background:#000;">  
    <li style = "float:left;"><a href="user.php">Home</a></li>    
    <li style = "float:right;"><a href="new_contact.php">Contact Us</a></li>  	
	<li style = "float:right;"><a href="current_events.php">Events</a></li> 
    <li style = "float:right;"><a href="current_pages.php">Pages</a></li> 	
</ul>
 
</div>

<form action = '' method = 'POST' class = 'new_contact' >

<div>

<div class = "acform">
<h1><i>Contact Form</i></h1>
</div>

<div class = 'acform' >

<div class = 'leftac'>
<label>S.No:</label>
</div>

<div class = 'rightac'>
<input type="text" name="sno"/>
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Name:</label>
</div>

<div class = 'rightac'>
<input type="text" name="name"/>
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Email:</label>
</div>

<div class = 'rightac'>
<input type="email" name="email"/>
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Phoneno:</label>
</div>

<div class = 'rightac'>
<input type="text" name="phoneno"/>
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Message:</label>
</div>

<div class = 'rightac'>
<textarea rows="4" cols="50" name="message" ></textarea>
</div>

</div>

<div class = 'acform'>

<input type="submit" class = "button" name="Submit" value="Submit!">


</div>

</div>

</div>

</form>

<?php

include('footer.php');

?>
