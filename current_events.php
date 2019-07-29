
<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">
<script src = "ckeditor/ckeditor.js"></script>

</head>

<?php

session_start();
	
include('connection.php');
include('header.php');
//include('navigation.php');

$sql = "select * from events";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");


?>

<div class = "navigation">

<ul id="menu" style = "opacity:0.7; background:#000;">  
    <li style = "float:left;"><a href="user.php">Home</a></li>    
    <li style = "float:right;"><a href="new_contact.php">Contact Us</a></li>  	
	<li style = "float:right;"><a href="current_events.php">Events</a></li>  
	<li style = "float:right;"><a href="current_pages.php">Pages</a></li> 
</ul>
 
</div>

<?php

while($row = mysqli_fetch_assoc($result)) {
	
	?>

<div style = "width:100%; float:left;">

<div style = "width:95%; margin:30px; margin-left: 40px; padding:20px; border:2px solid; height:100%">


<strong>Name: </strong><?php echo $row['name'];?><br><br>

<strong>Date: </strong><?php echo $row['date'];?><br><br>

<strong>Short Description: </strong><?php echo $row['sdesp'];?><br><br>

<strong>Long Description: </strong><?php echo $row['ldesp'];?>


</div>

</div>

<?php

}

include('footer.php');

?>