<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">
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

    <div class="take-quiz-area bg-container">
        <h3 class="mt-4">Multiple Choice!</h3>
        <small>Put the letter of the correct answer in the blank input provided.</small>
        <div class="questions">
            <?php
            $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $quizID = $row['tbl_quiz_id'];
                $quizQuestion = $row['quiz_question'];
                $optionA = $row['option_a'];
                $optionB = $row['option_b'];
                $optionC = $row['option_c'];
                $optionD = $row['option_d'];
                $correctAnswer = $row['correct_answer'];
            ?>
            <div class="question">
                <p><?= $quizID ?>. <?= $quizQuestion ?></p>
                <ol class="choices">
                    <li><?= $optionA ?></li>
                    <li><?= $optionB ?></li>
                    <li><?= $optionC ?></li>
                    <li><?= $optionD ?></li>
                </ol>
                <div class="answer-input">
                    <label for="answer">Answer:</label>
                    <input class="col-1" type="text" maxlength="1">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <button type="button" class="user-button" id="submitAnswer">Submit <i class="fa-sharp fa-solid fa-share"></i></button>
    </div>

    </div>

    </div>
</div>

<?php
$stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<script>';
echo 'var quizData = ' . json_encode($result) . ';';
echo '</script>';
?>

<script>
    
    document.getElementById("submitAnswer").addEventListener("click", function() {
        var questions = document.querySelectorAll(".question");
        var correctAnswers = 0;

        questions.forEach(function(question, index) {
            var answerInput = question.querySelector("input");
            if (answerInput) {
                var userAnswer = answerInput.value.toUpperCase();
                var correctAnswer = quizData[index].correct_answer;

                if (userAnswer === correctAnswer) {
                    correctAnswers++;
                    question.classList.add("correct");
                }
            }
        });

        $("#resultModal").modal("show");

        $("#totalScore").val(correctAnswers);
        
        
    });

</script>

<?php include ('./partials/footer.php') ?>