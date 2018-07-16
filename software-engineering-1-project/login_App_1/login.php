<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './Classes/Class_user.php';
$errormessage="";
 if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
           $username=$_COOKIE['username'];
           $password=$_COOKIE['password'];
       }
if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   if(is_numeric($username)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }
   else{
       if(isset($_GET['remember'])){
           setcookie("username", $username, time()+(60*60));
           setcookie("password", $password, time()+(60*60));
       }
      
        $user_object=new Class_user();
        $user_object->set_username($username);
        $user_object->set_password($password);
        $return_value=$user_object->login();
        //echo 'cccccccccc'.$return_value;
        $user_id=$user_object->get_id();
       
        if($return_value){
             $user_object=new Class_user($user_id);
             $_SESSION['username']=$user_object->get_username();
             $_SESSION['password']=$user_object->get_password();
             $_SESSION['fname']=$user_object->first_name;
             $_SESSION['lname']=$user_object->last_name;
             $_SESSION['email']=$user_object->email;
             $_SESSION['type']=$user_object->get_user_type();
             header("location: Home.php");
                exit();


           
       }
       else{
           echo $return_value;
             $errormessage="<font color='red'>Invalid username or password,Try again</font>";

       }
       
   }
}


?>





<html>
    <div>
        <?php
        echo $errormessage;
        ?>
    </div>
    <body onload="document.forms.login.username.focus();">
        <table>
            <form  action="login.php" method="post" name="login">
                 <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" name="username" required="required" value="<?php if(isset($username)) echo $username;?>"   >
                </td>
            </tr>
             <td>
                  Password
                </td>
                <td>
                    <input type="text" name="password" required="required" value="<?php if(isset($password)) echo $password;?>"   >
                </td>
            </tr>
             <td>
                 <input type="checkbox" name="remember" >
                </td>
                <td >
                    Remember me!
                </td>
            </tr>
            <td colspan="2" >
                <input type="submit" name="submit" value="LogIn">
                </td>
                
            </tr>
            </form>
           
        </table>
    </body>
</html>