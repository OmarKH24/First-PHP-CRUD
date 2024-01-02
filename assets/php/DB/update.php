<?php
require "C:/xampp/htdocs/CRUDSystem/assets/php/conniction.php";
// Check if the request method is PUT
if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    // Get raw data from the request
    $inputData = file_get_contents("php://input");
    $data = json_decode($inputData, true);  // Assuming the data is in JSON format

    // Check if the required fields are present
    if (isset($data["email"])) {
        $email = $data["email"];

        // Check if the record exists in the database
        $checkQuery = "SELECT * FROM emp WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Update the record in the database
            $updateQuery = "UPDATE emp SET name = '{$data["name"]}', age = {$data["age"]}, exp = {$data["exp"]}, salary = {$data["salary"]} WHERE email = '$email'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo json_encode(["success" => true, "message" => "Record updated successfully"]);
            } else {
                echo json_encode(["success" => false, "message" => "Error updating record: " . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Record with the given email not found"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Email parameter is required"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>
