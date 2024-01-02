<?php

    require('C:/xampp/htdocs/CRUDSystem/assets/php/conniction.php');
    
    // Check if the request method is GET
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        // Run SQL Query
        $getUsers = mysqli_query($conn,"SELECT * FROM emp");
        // Fetch all rows as ASSOC Array
        $emps = mysqli_fetch_all($getUsers, MYSQLI_ASSOC);

        // There is data?
        if(mysqli_num_rows($getUsers) > 0){
            header('Content-Type: application/json');
            echo json_encode(['userData' => $emps]);  
            http_response_code(200);
        }
        else{
            echo json_encode(['message' => "No Result Found"]);  
            http_response_code(404);
        }
    }
    else{
        echo json_encode(['message' => "Method Not Allowed"]);  
        http_response_code(405);
    }


?>