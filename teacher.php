<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main bg-container">
    <nav>
        <div class="nav">
            <div class="brand">
                <a href="#">Qzzy</a>
            </div>
            <div class="navb">
                <a href="./teacher.php">Home</a>
                <a href="./quiz.php">Quiz</a>
                <div class="user-button">
                    <a href="./index.php">Log out</a>
                </div>
            </div>
        </div>

    </nav>

    <div id="pills-home">
        <h2 id="welcome-teacher">Welcome Teacher!</h2>
        <small>This is a teacher area where you can add quizzes and see the results.</small>
        <br>
        <button id="takeQuiz">
            <a class="nav-link" href="./quiz.php" style="color: inherit">Get Started <i class="fa-solid fa-arrow-right"></i></a>
        </button>
    </div>

    </div>
</div>


<?php include ('./partials/footer.php') ?>