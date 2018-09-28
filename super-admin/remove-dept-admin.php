<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'ssubmit')){
        $id_admin= filter_input(INPUT_POST,'id_admin');
        
       
        
        $query="DELETE FROM deptadmin WHERE id_admin='$id_admin'";
        
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