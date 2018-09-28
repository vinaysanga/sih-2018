<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'ssubmit')){
        $id_admin= filter_input(INPUT_POST,'id_admin');
        $name= filter_input(INPUT_POST,'name');
        $dept= filter_input(INPUT_POST,'dept');
        $pass= filter_input(INPUT_POST,'password');
        
        $password = md5($pass);
        
        $query="UPDATE deptadmin SET password='$password',name='$name',department='$dept' WHERE id_admin='$id_admin'";
        
        $result=$conx->query($query);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $_SESSION['success'] = true;
                header('Location: edit-dept.php');
                exit();
            }
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header('Location: edit-dept.php');
            exit();
        }        
    }else {
            header("Location: index.php");
            exit();
    }