<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">
<script src = "ckeditor/ckeditor.js"></script>

</head>

<?php
	
session_start();
	
include('connection.php');
include('header.php');
include('navigation.php');


if(isset($_POST['Submit']))
{
	//$sno = $_POST['sno'];
	$name = $_POST['name'];
	$date = $_POST['date'];
	$sdesp = $_POST['sdesp'];
	$ldesp = $_POST['ldesp'];
	
	$sql = "INSERT INTO events (name, date, sdesp, ldesp) VALUES ('$name', '$date', '$sdesp', '$ldesp')";
	
	
if (mysqli_query($conn, $sql)) {
    echo "New event has been added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}	
?>

<form action = '' method = 'POST' class = 'new_event'>

<div>

<div class = "acform">
<h1><i>New Event</i></h1>
</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Name:</label>
</div>

<div class = 'rightac'>
<input type="text" name="name" >
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Date:</label>
</div>

<div class = 'rightac'>
<input type="date" name="date" >
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Short Description:</label>
</div>

<div class = 'rightac'>
<textarea rows="4" cols="50" name="sdesp" ></textarea>
</div>

</div>

<div class = 'acform'>

<div class = 'leftac'>
<label>Long Description:</label>
</div>

<div class = 'rightac'>
<textarea rows="10" cols="50" class = "ckeditor" name="ldesp" >&lt;h1&gt;Article Title&lt;/h1&gt;
        &lt;p&gt;Here's some sample text&lt;/p&gt;</textarea>

</div>

</div>

<div class = 'acform'>

<input type="submit" class = "button" name="Submit" value="Add">

</div>

</div>

</form>

<?php

include('footer.php');

?>
