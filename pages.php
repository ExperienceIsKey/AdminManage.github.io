<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php

session_start();

include('connection.php');
include('header.php');
include('navigation.php');

	
	if(isset($_POST['delete'])){
		$Delete = "DELETE FROM pages WHERE sno='$_POST[hidden]'";
		mysqli_query($conn, $Delete);
	}
	
$sql = "select * from pages";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");

echo"<a href = 'new_page.php' ><img src='new.png' style=' height:40px; width:40px; float:right; padding:5px; margin:5px;'></img></a>";

echo"<table border='1'>";

echo"<tr><td style = 'text-align:center;'>S.No</td><td style = 'text-align:center;'>Name</td><td style = 'text-align:center;'>Short Description</td><td colspan='3' style = 'text-align:center;'>Edit</td></tr>";

while($row = mysqli_fetch_assoc($result)) {
	
	echo "<form action=pages.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=sno value=" . $row['sno'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $row['name'] . " </td>";
	echo "<td>" . "<input type=text name=sdesp value=" . $row['sdesp'] . " </td>";
	//echo "<td>" . "<textarea rows=10 cols=50 id = event name=ldesp >" . $row['ldesp'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['sno'] . " </td>";
	echo '<td><a href="page_view.php?sno=' . $row['sno'] . '"><img src=edit.png style=height:40px;width:40px;></a></td>';
	echo "<td>" . "<input type=submit class =button name=delete value=Delete" . " </td>";
	echo "</tr>";
	echo "</form>";
	
}

echo"</table>";

?>

<?php

include('footer.php');

?>

