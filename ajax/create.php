<?php
// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

try {
    // Validate and sanitize input
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = htmlspecialchars(trim($_POST["title"]));
        $details = htmlspecialchars(trim($_POST["details"]));
        
        // Check if title is not empty
        if (empty($title)) {
            throw new Exception("Title is required");
        }

        // Prepare the db query
        $stmt = $db->prepare("INSERT INTO todo (title, details) VALUES (:title, :details)");

        // Execute the query with parameter binding
        if ($stmt->execute(["title" => $title, "details" => $details])) {
            echo 1;
        } else {
            throw new Exception("Failed to insert task");
        }
    } else {
        throw new Exception("Invalid request method");
    }
} catch (Exception $e) {
    // Log error message for debugging (in production, consider logging to a file or monitoring service)
    error_log($e->getMessage());
    echo 0;
}
?>
