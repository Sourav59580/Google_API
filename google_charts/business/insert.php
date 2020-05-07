<?php
$db = new mysqli("localhost","root","","api");

$year = $_POST['year'];
$sale = $_POST['sale'];
$profit = $_POST['profit'];
$expenses = $_POST['expenses'];

$check = "SELECT * FROM business";
$response = $db->query($check);

if($response){

    $insert_data = "INSERT INTO business(b_year,sales,profit,expenses)VALUES('$year','$sale','$profit','$expenses')";
    $response = $db->query($insert_data);
    if($response){
        echo "Your data is saved successfully....";
    }else{
        echo "Failed to insert";
    }

}else{
    $create_table = "CREATE TABLE business(
        id INT(10) NOT NULL AUTO_INCREMENT,
        b_year INT(10),
        sales INT(10),
        profit INT(10),
        expenses INT(10),
        PRIMARY KEY(id)
    )";
    
    $response = $db->query($create_table);
    if($response){
        $insert_data = "INSERT INTO business(b_year,sales,profit,expenses)VALUES('$year','$sale','$profit','$expenses')";
        $response = $db->query($insert_data);
        if($response){
            echo "Your data is saved successfully....";
        }else{
            echo "Failed to insert";
        }
    }
}











?>