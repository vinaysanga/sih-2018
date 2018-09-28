<?php
    session_start();
    require_once 'db.php';
    
    if(filter_has_var(INPUT_POST, 'asubmit')){
        
        $name= filter_input(INPUT_POST,'aname');
        $pass= filter_input(INPUT_POST,'apsw');
        
        $password= md5($pass);
        

        $query="SELECT * FROM deptadmin WHERE name='$name' AND password='$password'";
        $result=$conx->query($query);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $_SESSION['name']=$row['name'];
                $_SESSION['dept']=$row['department'];
                $_SESSION['id_dadmin']=$row['id_admin'];
                header('Location: dept-admin/index.php');
            
            }
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header("Location:  index.php");
            exit();
        }
        
    }else {
            header("Location: index.php");
            exit();
    }