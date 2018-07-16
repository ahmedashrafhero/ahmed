<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './connect.php';
echo '<center><h3><u>Home Page</u> </h3></center><br><br><br>';
//if(isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type'])){
//echo '<left><a href="logout.php">Logout</a></left>';
//$username=$_SESSION['username'];
//$user_type=$_SESSION['type'];
////echo $username."      ".$password;
//$select_links_SQl="SELECT urls_data.* from urls_data,users_types_urls where urls_data.id=users_types_urls.url_tpe and users_types_urls.user_type_id=$user_type";
//$select_links_Result=  mysql_query($select_links_SQl);
//echo '<ul>';
//while($row=  mysql_fetch_array($select_links_Result)){
//    echo'<li><a href="'.$row[2].'">'.$row[1].'</a></li>';
//}
//
//echo '</ul';
//}
//else{
//    header("Location: login.php");
//}
include_once './user_menue.php';
?>
<meta http-equiv="refresh" content="10;url=logout.php" />