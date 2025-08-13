<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/connect.php';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    try {
        // Insert into your 'contacts' table
        $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $connect->prepare($sql);
        
        if ($stmt->execute([$name, $email, $message])) {
            echo json_encode(['success' => true, 'message' => 'Thank you for your message! I will get back to you soon.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: Could not save message']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>