<?php
// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
        $title = htmlspecialchars(trim($_POST["title"]));
        $details = htmlspecialchars(trim($_POST["details"]));

        if (empty($title)) {
            throw new Exception("Title is required");
        }
        if ($id <= 0) {
            throw new Exception("Invalid task ID");
        }

        $stmt = $db->prepare("UPDATE todo SET title = :title, details = :details WHERE id = :id");

        if ($stmt->execute(["id" => $id, "title" => $title, "details" => $details])) {
            echo 1;
        } else {
            throw new Exception("Failed to update task");
        }
    } else {
        throw new Exception("Invalid request method");
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo 0;
}

