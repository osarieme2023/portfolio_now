<?php
// Add these at the very top to see errors clearly
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Make sure you set JSON header BEFORE any output
header('Content-Type: application/json');

// Common issues:
// - Undefined variables: $email = $_POST['email'] ?? '';
// - Database connection errors
// - Missing semicolons or syntax errors
// - Using undefined functions

// Always wrap in try-catch
try {
    // Your code here
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
header("Content-Type: application/json; charset=UTF-8");
require_once('includes/connect.php');

// get from fields
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$name = trim($name);
$email = trim($email);
$msg = trim($msg);

$query = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";

$stmt = $connect->prepare($query);

$stmt->bindParam(1, $name, PDO::PARAM_STR);
$stmt->bindParam(2, $email, PDO::PARAM_STR);
$stmt->bindParam(3, $msg, PDO::PARAM_STR);

$stmt->execute();