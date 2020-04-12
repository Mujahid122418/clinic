<?php
include_once "database.php";
function getCurrentPageName(){
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = explode('/', $currentFile);
    $Name = $parts[count($parts) - 1];
    return $Name;
}
function getTotalPatients(){
    $sql = "select * from patients where user_id=".$_SESSION['user_id'];
    $query = mysqli_query($link,$sql);
    return mysqli_num_rows($query);
}
function getTotalActiveUsers(){
    $sql = "select * from users where user_id=".$_SESSION['user_id'];
    $query = mysqli_query($link,$sql);
    return mysqli_num_rows($query);
}
function getTotalMedicines(){
    $sql = "select * from medicines where user_id=".$_SESSION['user_id'];
    $query = mysqli_query($link,$sql);
    return mysqli_num_rows($query);

}
function getTotalDoctors(){
    $sql = "select * from doctors where user_id=".$_SESSION['user_id'];
    $query = mysqli_query($link,$sql);
    return mysqli_num_rows($query);
}