<?php
require "C:/xampp/htdocs/CRUDSystem/assets/php/conniction.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql = "INSERT INTO emp (`name`, `age`, `email`, `exp`, `salary`) VALUES ('$name', '$age', '$email', '$exp', '$salary')";
                echo "SQl $sql";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
            echo json_encode(['message' => "Done!"]);  
        } else {
            echo json_encode(['message' => "Error in Query!", 'Error: ' =>  mysqli_error($conn)]);  
        }
    }else{
        echo json_encode(['message' => "Method Not Allowed"]);  
    }
?>