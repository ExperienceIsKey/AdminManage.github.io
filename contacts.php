<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php

session_start();

include('connection.php');
include('header.php');
include('navigation.php');

if(isset($_POST['delete'])){
		$Delete = "DELETE FROM contacts WHERE sno='$_POST[hidden]'";
		mysqli_query($conn, $Delete);
	}
    

$sql = "select * from contacts";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");

echo"<table border='1'>";

echo"<tr><td style = 'text-align:center;'>S.No</td><td style = 'text-align:center;'>Name</td><td style = 'text-align:center;'>Email</td><td style = 'text-align:center;'>Phone-Number</td><td style = 'text-align:center;'>Message</td><td colspan='2' style = 'text-align:center;'>Edit</td></tr>";

while($row = mysqli_fetch_array($result)){
	
	echo "<form action=contacts.php method=post>";
	echo "<tr>";
	echo "<td>" . $row['sno'] . " </td>";
	echo "<td>" . $row['name'] . " </td>";
	echo "<td>" . $row['email'] . " </td>";
	echo "<td>" . $row['phoneno'] . " </td>";
	echo "<td>" . $row['message'] . " </td>";
	echo "<td>" . "<input type=hidden style=width:0;padding:0;margin:0; name=hidden value=" . $row['sno'] . " </td>";
	echo "<td>" . "<input type=submit class = button name=delete value=Delete" . " </td>";
	echo "</tr>";
	echo "</form>";

}

echo "</table>";echo "</table>";
?>

<?php

include('footer.php');

?>