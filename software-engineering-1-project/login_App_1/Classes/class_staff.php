<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_staff
 *
 * @author Wael
 */
include_once 'DbConnection.php';
include_once 'Class_user.php';
class class_staff extends Class_user {
    protected $salary;
       public  function __construct($user_id) {
        if($user_id!=""){
                    parent::__construct($user_id);
                    $Db_object=new DbConnection();
                    $select_user_SQL="SELECT * FROM `staff` where users_id=$user_id";
                    $data=$Db_object->get_row($select_user_SQL);
                    $this->salary=$data['salary'];
        
        }
        }
}
