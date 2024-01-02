<?php
session_start();

// Include the header file
include './header.php';

if (isset($_POST["register"])) {
    #--------
    $errorList = [];

    if (empty($_POST["name"])) {
        $errorList[] = "You need to make sure that Name input is provided!";
    } else {
        $name = $_POST["name"];
        echo ($name);
    }
    if (empty($_POST["email"])) {
        $errorList[] = "You need to make sure that Email input is provided!";
    } else {
        $email = $_POST["email"];
        echo ($email);
    }
    if (empty($_POST["age"])) {
        $errorList[] = "You need to make sure that age input is provided!";
    } else {
        $age = $_POST["age"];
        echo ($age);
    }
    if (empty($_POST["exp"])) {
        $errorList[] = "You need to make sure that Exp input is provided!";
    } else {
        $exp = $_POST["exp"];
        echo ($exp);
    }
    if (empty($_POST["salary"])) {
        $errorList[] = "You need to make sure that Salary input is provided!";
    } else {
        $salary = $_POST["salary"];
        echo ($salary);
    }

   if (!empty($errorList)) {
        if(!$_SESSION("isUpdate")){
            $_SESSION["insert-error"] = true;
            $_SESSION["errors"] = $errorList;
            header('Location: ../../index.php');
            exit(); 
         }
    } else {
        echo "Inputs Correct";
        require('C:/xampp/htdocs/CRUDSystem/assets/php/DB/insert.php');
        header('Location: ../../index.php');
        exit();
    }

}else{
    echo "You Are Not Allowed to be Here";

}

// Include the footer file
include './footer.php';
?>
