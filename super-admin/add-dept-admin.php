<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'ssubmit')){
        
        $name= filter_input(INPUT_POST,'name');
        $dept= filter_input(INPUT_POST,'dept');
        $pass= filter_input(INPUT_POST,'password');
        
        $password = md5($pass);
        
        $query="INSERT INTO deptadmin(password, name, department) VALUES ('$password','$name','$dept')";
        
        $result=$conx->query($query);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $_SESSION['success'] = true;
                header('Location: view-dept.php');
                exit();
            }
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header('Location: add-dept.php');
            exit();
        }        
    }else {
            header("Location: index.php");
            exit();
    }