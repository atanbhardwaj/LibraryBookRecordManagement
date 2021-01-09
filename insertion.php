<?php
$title = $_POST['title'];
$price = $_POST['price'];
$author = $_POST['author'];

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'bookbd');
$v = "insert into book (title,price,author) values ('$title',$price, '$author');";
$status = mysqli_query($conn, $v);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertion Form</title>
</head>
<body>
<h1>Book Record Management</h1>
<p><?php
if($status==1)
		echo "Record Inserted";
else
	echo "Insertion Failed";
?></p>
Insert Another Record? <a href="insertform.php">Click here</a>
</body>
</html>