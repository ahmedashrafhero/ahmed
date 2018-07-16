<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './connect.php';
if(isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type'])){
//$username=$_SESSION['username'];
$user_type=$_SESSION['type'];
//echo $username."      ".$password;
$select_links_SQl="SELECT urls_data.* from urls_data,users_types_urls where urls_data.id=users_types_urls.url_tpe and users_types_urls.user_type_id=$user_type";
$select_links_Result=  mysql_query($select_links_SQl);
echo '<ul>';
while($row=  mysql_fetch_array($select_links_Result)){
    echo'<li><a href="'.$row[2].'">'.$row[1].'</a></li>';
}

echo '</ul';
echo '<left><a href="logout.php">Logout</a></left>';

}
else{
    header("Location: login.php");
}
$sql="INSERT INTO `year`( `name`) VALUES ('$row')";