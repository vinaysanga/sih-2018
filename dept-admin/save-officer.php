<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'submit')){
        
        $id = filter_input(INPUT_POST,'id');
        $name= filter_input(INPUT_POST,'name');
        $dept= filter_input(INPUT_POST,'dept');        
        
        $query="UPDATE officer SET name='$name',department='$dept' WHERE id_officer='$id'";
        
        $result=$conx->query($query);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $_SESSION['success'] = true;
                header('Location: view-off.php');
                exit();
            }
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header('Location: view-off.php');
            exit();
        }        
    }else {
            header("Location: index.php");
            exit();
    }