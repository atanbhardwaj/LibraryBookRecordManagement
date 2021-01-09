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
	<title>Delete Book Records</title>
<link rel="stylesheet" type="text/css" href="./css/viewStyle.css"/>
</head>
<body>
<h1>Book Records</h1>
<form action="deletion.php" method="post">
<table id="viewtable">
	<tr>
		<th>Book ID</th>
		<th>Title</th>
		<th>Price</th>
		<th>Author</th>
		<th>Select to deete</th>
	</tr>

	<?php 
	$i;
	for($i=1;$i<=$row_num;$i++)
	{
		$rows = mysqli_fetch_array($records);

	?>

	<tr>
		<td><?php echo $rows['book_id']; ?></td>
		<td><?php echo $rows['title']; ?></td>
		<td><?php echo $rows['price']; ?></td>
		<td><?php echo $rows['author']; ?></td>
		<td> <input type="checkbox" value="<?php echo $rows['book_id'];?>" name="checkbox<?php echo $i; ?>"> </td>
	</tr>

	<?php
	}
	?>
	<tr>
		<td colspan="5"><input type="submit" value="Delete" name=""></td>
	</tr>
</table>
</form>
<a href="home.php">HOME</a>
</body>
</html>
