<?php
    session_start();
    require_once '../db.php';
    
    if(filter_has_var(INPUT_POST, 'submit')){
        
        $fno= filter_input(INPUT_POST,'fileno');
        $ofrom= filter_input(INPUT_POST,'officerfrom'); 
        $ofto= filter_input(INPUT_POST,'officerto'); 
        $status= filter_input(INPUT_POST,'status');
        
        $query="UPDATE files SET off_from ='$ofrom', off_to='$ofto', status='$status' WHERE file_no='$fno' ";
        $result=$conx->query($query)  ;     
        if($result){            
               $_SESSION['success'] = true;
                header('Location :forward-file.php')  ;         
        }
        else{
            $_SESSION['failed'] = true;
                header('Location :forward-file.php')  ;         
        }        
    }else {
            header("Location: forward-file.php");
            exit();
    }
