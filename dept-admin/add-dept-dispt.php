<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'submit')){
        
        $name= filter_input(INPUT_POST,'name');
        $dept= filter_input(INPUT_POST,'dept');        
        $pass= filter_input(INPUT_POST,'password');
        
        $password = md5($pass);
        
        $query="INSERT INTO dispatcher(name, department,password) VALUES ('$name','$dept','$password')";
        
        if($conx->query($query)){            
                $_SESSION['success'] = true;
                header('Location: view-dispt.php');
                exit();
            
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header('Location: index.php');
            exit();
        }        
    }else {
            header("Location: index.php");
            exit();
    }