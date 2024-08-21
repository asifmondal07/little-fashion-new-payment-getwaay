<?php
session_start();
// Set your database connection details
include 'database_connect.php';

       
    // Check if the form is submitted

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get user ID from session

        $userID =($_SESSION['user-id']);
        

    

        $fullName = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
        $phoneNumber = isset($_POST['ph_number']) ? trim($_POST['ph_number']) : '';
        $address = isset($_POST['address']) ? trim($_POST['address']) : '';

        // Validate form data
        if (empty($fullName) || empty($phoneNumber) || empty($address)) {
            echo "All fields are required.";
            exit;
        }
                
            $sql="INSERT INTO `address` (`user_id`,`full-name`, `phone-number`, `address`) VALUES (' $userID','$fullName', '$phoneNumber', '$address')";
            if ($conn->query($sql) === TRUE) {
                echo  " success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        // Close connection
        $conn->close();

    } else {
        // If the request method is not POST, return an error message
        echo "Error: Invalid request method.";
    }


?>