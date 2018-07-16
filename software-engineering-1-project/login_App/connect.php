<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn=  mysql_connect("localhost", "root",'');
if($conn){
    $select_db=  mysql_select_db("student_management_db");
}
