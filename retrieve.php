<?php
include 'connectDB.php';
$result = mysqli_query($conn,"SELECT * FROM foodmenu");
?>
<!DOCTYPE html>
<html>
    <?php include('header.php')?>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="styles.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
		<td>Title</td>
		<td>Cuisine</td>
		<td>Category</td>
		<td>Price</td>
        <td>No.</td>
        <td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
		<td><?php echo $row["Title"]; ?></td>
		<td><?php echo $row["Cuisine"]; ?></td>
		<td><?php echo $row["Category"]; ?></td>
		<td><?php echo $row["Price"]; ?></td>
        <td><?php echo $row["id"]; ?></td>
		<td><a href="edit.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
 <? include('footer.php')?>
</html>