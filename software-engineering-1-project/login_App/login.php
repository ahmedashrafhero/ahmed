<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './connect.php';
$errormessage="";
 if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
           $username=$_COOKIE['username'];
           $password=$_COOKIE['password'];
       }
if(isset($_GET['submit'])){
   $username=$_GET['username'];
   $password=$_GET['password'];
   if(is_numeric($username)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }
   else{
       if(isset($_GET['remember'])){
           //if(!isset($_COOKIE['username'])&&isset($_COOKIE['password']))
           setcookie("username", $username, time()+(60*60));
           setcookie("password", $password, time()+(60*60));
       }
       
       $select_user_SQL="SELECT * FROM `users`  where username='$username' and password='$password'";
       $select_user_Result=  mysql_query($select_user_SQL);
      // echo mysql_num_rows($select_user_Result);
       if(mysql_num_rows($select_user_Result)==0){
       $errormessage="<font color='red'>Invalid username or password,Try again</font>";
       }
       else{
           while($row=  mysql_fetch_array($select_user_Result)){
               $id=$row[0];
               $username=$row[1];
               $password=$row[2];
               $fname=$row[3];
               $lname=$row[4];
               $email=$row[5];
               $user_type=$row[6];
               //sessions
             $_SESSION['username']=$username;
             $_SESSION['password']=$password;
             $_SESSION['fname']=$fname;
             $_SESSION['lname']=$lname;
             $_SESSION['email']=$email;
             $_SESSION['type']=$user_type;
           }

           header("Location: Home.php");
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
            <form  action="login.php" method="get" name="login">
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