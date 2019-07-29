<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php
session_start();

include('connection.php');
include('header.php');
include('navigation.php');


if(isset($_POST['update'])){
		$Update = "UPDATE events SET sno = '$_POST[sno]', name = '$_POST[name]', ldesp = '$_POST[ldesp], date = '$_POST[date]' WHERE sno = '$_POST[hidden]'";
		mysqli_query($conn, $Update);
	}
	
	if(isset($_POST['delete'])){
		$Delete = "DELETE FROM events WHERE sno='$_POST[hidden]'";
		mysqli_query($conn, $Delete);
	}


$sql = "select * from events";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");


echo"<a href = 'new_event.php' ><img src='new.png' style=' height:40px; width:40px; float:right; padding:5px; margin:5px;'></img></a>";

echo"<table border='1'>";

echo"<tr><td style = 'text-align:center;'>S.No</td><td style = 'text-align:center;'>Name</td><td style = 'text-align:center;'>Date</td><td colspan='3' style = 'text-align:center;'>Edit</td></tr>";



while($row = mysqli_fetch_assoc($result)) {
	
	echo "<form action=events.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=sno value=" . $row['sno'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $row['name'] . " </td>";
	echo "<td>" . "<input type=text name=date value=" . $row['date'] . " </td>";
	//echo "<td>" . "<textarea rows=5 cols=10 id = event name=ldesp value=" . $row['ldesp'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['sno'] . " </td>";
	echo '<td><a href="view_event.php?sno=' . $row['sno'] . '"><img src=edit.png style=height:40px;width:40px;></a></td>';
	echo "<td>" . "<input type=submit class = button name=delete value=Delete" . " </td>";
	echo "</tr>";
	echo "</form>";
	
}

echo"</table>";



?>

<?php

include('footer.php');

?>
