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
	$sno = $_POST['sno'];
	$name = $_POST['name'];
	$sdesp = $_POST['sdesp'];
	$ldesp = $_POST['ldesp'];
	
	$sql = "INSERT INTO pages(sno, name, sdesp, ldesp) VALUES('$sno', '$name', '$sdesp', '$ldesp')";
	
	
if (mysqli_query($conn, $sql)) {
    echo "New page has been added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
}
?>

<form action = "" method = "post" class = "new_page">
<div>

<div class = "acform">
<h1><i>New Page</i></h1>
</div>

<div class = 'acform'>

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
<textarea rows="10" cols="50" class = "ckeditor" name="ldesp" ></textarea>
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
