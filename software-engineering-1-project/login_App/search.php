<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './connect.php';
echo '<center><h3><u>Search Page</u> </h3></center><br><br><br>';
include_once './user_menue.php';

if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))){
     $message="";
   ?>
   <html>
    <body>
     
        <form action="search.php" method="post">
            <input type="text" name="search_value" value="<?php if($_POST['search_value']) echo $_POST['search_value'] ;?>" required="required"><input type="submit" name="search" value="search">
            
        </form>
    </body>
</html>
<?php

    if(isset($_POST['search'])){
        
        $search_value=$_POST['search_value'];
        $search_SQL="SELECT * FROM `users` WHERE `username` LIKE'%$search_value%' or `fname`LIKE '%$search_value%' or lname like '%$search_value%'";
        $search_result=  mysql_query($search_SQL);
 $count=0;
 if(mysql_num_rows($search_result)!=0){
              echo '<table><tr bgcolor="cyan"><td>User ID</td><td>Username</td><td>Password</td><td>First Name</td><td>Last Name</td><td>Email</td><td>User Type</td></tr>';

 while($row=  mysql_fetch_array($search_result)){
     $color='yellow';
     $type=array(" ","Admin","Student","Teacher");
     if($count%2==1){
         $color="green";
     }
     
     echo '<tr bgcolor="'.$color.'"><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$type[$row[6]].'</td></tr>';
    $count++; 
 }
 
 echo '</table>';
    }
    else{
                              $message="<font color='red'>No User exists</font>";
                              
    }
    }
    
   
}
else{
    header("Location: login.php");
}
?>
 <div>
            <?php
                echo $message;
            ?>
        </div>