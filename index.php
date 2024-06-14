<?php
include('./partials/header.php');
include('./conn/conn.php');
?>

<div class="main">
    <div class="main-container bg-container">
        <h1>Qzzy</h1>
        <div class="border-line"></div>

        <div class="selection-container">
            <h3>Select user type</h3>
            <div class="user-selection-button">
                <div class="user-button">
                    <a href="student.php">Student</a>
                </div>
                <div class="user-button">
                    <a href="teacher.php">Teacher</a>
                </div>
            </div>

        </div>
    </div>

</div>

<?php include('./partials/footer.php') ?>