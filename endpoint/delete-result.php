<?php
include('../db/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['result'])) {
        $resultID = $_GET['result'];

        try {
            $stmt = $conn->prepare("DELETE FROM tbl_result WHERE tbl_result_id = :resultID");
            $stmt->bindParam(':resultID', $resultID);
            $stmt->execute();

            // Redirect back to the quiz page
            header("Location: http://localhost/qzzy/quiz.php");
            exit();
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "Invalid request. Missing result ID.";
    }
} else {
    echo "Invalid request method. Use GET to delete a result.";
}
?>
