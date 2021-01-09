<?php
$size = sizeof($_POST);
// echo "Records".$size;
$records = $size/4;
// echo "\r\nNumber of records".$records;

for($i=1;$i<=$records;$i++)
{
	$index1="bookid".$i;
	$bookid[$i] = $_POST[$index1];
	$index2="title".$i;
	$title[$i] = $_POST[$index2];
	$index3="price".$i;
	$price[$i] = $_POST[$index3];
	$index4="author".$i;
	$author[$i] = $_POST[$index4];
}

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'bookbd');
for($i=1;$i<=$records;$i++)
{
$q = "update book SET title='$title[$i]', price='$price[$i]', author='$author[$i]'
where book_id=$bookid[$i];";
mysqli_query($conn,$q);	
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Updation</title>
</head>
<body>
<h1>Book Record Management</h1>
<p><?php
		echo "Records Updated";
?></p>
Go Back To Home Page <a href="home.php">Click here</a>
</body>
</html>
