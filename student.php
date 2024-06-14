<?php
include ('./partials/header.php');
include('./db/db.php');
include ('./partials/modal.php');
?>

<div class="main bg-container">
    <nav>
        <div class="nav">
            <div class="brand">
                <a href="#">Qzzy</a>
            </div>
            <div class="navb">
                <a href="./student.php">Home</a>
                <a href="./take-quiz.php">Take Quiz</a>
                <div class="user-button">
                    <a href="./index.php">Log out</a>
                </div>
            </div>
        </div>

    </nav>

    <div id="pills-home">
        <h2 id="welcome-teacher">Welcome Student!</h2>
        <small>This is a student area where you can take quizzes, and the result will be sent to the teacher <br> area after you have submitted.</small>
        <br>
        <button id="takeQuiz">
            <a class="nav-link" href="./take-quiz.php" style="color: inherit">Take Quiz <i class="fa-solid fa-arrow-right"></i></a>
        </button>
    </div>

    </div>
</div>


<?php include ('./partials/footer.php') ?>