<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'submit')){
        
        $fno= filter_input(INPUT_POST,'fileno');
        $ofrom= filter_input(INPUT_POST,'officerfrom'); 
        $ofto= filter_input(INPUT_POST,'officerto'); 
        $status= filter_input(INPUT_POST,'status');
        
        $query="INSERT INTO files (file_no, off_from, off_to, status) VALUES ('$fno','$ofrom','$ofto','$status')";
               
        if($result=$conx->query($query)){            
               $_SESSION['success'] = true;
                header('Location: view-file.php');
                exit();             
        }
        else{
            $_SESSION['failed'] = true;
            header('Location: view-file.php');
            exit();
        }        
    }else {
            header("Location: index.php");
            exit();
    }
