<?php

include('connectDB.php');
//initiallize the variables to empty strings so that when the page loads the columns are empty
$title = '';
$cuisine =  '';
$category = '';
$price = '';
$error = ['title'=>'', 'cuisine'=>'', 'category'=>'', 'price'=>''];

if(isset($_GET['submit'])){
    echo $_GET['title'];
    echo $_GET['cuisine'];
    echo $_GET['category'];
    echo $_GET['price'];
}

//validation for Title column
if(empty($_POST['title'])){
    $error['title'] = 'A title is required';
}     
else{
    $title = $_POST['title'];
    //Filtered using PHP regex built in function to only allow letters and space 
    if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $error['title'] = 'Only letters and space allowed';
    }
}
//validation for Cuisine column
if(empty($_POST['cuisine'])){
    $error['cuisine'] = 'A cuisine is required';
}
else{
    $cuisine = $_POST['cuisine'];
    //Filtered using PHP regex built in function to only allow letters and space 
    if(!preg_match('/^[a-zA-Z\s]+$/', $cuisine)){
        $error['cuisine'] = 'Only letters and space allowed';
    }
}

//validation for Category column
if(empty($_POST['category'])){
    $error['category'] = 'Category is required';
}
else{
    $category = $_POST['category'];
    //Filtered using PHP regex built in function to only allow letters and space 
    if(!preg_match('/^[a-zA-Z\s]+$/', $category)){
        $error['category'] = "only letters and space allowed";
    }
}

//validation for Price column
if(empty($_POST['price'])){
    $error['price'] = 'Price is required';
}
else{
    $price = $_POST['price'];
    //filter using php regex built in function to only allow numbers and fullstop
    if(!preg_match('/^[0-9]+(?:\.[0-9]{1,3})?$/im', $price)){
        $error['price'] = 'Only numbers and fullstop is allowed';
    }
}

//This will redirct to index.php upon clicking the submit button if there is no any mistakes
if(array_filter($error)){

}
else{
    header('Location: index.php');
}

$sql = "INSERT INTO foodmenu(Title, Cuisine, Category, Price) VALUES('$title', '$cuisine', '$category', '$price')";

if(mysqli_query($conn, $sql)){

}
else{
    echo 'query error: '. mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html>
<head>

</head>
<?php include('header.php');?>

    <section class="container grey-text">
        <h4 class="center">Add New Menu</h4>
        <form class="grey lighten-4 " action="addform.php" method="POST">
            <label class="grey lighten-4">Title</label>
            <input type="text" name="title" value="<?php echo $title?>">
            <div class="red-text"><?php echo $error['title']?></div>

            <label class="grey lighten-4">Cuisine</label>
            <input type="text" name="cuisine" placeholder="Asian, Western,..." value="<?php echo $cuisine?>">
            <div class="red-text"><?php echo $error['cuisine'];?></div>
        
            <label class="grey lighten-4">Category</label>
            <input type="text" name="category" placeholder="Food/Beverages" value="<?php echo $category?>">
            <div class="red-text"><?php echo $error['category'];?></div>

            <label class="grey lighten-4">Price</label>
            <input type="text" name="price" value="<?php echo $price?>">
            <div class="red-text"> <?php echo $error['price'];?></div>

            <div>
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-20">
            </div>
        </form>
    </section>
    
<?php include('footer.php')?>

</html>