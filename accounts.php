<head>

<link rel="stylesheet" href="projectstyle.css" type="text/css">

</head>

<?php

session_start();

include('connection.php');
include('header.php');
include('navigation.php');
	

	if(isset($_POST['update'])){
		$Update = "UPDATE accounts SET sno = '$_POST[sno]', name = '$_POST[name]', email = '$_POST[email]', pass = '$_POST[pass]' WHERE sno = '$_POST[hidden]'";
		mysqli_query($conn, $Update);
	}
	
	if(isset($_POST['delete'])){
		$Delete = "DELETE FROM accounts WHERE sno='$_POST[hidden]'";
		mysqli_query($conn, $Delete);
	}
    

$sql = "select * from accounts";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");

/*echo"<a href = 'new_ac.php' ><img src='new.png' style=' height:40px; width:40px; float:right; padding:5px; margin:5px;'></img></a>";

echo"<table border='1'>";

echo"<tr><td>S.No</td><td>Name</td><td>Email</td><td>Password</td></tr>";

while($row = mysqli_fetch_assoc($result)) {
	
	//echo "<tr><td>" . $row['sno'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['pass'] . "</td></tr>";

	echo "<tr>";
    echo "<td>" . $row['sno'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" .$row['email']. "</td>";
    echo "<td>". $row['pass']. "</td>";
	//echo "<td>" . "<a href='delete_acc.php?sno=$id['.$row['sno'].']'>" . "</td>";
    //echo "<td>" .  . "</td>"; 
    echo "</tr>";

}

echo"</table>";*/

echo"<table border='1'>";

echo"<tr><td style = 'text-align:center;'>S.No</td><td style = 'text-align:center;'>Name</td><td style = 'text-align:center;'>Email</td><td style = 'text-align:center;'>Password</td><td colspan='3' style = 'text-align:center;'>Edit</td></tr>";

echo"<a href = 'new_ac.php' ><img src='new.png' style=' height:40px; width:40px; float:right; padding:5px; margin:5px;'></img></a>";

while($row = mysqli_fetch_array($result)){
	
	echo "<form action=accounts.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=sno value=" . $row['sno'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $row['name'] . " </td>";
	echo "<td>" . "<input type=text style=width:280px; name=email value=" . $row['email'] . " </td>";
	echo "<td>" . "<input type=text name=pass value=" . $row['pass'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $row['sno'] . " </td>";
	echo "<td>" . "<input type=submit class = button name=update value=Update" . " </td>";
	echo "<td>" . "<input type=submit class = button name=delete value=Delete" . " </td>";
	echo "</tr>";
	echo "</form>";

}

echo "</table>";echo "</table>";
?>

<?php

include('footer.php');

?>
