<?php
    session_start();
    require_once 'db.php';
    
    if(filter_has_var(INPUT_POST, 'ssubmit')){
        $name= filter_input(INPUT_POST,'uname');
        $pass= filter_input(INPUT_POST,'psw');

        $query="SELECT * FROM superadmin WHERE name='$name' AND password='$pass'";
        $result=$conx->query($query);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()){
                $_SESSION['name']=$row['name'];
                $_SESSION['id_sadmin']=$row['id_sadmin'];
                header('Location: super-admin/index.php');
            }
        }
        else{
            $_SESSION['loginError'] = $conx->error;
            header("Location: index.php");
            exit();
        }
        $conx->close();
    }else {
            header("Location: index.php");
            exit();
    }