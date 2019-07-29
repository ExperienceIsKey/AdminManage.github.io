<?php

session_start();

//include('connection.php');
include('header.php');
include('navigation.php');

function renderForm($sno, $name, $date, $sdesp, $ldesp, $error)

{

?>

<html>

<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">
<script src = "ckeditor/ckeditor.js"></script>

</head>

<body>

<?php

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>


<form action="" method="post" class = 'new_event'>

<input type="hidden" name="sno" value="<?php echo $sno; ?>"/>

<div class = "acform">
<h1><i>Edit Event</i></h1>
</div>

<div class = 'acform'>
<div class = "leftac"><strong>S.No:</strong></div><div class = "rightac"> <input type = "text" value = "<?php echo $sno; ?>" readonly></div>
</div>

<div class = 'acform'>
<div class = "leftac"><strong>Name: *</strong> </div><div class = "rightac"><input type="text" name="name" value="<?php echo $name; ?>"/><br/></div>
</div>

<div class = "acform">
<div class = "leftac"><strong>Date: *</strong> </div><div class = "rightac"><input type="date" name="date" value="<?php echo $date; ?>"/><br/></div>
</div>

<div class = "acform">
<div class = "leftac"><strong>Short Description: *</strong></div><div class = "rightac"><textarea rows="4" cols="50" name="sdesp" ><?php echo $sdesp; ?></textarea></div>
</div>

<div class = "acform">
<div class = "leftac"><strong>Long Description: *</strong> </div><div class = "rightac"><textarea rows="10" cols="50" class = "ckeditor" name="ldesp" ><?php echo $ldesp; ?></textarea>
  <br/></div>
</div>

<div class = "acform">
<p>* Required</p>
</div>

<div class = "acform">
<input type="submit" name="submit" class = "button" value="Submit">
</div>

</form>

</body>

</html>

<?php

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect to database.";
} 

if (isset($_POST['submit']))

{
	
	$name = $_POST['name'];
	$date = $_POST['date'];
	$sdesp = $_POST['sdesp'];
	$ldesp = $_POST['ldesp'];

if (is_numeric($_POST['sno']))

{

$sno = $_POST['sno'];

if ($name == '')

{

$error = 'ERROR: Please fill in all required fields!';


renderForm($sno, $name, $date, $sdesp, $ldesp, $error);

}

else

{

$update = "UPDATE events SET name='$name', sdesp = '$sdesp', ldesp='$ldesp', date = '$date' WHERE sno='$sno'";

if (mysqli_query($conn, $update)) {
    echo "New event has been added successfully";
} else {
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
}

//header("Location: events.php");

}

}

else

{

echo 'Error!';

}

}

else

{

if (isset($_GET['sno']) && is_numeric($_GET['sno']) && $_GET['sno'] > 0)

{

$sno = $_GET['sno'];

$select = "SELECT * FROM events WHERE sno=$sno";
$result = mysqli_query($conn,$select);

//or die(mysqli_error($conn));

$row = mysqli_fetch_array($result);

if($row)

{

$sno = $row['sno'];

$name = $row['name'];

$date = $row['date'];

$sdesp = $row['sdesp'];

$ldesp = $row['ldesp'];


renderForm($sno, $name, $date, $sdesp, $ldesp, '');

}

else

{

echo "No results!";

}

}

else

{

echo 'Error!';

}

}


?>