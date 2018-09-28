<?php
    session_start();
    require_once 'db.php';
    
    if(filter_has_var(INPUT_POST, 'dsubmit')){
        
        $name= filter_input(INPUT_POST,'dname');
        $pass= filter_input(INPUT_POST,'dpsw');
        
        $password= md5($pass);       

        $query="SELECT * FROM dispatcher WHERE name='$name' AND password='$password'";
        $result=$conx->query($query);
        if($result->num_rows > 0){
             while ($row=$result->fetch_assoc()){
                $_SESSION['name']=$row['name'];
                $_SESSION['dept']=$row['department'];
                $_SESSION['id_dispatcher']=$row['id_dispatcher'];
                header('Location: dispatcher/index.php');
            }
        }
        else{
            echo "nothing";
        }
        
    }else {
            header("Location: index.php");
            exit();
    }