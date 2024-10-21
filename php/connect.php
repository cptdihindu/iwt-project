<?php
#server information
$server_name = "localhost";
$server_user = "root";
$server_pass = "";
$server_db = "nexride";

#table information
$tb_name = "users";

$tb_no = "no";
$tb_fname = "fname";
$tb_lname = "lname";
$tb_gender = "gender";
$tb_tele = "tele";
$tb_vehicle = "vehicle";
$tb_plate = "plate";
$tb_adrs = "address";
$tb_email = "email";
$tb_pass = "password";
$tb_role = "role";


$conn = new mysqli($server_name, $server_user, $server_pass, $server_db);

if($conn->connect_error){
    die();
}
?>