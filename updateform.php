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
	<title>Update Book Records</title>
<link rel="stylesheet" type="text/css" href="./css/viewStyle.css"/>
</head>
<body>
<h1>Update Book Record</h1>
<form action="updation.php" method="post">
<table id="viewtable">
	<tr>
		<th>Book ID</th>
		<th>Title</th>
		<th>Price</th>
		<th>Author</th>
	</tr>

	<?php 
	$i;
	for($i=1;$i<=$row_num;$i++)
	{
		$rows = mysqli_fetch_array($records);

	?>

	<tr>
		<td><?php echo $rows['book_id']; ?>
			<input type="hidden" name="bookid<?php echo $i ?>" value="<?php echo $rows['book_id']; ?>" />
		</td>

		<td><input type="text" value="<?php echo $rows['title']; ?>" name="title<?php echo $i ?>"></td>
		<td><input type="text" value="<?php echo $rows['price']; ?>" name="price<?php echo $i ?>"></td>
		<td><input type="text" value="<?php echo $rows['author']; ?>" name="author<?php echo $i ?>"></td>
	</tr>

	<?php
	}
	?>
</table>
<input type="submit" value="Update">
</form>
<a href="home.php">HOME</a>
</body>
</html>
