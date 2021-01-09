<?php
$size = sizeof($_POST);
$j = 1;
for($i=1;$i<=$size;$i++,$j++)
{
	$index = "checkbox".$j;
	if(isset($_POST[$index]))
		$b_id[$i] = $_POST[$index];
	else
		$i--;
}
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'bookbd');
for($k=1;$k<=$size;$k++)
{
	$q = "delete from book where book_id=".$b_id[$k];
	mysqli_query($conn,$q);	
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deletion</title>
</head>
<body>
<h1>Book Record Management</h1>
<p><?php
		echo $size."Records Deleted";
?></p>
Go Back To Home Page <a href="home.php">Click here</a>
</body>
</html>
