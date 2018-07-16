<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './connect.php';
echo '<center><h3><u>Register New User Page</u> </h3></center><br><br><br>';
include_once './user_menue.php';
if(isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type'])){

$message="";
if(isset($_POST['submit'])){
    $type=$_POST['type'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    //echo $type.'  '.$username.'  '.$password.'  '.$email.' '.$fname.'  '.$lname;
     $select_user_SQL="SELECT * FROM `users`  where username='$username' and password='$password'";
       $select_user_Result=  mysql_query($select_user_SQL);
       echo mysql_num_rows($select_user_Result);
       if ($type==0){
                      $message="<font color='red'>Please Select User Type</font>";
       }
       else if(mysql_num_rows($select_user_Result)==1){
           $message="<font color='red'>There is auser who has the same username or password</font>";
          }
        else{
            $insert_user_sql="INSERT INTO `users`(`username`, `password`, `fname`, `lname`, `email`, `user_type_id`) VALUES ('$username','$password','$fname','$lname','$email','$type')";
            $inser_user_result=  mysql_query($insert_user_sql);
            if($inser_user_result){
                           $message="<font color='red'>User inserted Successfully!</font>";

            }
        }
    
}
?>
<html>
    <body>
        <div>
        <?php
        echo $message;
        ?>
    </div>
        <form  action="register.php" method="post" name="register">
            <table>
                <tr>
                    <td>
                        User Type
                    </td>
                
                    <td>
                        <select name="type" >
                            <option value="0" >Select type</option>
                            <?php
                            
                            $all_types_sql='SELECT * FROM `user_tpe`';
                            $all_types_result=  mysql_query($all_types_sql);
                            while($row=  mysql_fetch_array($all_types_result)){
                                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                            }
                            
                            
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        <input type="text" name="fname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Last name
                    </td>
                    <td>
                        <input type="text" name="lname" required="required">
                    </td>
                </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" value="Register">
                    </td>
                    
                </tr>
            </table>
            
            
        </form>
    </body>
</html>
<?php
}
else{
    header("Location: login.php");
}
?>