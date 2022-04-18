<?php

//Connect to database named "pineconecc"
    $conn = mysqli_connect('localhost', 'root', '', 'pineconecc');
    
    if(!$conn){
        echo'connection error: ' . mysqli_connect_error();
    }
?>