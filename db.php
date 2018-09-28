<?php
$server='localhost';
$username='root';
$password='';
$database='hackathon18';
$conx=new mysqli($server,$username,$password,$database);
if($conx->connect_error){
    die("connection failed !!".$conx->connect_error);
}