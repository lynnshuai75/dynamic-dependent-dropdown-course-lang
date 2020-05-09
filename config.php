<?php
$conn = mysqli_connect('localhost', 'root', '', 'dynamic_dependent_dropdown_list');

if(!$conn){
    die("Could not connect to the database :" .mysqli_connect_error());
}


?>