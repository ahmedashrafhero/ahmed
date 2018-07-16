<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './Classes/class_admin.php';
echo '<center><h3><u>View All Users  Page</u> </h3></center><br><br><br>';
include_once './user_menue.php';

if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==1){


$message="";
if(isset($_POST['delete'])){
    $user_id=$_POST['id'];
    echo $user_id;
    $delete_sql="DELETE FROM `users` WHERE id=$user_id";
    $delete_result=  mysql_query($delete_sql);
    if($delete_result){
                      $message="<font color='red'>User Deleted Successfully</font>";
    }
}
       $admin_object=new class_admin();
       $data=$admin_object->show_All_users();
 echo ' <div>'.$message.'
    </div>';
 echo '<table><tr bgcolor="cyan"><td>User ID</td><td>Username</td><td>Password</td><td>First Name</td><td>Last Name</td><td>Email</td><td>User Type</td><td>Delete</td></tr>';
 $count=0;
 for($rows=0;$rows<count($data);$rows++)
 {
     $row=$data[$rows];
     $color='yellow';
     $type=array(" ","Admin","Student","Teacher");
     if($count%2==1){
         $color="green";
     }
     
     echo '<tr bgcolor="'.$color.'"><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$type[$row[6]].'</td>'
            . '<td><form action="list.php" method="post"><input type="hidden" name="id" value='.$row[0].'><input type="submit" name="delete" value="Delete"></form></td></tr>';
    $count++;
     }
 
 
 echo '</table>';
}
else{
    header("Location: login.php");
}
 ?>
