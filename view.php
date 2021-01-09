<?php

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'bookbd');
$q = "select * from book;";
$records = mysqli_query($conn, $q);
$row_num = mysqli_num_rows($records);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Records</title>
<link rel="stylesheet" type="text/css" href="./css/viewStyle.css"/>
</head>
<body>
<h1>View Book Record</h1>

<table id="viewtable">
	<tr>
		<th>Book ID</th>
		<th>Title</th>
		<th>Price</th>
		<th>Author</th>
	</tr>

	<?php 
	$i;
	for($i=0;$i<$row_num;$i++)
	{
		$rows = mysqli_fetch_array($records);

	?>

	<tr>
		<td><?php echo $rows['book_id']; ?></td>
		<td><?php echo $rows['title']; ?></td>
		<td><?php echo $rows['price']; ?></td>
		<td><?php echo $rows['author']; ?></td>
	</tr>

	<?php
	}
	?>
</table>
<a href="home.php">HOME</a>
</body>
</html>
