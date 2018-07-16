<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_student
 *
 * @author Wael
 */
include_once 'Class_user.php';
include_once 'DbConnection.php';
class class_student extends Class_user {
    private $student_code;
    public  function __construct($user_id) {
        if($user_id!=""){
                    parent::__construct($user_id);
                    $Db_object=new DbConnection();
                    $select_user_SQL="SELECT * FROM `students`  where users_id=$user_id";
                    $data=$Db_object->get_row($select_user_SQL);
                    $this->student_code=$data['St_code'];
        
        }
        }
        
}
