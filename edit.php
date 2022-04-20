<?php
include 'connectDB.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE foodmenu set  Title='" . $_POST['Title'] . "', Cuisine='" . $_POST['Cuisine'] . "', Category='" . $_POST['Category'] . "' ,Price='" . $_POST['Price']."'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM foodmenu WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
    <?php include('header.php') ?>
<head>
<title>Update Food Menu</title>
</head>
<body>
<form name="editing" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="retrieve.php">Food Menu List</a>
</div>
Title: <br>
<input type="hidden" name="Title" class="txtField" value="<?php echo $row['Title']; ?>">
<input type="text" name="Title"  value="<?php echo $row['Title']; ?>">
<br>
Cuisine: <br>
<input type="text" name="Cuisine" class="txtField" value="<?php echo $row['Cuisine']; ?>">
<br>
Category :<br>
<input type="text" name="Category" class="txtField" value="<?php echo $row['Category']; ?>">
<br>
Price:<br>
<input type="text" name="Price" class="txtField" value="<?php echo $row['Price']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

<?php include('footer.php')?>

</form>
</body>
</html>