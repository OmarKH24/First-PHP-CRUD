<?php
require "C:/xampp/htdocs/CRUDSystem/assets/php/conniction.php";

// Check if the request method is DELETE
if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
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
            // Delete the record from the database
            $deleteQuery = "DELETE FROM emp WHERE email = '$email'";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if ($deleteResult) {
                echo json_encode(["success" => true, "message" => "Record deleted successfully"]);
            } else {
                echo json_encode(["success" => false, "message" => "Error deleting record: " . mysqli_error($conn)]);
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
