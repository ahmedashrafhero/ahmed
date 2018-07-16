<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './connect.php';
echo '<center><h3><u>View All Users  Page</u> </h3></center><br><br><br>';
include_once './user_menue.php';
echo '<br>';
if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))){


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
if(isset($_POST['update'])){
    $username=$_POST['username'];
    $pssword=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $id=$_POST['id'];
    if($type==0){
                              $message="<font color='red'>Please,Select valid type</font>";

    }
    else{
        $update_user_SQL="UPDATE `users` SET `username`='$username',`password`='$pssword',`fname`='$fname',`lname`='$lname',`email`='$email',`user_type_id`=$type WHERE id=$id";
        $update_user_result=  mysql_query($update_user_SQL);
        if($update_user_result){
                                          $message="<font color='red'>User updated successfully</font>";
        }
    }
}
 $select_user_SQL="SELECT * FROM `users`";
 $select_user_Result=  mysql_query($select_user_SQL);
 echo ' <div>'.$message.'
    </div>';
 echo '<table><tr bgcolor="cyan"><td>User ID</td><td>Username</td><td>Password</td><td>First Name</td><td>Last Name</td><td>Email</td><td>User Type</td><td>Update</td><td>Delete</td></tr>';
 $count=0;
 $all_types_sql='SELECT * FROM `user_tpe`';
 $all_types_result=  mysql_query($all_types_sql);
 while($row=  mysql_fetch_array($select_user_Result)){
     $color='yellow';
     $type=array(" ","Admin","Student","Teacher");
     if($count%2==1){
         $color="green";
     }
     echo '<form action="list_2.php" method="post"';
     echo '<tr bgcolor="'.$color.'"><td><input type="text" name="id" value='.$row[0].' readonly ></td>'
             . '<td><input type="text" name="username" value="'.$row[1].'"required="required" ></td>'
             . '<td><input type="text" name="password" value="'.$row[2].'" required="required" >'
             . '</td><td><input type="text" name="fname" value="'.$row[3].'"required="required" ></td>'
             . '<td><input type="text" name="lname" value="'.$row[4].'"required="required" ></td>'
             . '<td><input type="text" name="email" value="'.$row[5].'"required="required" ></td>'
             . '<td> <select name="type" >
                            <option value="0">Select type</option>';
                              $all_types_sql='SELECT * FROM `user_tpe`';
                              $all_types_result=  mysql_query($all_types_sql);
                               while($row_1=  mysql_fetch_array($all_types_result)){
                                   
                                echo '<option value="'.$row_1[0].'"';
                                   if($row_1[0]==$row[6])
                                       echo 'selected="selected"';     
                                     echo'>'.$row_1[1].'</option>';
                            }
           echo'</select></td><td><input type="submit" name="update" value="Update"></form></td>'
             . '<td><form action="list_2.php" method="post"><input type="hidden" name="id" value='.$row[0].'>'
             . '<br><input type="submit" name="delete" value="Delete"></form></td></tr>';
    $count++; 
 }
 
 echo '</table>';
}
else{
    header("Location: login.php");
}
 ?>
